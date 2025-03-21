<?php
namespace Modules\Panel\Entities;

use DirectoryIterator;
use Exception;
use App;
use Traversable;

class TranslationLoader
{
    private $config;

    private $availableLocales = [];
    private $filesToCreate = [];
    private $langFiles;

    const VUEX_I18N = 'vuex-i18n';
    const VUE_I18N = 'vue-i18n';
    const ESCAPE_CHAR = '!';

    /**
     * The constructor
     *
     * @param array $config
     */
    public function __construct($config = [])
    {
        if (!isset($config['i18nLib'])) {
            $config['i18nLib'] = self::VUE_I18N;
        }
        if (!isset($config['excludes'])) {
            $config['excludes'] = [];
        }
        if (!isset($config['escape_char'])) {
            $config['escape_char'] = self::ESCAPE_CHAR;
        }
        $this->config = $config;
    }

    /**
     * @param string $path
     * @param string $format
     * @param boolean $withVendor
     * @return string
     * @throws Exception
     */
    public function generateFromPath($path, $format = 'es6', $withVendor = false, $langFiles = [])
    {
        if (!is_dir($path)) {
            throw new Exception('Directory not found: ' . $path);
        }

        $this->langFiles = $langFiles;

        $locales = [];
        $files = [];
        $dir = new DirectoryIterator($path);
        $jsBody = '';
        foreach ($dir as $fileinfo) {
            if (!$fileinfo->isDot()) {
                if(!$withVendor
                    && in_array($fileinfo->getFilename(), array_merge(['vendor'], $this->config['excludes']))
                ) {
                    continue;
                }

                $files[] = $fileinfo->getRealPath();
            }
        }
        asort($files);

        foreach ($files as $fileName) {
            $fileinfo = new \SplFileInfo($fileName);

            $noExt = $this->removeExtension($fileinfo->getFilename());
            if ($noExt !== '') {
                // if (class_exists('App')) {
                //     App::setLocale($noExt);
                // }

                if ($fileinfo->isDir()) {
                    $local = $this->allocateLocaleArray($fileinfo->getRealPath());
                } else {
                    $local = $this->allocateLocaleJSON($fileinfo->getRealPath());
                    if ($local === null) continue;
                }

                if (isset($locales[$noExt])) {
                    $locales[$noExt] = array_merge($local, $locales[$noExt]);
                } else {
                    $locales[$noExt] = $local;
                }
            }
        }

        $locales = $this->adjustVendor($locales);

        $jsonLocales = json_encode($locales, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) . PHP_EOL;

        if (json_last_error() !== JSON_ERROR_NONE) {
            throw new Exception('Could not generate JSON, error code '.json_last_error());
        }

        // formats other than 'es6' and 'umd' will become plain JSON
        if ($format === 'es6') {
            $jsBody = $this->getES6Module($jsonLocales);
        } elseif ($format === 'umd') {
            $jsBody = $this->getUMDModule($jsonLocales);
        } else {
            $jsBody = $jsonLocales;
        }

        return $jsBody;
    }

    /**
     * @param string $path
     * @param string $format
     * @return string
     * @throws Exception
     */
    public function generateMultiple($path, $multiLocales = false)
    {
        if (!is_dir($path)) {
            throw new Exception('Directory not found: ' . $path);
        }
        $locales = [];
        $dir = new DirectoryIterator($path);
        foreach ($dir as $fileinfo) {
            if (!$fileinfo->isDot()
                && !in_array($fileinfo->getFilename(), array_merge(['vendor'], $this->config['excludes']))
                && $fileinfo !== ''
            ) {
                $noExt = $this->removeExtension($fileinfo->getFilename());

                if ($noExt !== '') {
                    // if (class_exists('App')) {
                    //     App::setLocale($noExt);
                    // }
                    if (!in_array($noExt, $this->availableLocales)) {
                        $this->availableLocales[] = $noExt;
                    }
                    if ($fileinfo->isDir()) {
                        $local = $this->allocateLocaleArray($fileinfo->getRealPath(), $multiLocales);
                    } else {
                        $local = $this->allocateLocaleJSON($fileinfo->getRealPath());
                        if ($local === null) continue;
                    }

                    if (isset($locales[$noExt])) {
                        $locales[$noExt] = array_merge($local, $locales[$noExt]);
                    } else {
                        $locales[$noExt] = $local;
                    }
                }
            }
        }

        return $locales;
    }


    /**
     * @param string $path
     * @return array
     */
    public function allocateLocaleJSON($path)
    {
        // Ignore non *.json files (ex.: .gitignore, vim swap files etc.)
        if (pathinfo($path, PATHINFO_EXTENSION) !== 'json') {
            return null;
        }
        $tmp = (array)json_decode(file_get_contents($path), true);
        if (gettype($tmp) !== "array") {
            throw new Exception('Unexpected data while processing ' . $path);
        }

        return $this->adjustArray($tmp);
    }

    /**
     * @param string $path
     * @return array
     */
    public function allocateLocaleArray($path, $multiLocales = false)
    {
        $data = [];
        $dir = new DirectoryIterator($path);
        $lastLocale = last($this->availableLocales);
        foreach ($dir as $fileinfo) {
            // Do not mess with dotfiles at all.
            if ($fileinfo->isDot()) {
                continue;
            }

            if ($fileinfo->isDir()) {
                // Recursivley iterate through subdirs, until everything is allocated.

                $data[$fileinfo->getFilename()] = $this->allocateLocaleArray($path . DIRECTORY_SEPARATOR . $fileinfo->getFilename());
            } else {
                $noExt = $this->removeExtension($fileinfo->getFilename());
                $fileName = $path . DIRECTORY_SEPARATOR . $fileinfo->getFilename();

                // Ignore non *.php files (ex.: .gitignore, vim swap files etc.)
                if (pathinfo($fileName, PATHINFO_EXTENSION) !== 'php') {
                    continue;
                }

                if ($this->shouldIgnoreLangFile($noExt)) {
                    continue;
                }

                $tmp = include($fileName);

                if (gettype($tmp) !== "array") {
                    throw new Exception('Unexpected data while processing ' . $fileName);
                    continue;
                }

                if ($lastLocale !== false) {

                    $root = realpath($path . DIRECTORY_SEPARATOR . $lastLocale);
                    $filePath = $this->removeExtension(str_replace('\\', '_', ltrim(str_replace($root, '', realpath($fileName)), '\\')));
                    if($filePath[0] === DIRECTORY_SEPARATOR) {
                        $filePath = substr($filePath, 1);
                    }
                    if ($multiLocales) {
                        $this->filesToCreate[$lastLocale][$lastLocale][$filePath] = $this->adjustArray($tmp);
                    } else {
                        $this->filesToCreate[$filePath][$lastLocale] = $this->adjustArray($tmp);
                    }
                }

                $data[$noExt] = $this->adjustArray($tmp);
            }
        }
        return $data;
    }

    /**
     * @param string $noExt
     * @return boolean
     */
    private function shouldIgnoreLangFile($noExt)
    {
        // langFiles passed by option have priority
        if (isset($this->langFiles) && !empty($this->langFiles)) {
            return !in_array($noExt, $this->langFiles);
        }

        return (isset($this->config['langFiles']) && !empty($this->config['langFiles']) && !in_array($noExt, $this->config['langFiles']))
                    || (isset($this->config['excludes']) && in_array($noExt, $this->config['excludes']));
    }

    /**
     * @param array $arr
     * @return array
     */
    private function adjustArray(array $arr)
    {
        $res = [];
        foreach ($arr as $key => $val) {
            $key = $this->removeEscapeCharacter($this->adjustString($key));

            if (is_array($val)) {
                $res[$key] = $this->adjustArray($val);
            } else {
                $res[$key] = $this->removeEscapeCharacter($this->adjustString($val));
            }
        }
        return $res;
    }

    /**
     * Adjust vendor index placement.
     *
     * @param array $locales
     *
     * @return array
     */
    private function adjustVendor($locales)
    {
        if (isset($locales['vendor'])) {
            foreach ($locales['vendor'] as $vendor => $data) {
                foreach ($data as $key => $group) {
                    foreach ($group as $locale => $lang) {
                        $locales[$key]['vendor'][$vendor][$locale] = $lang;
                    }
                }
            }

            unset($locales['vendor']);
        }

        return $locales;
    }

    /**
     * Turn Laravel style ":link" into vue-i18n style "{link}" or vuex-i18n style ":::".
     *
     * @param string $s
     * @return string
     */
    private function adjustString($s)
    {
        if (!is_string($s)) {
            return $s;
        }

        if ($this->config['i18nLib'] === self::VUEX_I18N) {
            $searchPipePattern = '/(\s)*(\|)(\s)*/';
            $threeColons = ' ::: ';
            $s = preg_replace($searchPipePattern, $threeColons, $s);
        }

        $escaped_escape_char = preg_quote($this->config['escape_char'], '/');
        return preg_replace_callback(
            "/(?<!mailto|tel|{$escaped_escape_char}):\w+/",
            function ($matches) {
                return '{' . mb_substr($matches[0], 1) . '}';
            },
            $s
        );
    }

    /**
     * Removes escape character if translation string contains sequence that looks like
     * Laravel style ":link", but should not be interpreted as such and was therefore escaped.
     *
     * @param string $s
     * @return string
     */
    private function removeEscapeCharacter($s)
    {
        $escaped_escape_char = preg_quote($this->config['escape_char'], '/');
        return preg_replace_callback(
            "/{$escaped_escape_char}(:\w+)/",
            function ($matches) {
                return mb_substr($matches[0], 1);
            },
            $s
        );
    }

    /**
     * Returns filename, with extension stripped
     * @param string $filename
     * @return string
     */
    private function removeExtension($filename)
    {
        $pos = mb_strrpos($filename, '.');
        if ($pos === false) {
            return $filename;
        }

        return mb_substr($filename, 0, $pos);
    }

    /**
     * Returns an UMD style module
     * @param string $body
     * @return string
     */
    private function getUMDModule($body)
    {
        $js = <<<HEREDOC
(function (global, factory) {
    typeof exports === 'object' && typeof module !== 'undefined' ? module.exports = factory() :
        typeof define === 'function' && define.amd ? define(factory) :
            typeof global.vuei18nLocales === 'undefined' ? global.vuei18nLocales = factory() : Object.keys(factory()).forEach(function (key) {global.vuei18nLocales[key] = factory()[key]});
}(this, (function () { 'use strict';
    return {$body}
})));
HEREDOC;
        return $js;
    }

    /**
     * Returns an ES6 style module
     * @param string $body
     * @return string
     */
    private function getES6Module($body)
    {
        return "export default {$body}";
    }
}

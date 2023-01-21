<?php

namespace Modules\VueGenerator\Console\Commands;

use Modules\VueGenerator\Entities\Paths;
use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;
use Modules\VueGenerator\Exceptions\ResourceAlreadyExists;

class VueGeneratorsCommand extends Command
{
    use Paths;

    /**
     * Create path for file.
     *
     * @param Filesystem $filesystem
     * @param string     $type       File type.
     *
     * @return string
     */
    protected function createPath(Filesystem $filesystem, $type)
    {
        $customPath = $this->option('path');

        $defaultPath = config("vuegenerator.paths.{$type}s");

        $path = $customPath !== null ? $customPath : $defaultPath;

        $this->buildPathFromArray($path, $filesystem);

        return $path;
    }

    protected function checkFileExists(Filesystem $filesystem, $path, $name)
    {
        if ($filesystem->exists($path)) {
            throw ResourceAlreadyExists::fileExists($name);
        }
    }
}

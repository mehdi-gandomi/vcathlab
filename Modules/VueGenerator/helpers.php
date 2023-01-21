<?php

if (!function_exists('get_vuecrud_template_file_path')) {
    /**
     * get path for template file.
     *
     * @param string $templateName
     *
     * @return string
     */
    function get_vuecrud_template_file_path($templateName)
    {
        $templateName = str_replace('.', '/', $templateName);

        $templatesPath = config(
            'vuegenerator::vuegenerator.templates_dir',
            resource_path('iracode/vuecrud-generator-templates/')
        );

        $path = $templatesPath.$templateName.'.stub';

        if (file_exists($path)) {
            return $path;
        }

        return base_path('vendor/iracode/vuegenerator/templates/'.$templateName.'.stub');
    }
}

if (!function_exists('get_vuecrud_template')) {
    /**
     * get template contents.
     *
     * @param string $templateName
     * @param string $templateType
     *
     * @return string
     */
    function get_vuecrud_template($templateName, $templateType)
    {
        $path = get_template_file_path($templateName, $templateType);

        return file_get_contents($path);
    }
}
if(!function_exists('fieldExistsInForm')){
    function fieldExistsInForm($model,$field)
    {
        return isset($model::$fields[$field]) && isset($model::$fields[$field]['inForm']) && $model::$fields[$field]['inForm'];
    }
}
if(!function_exists('fieldExistsInIndex')){
    function fieldExistsInIndex($model,$field)
    {
        return isset($model::$fields[$field]) && isset($model::$fields[$field]['inIndex']) && $model::$fields[$field]['inIndex'];
    }
}

<?php

namespace Modules\CrudGenerator\Generators\API;

use Modules\CrudGenerator\Common\CommandData;
use Modules\CrudGenerator\Generators\BaseGenerator;
use Modules\CrudGenerator\Utils\FileUtil;
use Nwidart\Modules\Facades\Module;

class APIControllerGenerator extends BaseGenerator
{
    /** @var CommandData */
    private $commandData;

    /** @var string */
    private $path;

    /** @var string */
    private $fileName;

    public function __construct(CommandData $commandData)
    {
        $this->commandData = $commandData;
        $this->path = $commandData->config->pathApiController;
        $this->fileName = $this->commandData->modelName.'APIController.php';
    }

    public function generate()
    {
        if ($this->commandData->getOption('repositoryPattern')) {
            $templateName = 'api_controller';
        } else {
            $templateName = 'model_api_controller';
        }

        if ($this->commandData->isLocalizedTemplates()) {
            $templateName .= '_locale';
        }

        $templateData = get_template("api.controller.$templateName", 'CrudGenerator');
        //add access middleware
        if($this->commandData->commandObj->argument("menuId") && Module::isActive("AccessLevel")){
          $templateData=str_replace('$ACCESS_MIDDLEWARE$','$this->middleware("check.access:'.$this->commandData->commandObj->argument("menuId").'");',$templateData);
        }else{
            $templateData=str_replace('$ACCESS_MIDDLEWARE$','',$templateData);
        }
        $templateData = fill_template($this->commandData->dynamicVars, $templateData);
        $templateData = $this->fillDocs($templateData);

        FileUtil::createFile($this->path, $this->fileName, $templateData);

        $this->commandData->commandComment("\nAPI Controller created: ");
        $this->commandData->commandInfo($this->fileName);
    }

    private function fillDocs($templateData)
    {
        $methods = ['controller', 'index', 'store', 'show', 'update', 'destroy'];

        if ($this->commandData->getAddOn('swagger')) {
            $templatePrefix = 'controller_docs';
            $templateType = 'swagger-generator';
        } else {
            $templatePrefix = 'api.docs.controller';
            $templateType = 'CrudGenerator';
        }

        foreach ($methods as $method) {
            $key = '$DOC_'.strtoupper($method).'$';
            $docTemplate = get_template($templatePrefix.'.'.$method, $templateType);
            $docTemplate = fill_template($this->commandData->dynamicVars, $docTemplate);
            $templateData = str_replace($key, $docTemplate, $templateData);
        }

        return $templateData;
    }

    public function rollback()
    {
        if ($this->rollbackFile($this->path, $this->fileName)) {
            $this->commandData->commandComment('API Controller file deleted: '.$this->fileName);
        }
    }
}

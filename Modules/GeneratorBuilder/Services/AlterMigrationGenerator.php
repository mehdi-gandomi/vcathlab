<?php

namespace Modules\GeneratorBuilder\Services;

use File;
use Illuminate\Support\Str;
use Modules\Generator\Common\CommandData;
use Modules\Generator\Utils\FileUtil;
use SplFileInfo;

class AlterMigrationGenerator extends BaseGenerator
{
    /** @var CommandData */
    private $commandData;

    /** @var string */
    private $path;

    public function __construct($commandData)
    {
        $this->commandData = $commandData;
        $this->path = config('crudgenerator.path.migration', database_path('migrations/'));
    }

    public function generate()
    {
        $templateData = get_template('migration', 'laravel-generator');

        $templateData = fill_template($this->commandData->dynamicVars, $templateData);

        $templateData = str_replace('$FIELDS$', $this->generateFields(), $templateData);

        $tableName = $this->commandData->dynamicVars['$TABLE_NAME$'];

        $fileName = date('Y_m_d_His').'_'.'alter_'.strtolower($tableName).'_table.php';

        FileUtil::createFile($this->path, $fileName, $templateData);

        $this->commandData->commandComment("\nAlter Migration created: ");
        $this->commandData->commandInfo($fileName);
    }

    private function generateFields()
    {
        $fields = [];
        $foreignKeys = [];
        foreach ($this->commandData->fields as $field) {
            $fields[] = $field->migrationText;
            if (!empty($field->foreignKeyText)) {
                $foreignKeys[] = $field->foreignKeyText;
            }
        }

        return implode(infy_nl_tab(1, 3), array_merge($fields, $foreignKeys));
    }

    public function rollback()
    {
        $fileName = 'alter_'.$this->commandData->config->tableName.'_table.php';

        /** @var SplFileInfo $allFiles */
        $allFiles = File::allFiles($this->path);

        $files = [];

        foreach ($allFiles as $file) {
            $files[] = $file->getFilename();
        }

        $files = array_reverse($files);

        foreach ($files as $file) {
            if (Str::contains($file, $fileName)) {
                if ($this->rollbackFile($this->path, $file)) {
                    $this->commandData->commandComment('Migration file deleted: '.$file);
                }
                break;
            }
        }
    }
}

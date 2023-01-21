<?php

namespace Modules\CrudGenerator\Generators;

use File;
use Illuminate\Support\Str;
use Modules\CrudGenerator\Common\CommandData;
use Modules\CrudGenerator\Utils\FileUtil;
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
        $templateData = get_template('alter_migration', 'CrudGenerator');
        $templateData = fill_template($this->commandData->dynamicVars, $templateData);
        $alterClassName=$this->rollback();
        $templateData = str_replace('$FIELDS$', $this->generateFields(), $templateData);
        $templateData = str_replace('$DROPFIELDS$', $this->generateDropFields(), $templateData);

        $tableName = $this->commandData->dynamicVars['$TABLE_NAME$'];

        $fileName = date('Y_m_d_His').'_'.'alter_'.strtolower($tableName).'_table.php';

        FileUtil::createFile($this->path, $fileName, $templateData);

        $this->commandData->commandComment("\nMigration created: ");
        $this->commandData->commandInfo($fileName);
    }

    private function generateFields()
    {
        $fields = [];
        foreach ($this->commandData->fields as $field) {
            if($field->name != "id" && $field->name != "created_at" && $field->name != "updated_at"){
                $fields[] = $field->migrationText;
            }
        }
        return implode(infy_nl_tab(1, 3), $fields);
    }
    private function generateDropFields()
    {
        $fields = [];
        foreach ($this->commandData->fields as $field) {
            if($field->name != "id" && $field->name != "created_at" && $field->name != "updated_at"){
                $fields[] = '$table->dropColumn(\''.$field->name."');";
            }
        }
        return implode(infy_nl_tab(1, 3), $fields);
    }

    public function oldAlterPath()
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
                return $this->path."/".$file;
                break;
            }
        }
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

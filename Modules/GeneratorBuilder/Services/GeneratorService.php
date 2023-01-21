<?php
namespace Modules\GeneratorBuilder\Services;
use Doctrine\DBAL\Schema\Column;
use Illuminate\Database\DatabaseManager;
use File;
use Illuminate\Support\Str;
use Illuminate\Container\Container;

class GeneratorService
{
    private $db;

    /**
     * Replace PHP tag.
     *
     * @param   string
     *
     * @return  string
     */
    public function replacePHP($render)
    {
        return str_replace('@phptag', '<?php', $render);
    }

    /**
     * Get current namespace.
     *
     * @return  string
     */
    public function getNamespace()
    {
        return Container::getInstance()->getNamespace();
    }

    public function formatSingular($tbl)
    {
        $replace = Str::camel($tbl);

        return Str::singular(ucwords($replace));
    }

    /**
     * @param  [type]
     * @return [type]
     */
    public function getUniqueField($request)
    {
        $unique = [];
        foreach ($request['columns'] as $type) :
            if ($type['relation']) :
                $unique[] = ucfirst($type['relation']);
            else :
                $unique[] = $type['field'];
            endif;
        endforeach;

        return array_unique($unique);
    }

    /**
     * [arrayToFakeArray description].
     * @param  [type] $arr [description]
     * @return [type]      [description]
     */
    public function arrayToFakeArray($arr)
    {
        return "'" . implode("', '", $arr) . "'";
    }

    /**
     * [checkIfFileExist description].
     * @param  [type] $namespace [description]
     * @param  [type] $file      [description]
     * @return [type]            [description]
     */
    public function checkIfFileExist($namespace, $file)
    {
        $replace = str_replace('\\', '/', $namespace);

        return file_exists(base_path() . '/' . $replace . $file . '.php');
    }



    /**
     * [modelPath description].
     * @param  [type] $namespace [description]
     * @param  [type] $model     [description]
     * @param  [type] $ext       [description]
     * @return [type]            [description]
     */
    public function modelPath($namespace, $model, $ext = null)
    {
        return $this->namespaseToDirInApp($namespace) . '/' . $model . $ext;
    }

    /**
     * [checkOrCreateFolder description].
     * @param  [type] $path [description]
     * @return [type]       [description]
     */
    public function checkOrCreateFolder($path)
    {
        $folder = $this->namespaseToDirInApp($path);
        File::isDirectory($folder) or File::makeDirectory($folder, 0777, true, true);

        return $folder;
    }

    /**
     * [namespaseToDirInApp description].
     * @param  [type] $namespace [description]
     * @return [type]            [description]
     */
    protected function namespaseToDirInApp($namespace)
    {
        $spaces = explode('\\', $namespace);
        array_shift($spaces);

        return app_path(implode('/', $spaces));
    }


    public function __construct(DatabaseManager $db)
    {
        $this->db = $db;
    }

    /**
     * [getDatabaseTables description].
     *
     * @param  [type] $connection [description]
     *
     * @return [type]             [description]
     */
    public function getDatabaseTables($connection = null)
    {
        return collect($this->db->connection($connection)->getDoctrineSchemaManager()->listTableNames())
            ->map(function (string $table) {
                return [
                    'table' => $table,
                    'singular' => $this->formatSingular($table),
                ];
            });
    }

    /**
     * [getTableColumns description].
     *
     * @param  [type] $table      [description]
     * @param  [type] $connection [description]
     *
     * @return [type]             [description]
     */
    public function getTableColumns($table, $connection = null,$only=[])
    {
        $hasOnly=count($only) ? true:false;
        $columns= collect($this->db->connection($connection)->getDoctrineSchemaManager()->listTableColumns($table))
            ->map(function (Column $column) use ($table, $connection) {
                $comment=$column->getComment();
                $name=$column->getName();
                $label=$comment ? $comment:Str::of($name)->snake()->replace('_', ' ')->title();
                return array_merge($column->toArray(),[
                    'label'=>(string) $label,
                    'type' => $column->getType()->getName(),
                    'nullable' => ! $column->getNotnull()
                ]);
            });
        if($hasOnly){
            $columns=$columns->filter(function($column) use ($only){
                return in_array($column['name'],$only);
            });
        }
        return $columns;
    }

    /**
     * [generateResourceFile description].
     *
     * @param  [type] $request   [description]
     * @param  [type] $namespace [description]
     * @param  [type] $model     [description]
     *
     * @return [type]            [description]
     */
    public function generateResourceFile($request, $namespace, $model, $resource)
    {
        $unique = $this->getUniqueField($request);

        $search = $this->arrayToFakeArray($request['search']);

        /* Generate Resource View*/
        $columns=$request['columns'];
        $html = view('resource-generator::templates/resource', compact('namespace', 'request','columns', 'unique', 'search', 'model', 'resource'))->render();
        $render = $this->replacePHP($html);

        file_put_contents(app_path($this->novaPath($request['singular'], '.php')), $render);
    }

    /**
     * [generateModelFile description].
     *
     * @param  [type] $request   [description]
     * @param  [type] $namespace [description]
     *
     * @return [type]            [description]
     */
    public function generateModelFile($request, $namespace)
    {
        /* Generate Model View*/
        $html = view('resource-generator::templates/model', compact('namespace', 'request'))->render();
        $render = $this->replacePHP($html);

        $this->checkOrCreateFolder($namespace);

        file_put_contents($this->modelPath($namespace, $request['singular'], '.php'), $render);
    }
}

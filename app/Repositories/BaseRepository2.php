<?php

namespace App\Repositories;
use Modules\Panel\Entities\ExportExcel;
use Illuminate\Container\Container as Application;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Spatie\QueryBuilder\QueryBuilder;
use Exception;
abstract class BaseRepository
{
/**
     * @var Model
     */
    protected $model;

    public $exportClass=ExportExcel::class;
    /**
     * @var Application
     */
    protected $app;
    protected $sortBy="id";
    protected $sortOrder="DESC";
    protected $sort=true;
    /**
     * @param Application $app
     *
     * @throws \Exception
     */
    public function __construct(Application $app)
    {
        $this->app = $app;
        $this->makeModel();
    }

    /**
     * Get searchable fields array
     *
     * @return array
     */
    abstract public function getFieldsSearchable();

    /**
     * Configure the Model
     *
     * @return string
     */
    abstract public function model();

    /**
     * Make Model instance
     *
     * @throws \Exception
     *
     * @return Model
     */
    public function makeModel()
    {
        $model = $this->app->make($this->model());

        if (!$model instanceof Model) {
            throw new \Exception("Class {$this->model()} must be an instance of Illuminate\\Database\\Eloquent\\Model");
        }

        return $this->model = $model;
    }

    /**
     * Paginate records for scaffold.
     *
     * @param int $perPage
     * @param array $columns
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function paginate($perPage, $columns = ['*'])
    {
        $query = $this->allQuery();

        return $query->paginate($perPage, $columns);
    }
    /**
     * Counr records
     *
     * @param int $perPage
     * @param array $columns
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function count()
    {
        $query = $this->allQuery();

        return $query->count();
    }
    /**
     * Build a query for retrieving all records.
     *
     * @param array $search
     * @param int|null $skip
     * @param int|null $limit
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function allQuery($search = [], $skip = null, $limit = null)
    {

        $query = $this->model->newQuery();
        $query=QueryBuilder::for($query)
            ->allowedFilters($this->getFieldsSearchable());

        // if (count($search)) {
        //     foreach($search as $key => $value) {
        //         if (in_array($key, $this->getFieldsSearchable())) {
        //             $query->where($key, $value);
        //         }
        //     }
        // }

        if (!is_null($skip)) {
            $query->skip($skip);
        }

        if (!is_null($limit)) {
            $query->limit($limit);
        }
        if($this->sort){
            $query=$query->orderBy($this->sortBy,$this->sortOrder);
        }
        return $query;
    }

    /**
     * Retrieve all records with given filter criteria
     *
     * @param array $search
     * @param int|null $skip
     * @param int|null $limit
     * @param array $columns
     *
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator|\Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
     */
    public function all($search = [], $skip = null, $limit = null, $columns = ['*'])
    {
        $query = $this->allQuery($search, $skip, $limit);

        return $query->get($columns);
    }
  /**
   * Create an UploadedFile object from absolute path
   *
   * @static
   * @param     string $path
   * @param     bool $public default false
   * @return    object(Symfony\Component\HttpFoundation\File\UploadedFile)
   * @author    Alexandre Thebaldi
   */

  public function pathToUploadedFile( $path, $public = false )
    {
        $name = File::name( $path );

        $extension = File::extension( $path );

        $originalName = $name . '.' . $extension;

        $mimeType = File::mimeType( $path );

        $size = File::size( $path );

        $error = false;

        $test = $public;

        $object = new UploadedFile( $path, $originalName, $mimeType, $size, $error, $test );

        return $object;
    }
    /**
     * Create model record
     *
     * @param array $input
     *
     * @return Model
     */
    public function create($input)
    {
        $input['only_owned']=1;
        $model = $this->model->newInstance($input);
        $model->save();
        $traits=class_uses($model);
        if(in_array('Modules\\AjaxUpload\\Entities\\Traits\\HasImageUploads',$traits)) $model=$this->handleUpload($model,$input);


        return $model;
    }
    public function handleUpload($model,$input)
    {

        foreach($model->getDefinedUploadFields() as $key=>$field){
            if(!isset($input[$field])) continue;
            $upload=$input[$field];
            if(!$upload) continue;
            if(!is_array($upload)){
                if(strpos($upload,"tmp") !== 0) continue;
            }

                if(is_array($upload)){
                    $paths=[];
                    foreach($upload as $innerKey=>$value){
                        if(strpos($value,"tmp") != 0) continue;
                        try{
                            if(!$value instanceof UploadedFile){
                                $path=Storage::path($value);
                                $innerUpload=$this->pathToUploadedFile($path);
                            }
                            $paths[]="storage/".$model->uploadImage($innerUpload,$field,false);
                        }catch(Exception $e){

                        }
                    }
                    $model->{$field}=$paths;
                    $model->save();
                }else{
                    try{
                        if(!$upload instanceof UploadedFile){
                            $path=Storage::path($upload);
                            $upload=$this->pathToUploadedFile($path);
                        }
                        $model->uploadImage($upload,$field);
                    }catch(Exception $e){

                    }
                }

        }
        return $model;
    }
    /**
     * Find model record for given id
     *
     * @param int $id
     * @param array $columns
     *
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection|Model|null
     */
    public function find($id, $columns = ['*'])
    {
        $query = $this->model->newQuery();

        return $query->find($id, $columns);
    }

    /**
     * Update model record for given id
     *
     * @param array $input
     * @param int $id
     *
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection|Model
     */
    public function update($input, $id)
    {
        $query = $this->model->newQuery();

        $model = $query->findOrFail($id);
        $model->fill($input);
        $model->save();
        $traits=class_uses($model);
        if(in_array('Modules\\AjaxUpload\\Entities\\Traits\\HasImageUploads',$traits)) $this->handleUpload($model,$input);


        return $model;
    }

    /**
     * @param int $id
     *
     * @throws \Exception
     *
     * @return bool|mixed|null
     */
    public function delete($id)
    {
        $query = $this->model->newQuery();

        $model = $query->findOrFail($id);

        return $model->delete();
    }
    /**
     * @param array $ids
     *
     * @throws \Exception
     *
     * @return bool|mixed|null
     */
    public function multiDelete(array $ids)
    {
        return $this->model->whereIn($this->model->getKeyName(),$ids)->delete();
    }
    public function export($type="xlsx",$headings=[])
    {
        if($type == "xlsx"){
            return new $this->exportClass($this,$headings);
        }
    }
}

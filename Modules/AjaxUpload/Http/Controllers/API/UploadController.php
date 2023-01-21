<?php
namespace Modules\AjaxUpload\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Dotenv\Exception\InvalidPathException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Response;

class UploadController extends Controller{
    public function upload(Request $request)
    {
        $model=$request->get("model");
        $modelId=$request->get("model_id");
        if(class_exists($model)) $model=new $model;
        if($modelId) $model=$model->find($modelId);
        foreach($request->allFiles() as $key=>$file){
            if($request->has("uploadPath")){
                $path=$file->store($request->get("uploadPath"),"public");
            }else{
                $path=$file->store(config("ajaxupload.upload_temp_path"));
            }
            return response()->json([
                'field_name'=>$key,
                // 'key'=>$this->getServerIdFromPath($path)
                'key'=>$path
            ]);

            // if(is_array($file)){
            //     foreach($file as $innerKey=>$innerFile){
            //         $path=$model->uploadImage($innerFile,$key);
            //         array_push($paths,$path);
            //     }
            // }else{
            //     $path=$model->uploadImage($file,$key);
            //     array_push($paths,$path);
            // }
        }


    }
      /**
     * Converts the given filepond server id into a path
     *
     * @param string $serverId
     * @return string
     */
    public function getPathFromServerId($serverId) {
        if(!trim($serverId)) {
            throw new InvalidPathException();
        }
        $filePath = Crypt::decryptString($serverId);
        // if(!\Str::startsWith($filePath, config('filepond.temporary_files_path'))) {
        //     throw new InvalidPathException();
        // }
        return $filePath;
    }
     /**
     * Converts the given path into a filepond server id
     *
     * @param string $path
     * @return string
     */
    public function getServerIdFromPath($path) {
        return Crypt::encryptString($path);
    }
}

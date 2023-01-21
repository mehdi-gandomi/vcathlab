<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Spatie\Browsershot\Browsershot;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get("/test",function(){
    $a=json_decode(file_get_contents(base_path("a.json")),true);
    $sql="";
    foreach($a as $item){
        $sql.="\n ALTER TABLE `village` CHANGE `".$item['column']."` `".$item['column']."` VARCHAR(5) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '".$item['comment']."';";
    }
    return $sql;
});
Route::get('generate', function (){
    \Illuminate\Support\Facades\Artisan::call('storage:link');
    echo 'ok';
});
// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get("/columns/{table}",function($table){
//     // $db=app()->make(Illuminate\Database\DatabaseManager::class);
//     return \DB::getSchemaBuilder()->getColumnListing($table);
//     json_encode($a,)
//     // dd(collect($db->connection("pgsql")->getDoctrineSchemaManager()->listTableColumns($table)));
//     // ->map(function($column){return $column['name'];}))
// });

Route::get('/', '\App\Http\Controllers\PageController@home')
	->name('home');
Route::get('/issue/{complexCase}', '\App\Http\Controllers\PageController@issue')
	->name('issue.show');
Route::get('/videos/{category?}', '\App\Http\Controllers\PageController@cases')
	->name('videos.index');
Route::get('/physicians', '\App\Http\Controllers\PageController@physicians')
	->name('physicians.index');
Route::get('/physicians/{physician}', '\App\Http\Controllers\PageController@physician')
	->name('physicians.show');
Route::get('/collaboration', '\App\Http\Controllers\PageController@collaboration')
	->name('collaboration');
Route::get('/about-us', '\App\Http\Controllers\PageController@aboutUs')
	->name('about-us');
Route::get('/products/{key}', '\App\Http\Controllers\PageController@products')
	->name('about-us');
Route::get('/privacy-policy', '\App\Http\Controllers\PageController@privacyPolicy')
	->name('privacy-policy');
	Route::get('/computation-center/payment/{token}', '\App\Http\Controllers\ComputationCenterController@payment')
	->name('privacy-policy');
Route::get("/word-to-jpg/{file}",function(Request $request,$file){
    // $app= new \COM("Word.Application");
    // $file = storage_path("app/public/niffr_cases/".$file);
    // $app->visible = true;
    // $app->Documents->Open($file);
    // $app->ActiveDocument->PrintOut();
    // $app->ActiveDocument->Close(); $app->Quit();
    Browsershot::url("http://docs.google.com/gview?url=".url("storage/niffr_cases/".$file)."&amp;embedded=true")
        ->noSandbox()
        ->waitUntilNetworkIdle()
        ->setDelay(10000)
        // ->evaluate("document.querySelector('.ndfHFb-c4YZDc-q77wGc').parentElement.removeChild(document.querySelector('.ndfHFb-c4YZDc-q77wGc'))")
        ->fullPage()
        ->savePdf(public_path("output.pdf"));

    exit;
});

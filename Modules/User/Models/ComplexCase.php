<?php

namespace Modules\User\Models;
use Modules\Panel\Traits\FormatesDates;
use Modules\Panel\Traits\HasRelationships;
use Modules\CrudGenerator\Filters\AllowedFilter;
use Illuminate\Database\Eloquent\Model as Model;
use Modules\AjaxUpload\Entities\Traits\HasImageUploads;
use Modules\Panel\Traits\FillUserId;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Builder;
use Modules\Comment\Traits\HasComments;

/**
 * Class ComplexCase
 * @package Modules\User\Models
 * @version December 10, 2020, 3:47 pm UTC
 *
 * @property \Modules\User\Models\\Modules\User\Models\ComplexCaseCategory $complexCaseCategory
 * @property \Modules\User\Models\\App\Models\User $user
 * @property integer $complex_case_category_id
 * @property string $title
 * @property integer $user_id
 * @property string $summary
 * @property string $file
 * @property string $created_at
 * @property string $updated_at
 */
class ComplexCase extends Model
{
    use FormatesDates;
    use HasRelationships;
    use FillUserId;
    use Sluggable;
    use HasComments;
    public static function fillUserIdOnUpdate()
    {
        return false;
    }
    public function mustBeApproved(): bool
    {
        return true; // default false
    }
    use HasImageUploads;
    public $table = 'complex_case';







    public $fillable = [
        'complex_case_category_id',
        'title',
        'nightmare',
        "slug",
        'user_id',
        'short_summary',
        'summary',
        'video',
        'featured_image',
        'images',
        'created_at',
        'updated_at'
    ];
    public $with = [
        'complexCaseCategory',
        'user'
    ];
    public $appends = [

    ];
    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'complex_case_category_id' => 'integer',
        'title' => 'string',
        'nightmare' => 'bool',
        'user_id' => 'integer',
        'summary' => 'string',
        'video' => 'string',
        'images'=>'array'
    ];
    public static $dateFormats = [

                    'created_at'=>'Y-m-d H:i'
                ,

                    'updated_at'=>'Y-m-d H:i'

    ];
   /**
     * Api route
     *
     * @var array
     */
    public static $api_route = '/user/api/complex_cases';

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'title' => 'required',
        'summary' => 'required',
        // 'video' => 'required',
        'featured_image' => 'required',
        'images' => 'nullable|array'
    ];


    /**
    * All the images fields for model
    *
    * @var array
    */
    public static $imageFields = [
        "featured_image",
        "images"
    ];

    /**
     * All the file fields for model
     *
     * @var array
     */
    public static $fileFields = [
        "video",
    ];

    /**
     * Flag to disable auto upload
     *
     * @var bool
     */
    public static $disableAutoUpload = true;

    /**
     * Fields
     *
     * @var array
     */
    public static $fields = [
        'title'=>[
                'htmlType'=>'text',
                'inIndex'=>1,
                'inForm'=>1,
                'title'=>'Title',
                'name'=>'title',

                ]
            ,
            'short_summary'=>[
                'htmlType'=>'textarea',
                'inIndex'=>1,
                'inForm'=>1,
                'title'=>'Short Summary',
                'name'=>'short_summary',

                ]
            ,
        'summary'=>[
                'htmlType'=>'textarea',
                'inIndex'=>1,
                'inForm'=>1,
                'title'=>'Summary',
                'name'=>'summary',

                ]
            ,
        'file'=>[
                'htmlType'=>'filepond_image',
                'inIndex'=>1,
                'inForm'=>1,
                'title'=>'File',
                'name'=>'file',

                ]
            ,
        'created_at'=>[
                'htmlType'=>'datetime',
                'inIndex'=>1,
                'inForm'=>0,
                'title'=>'Created At',
                'name'=>'created_at',

                ]
            ,
        'updated_at'=>[
                'htmlType'=>'datetime',
                'inIndex'=>0,
                'inForm'=>0,
                'title'=>'Updated At',
                'name'=>'updated_at',

                ]
            ,
        'complexCaseCategory'=>[
                'htmlType'=>'relation',
                'relationType'=>'mt1',
                'functionName'=>'complexCaseCategory',
                'name'=>'complexCaseCategory',
                'title'=>'complexCaseCategory',
                'inIndex'=>1,
                'inForm'=>1,
                'foreignKey'=>'complex_case_category_id',
                'relatedClass'=>'\Modules\User\Models\ComplexCaseCategory',
            ]
            ,
        'user'=>[
                'htmlType'=>'relation',
                'relationType'=>'mt1',
                'functionName'=>'user',
                'name'=>'user',
                'title'=>'user',
                'inIndex'=>0,
                'inForm'=>0,
                'foreignKey'=>'user_id',
                'relatedClass'=>'\App\Models\User',
            ]

    ];

    public static $title="id";

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function complexCaseCategory()
    {
        return $this->belongsTo(\Modules\User\Models\ComplexCaseCategory::class, 'complex_case_category_id', 'id');
    }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function user()
    {
        return $this->belongsTo(\App\Models\User::class, 'user_id', 'id');
    }


    public static function allowedFilters(){
        return [
            'complex_case_category_id'=>AllowedFilter::exact('complex_case_category_id'),
        'title'=>'title',
        'user_id'=>AllowedFilter::exact('user_id'),
        'summary'=>'summary',
        'file'=>'file',
        'created_at'=>'created_at',
        'updated_at'=>'updated_at'
        ];
    }
    public static function allowedIncludes(){
        return [
            "complexCaseCategory",
        "user"
        ];
    }
    public function getRelatedCasesAttribute()
    {
        return $this->where("complex_case_category_id",$this->complex_case_category_id)->where("id","!=",$this->id)->limit(3)->get();
    }
    public static function allowedSorts(){
        return [
            'complex_case_category_id',
        'title',
        'user_id',
        'summary',
        'file',
        'created_at',
        'updated_at'
        ];
    }
     /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable():array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
    public function getRouteKeyName()
    {
        return "slug";
    }

    /**
     * update the model field
     *
     * @param $imagePath
     * @param $imageFieldName
     */
    public function updateModel($imagePath, $imageFieldName)
    {
        $this->{$imageFieldName} = "storage/".$imagePath;

        $dispatcher = $this->getEventDispatcher();
        self::unsetEventDispatcher();
        $this->save();
        self::setEventDispatcher($dispatcher);
    }
}

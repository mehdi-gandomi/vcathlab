<?php

namespace Modules\Admin\Models;
use Modules\Panel\Traits\FormatesDates;
use Modules\Panel\Traits\HasRelationships;
use Modules\CrudGenerator\Filters\AllowedFilter;
use Illuminate\Database\Eloquent\Model as Model;
use Modules\AjaxUpload\Entities\Traits\HasImageUploads;


;
/**
 * Class ComplexCase
 * @package Modules\Admin\Models
 * @version December 17, 2020, 1:03 pm UTC
 *
 * @property \Modules\Admin\Models\\Modules\Admin\Models\ComplexCaseCategory $complexCaseCategory
 * @property \Modules\Admin\Models\\App\Models\User $user
 * @property integer $complex_case_category_id
 * @property string $title
 * @property string $slug
 * @property integer $user_id
 * @property string $summary
 * @property string $short_summary
 * @property string $file
 * @property tinyInteger $status
 * @property string $created_at
 * @property string $updated_at
 */
class ComplexCase extends Model
{
    use FormatesDates;
    use HasRelationships;
    use HasImageUploads;

    public $table = 'complex_case';




    protected $dates = ['created_at','updated_at'];



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
        'slug' => 'string',
        'user_id' => 'integer',
        'summary' => 'string',
        'short_summary' => 'string',
        'status' => 'integer'
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
    public static $api_route = '/admin/api/complex_cases';

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'title' => 'required',
        'slug' => 'required',
        'summary' => 'required',
        'short_summary' => 'nullable',
        // 'file' => 'required',
        'status' => 'required'
    ];


    /**
    * All the images fields for model
    *
    * @var array
    */
    public static $imageFields = [

    ];

    /**
     * All the file fields for model
     *
     * @var array
     */
    public static $fileFields = [
        'file'=>[]
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
        'slug'=>[
                'htmlType'=>'text',
                'inIndex'=>1,
                'inForm'=>1,
                'title'=>'Slug',
                'name'=>'slug',

                ]
            ,
        'summary'=>[
                'htmlType'=>'quill',
                'inIndex'=>1,
                'inForm'=>1,
                'title'=>'Summary',
                'name'=>'summary',

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
        'file'=>[
                'htmlType'=>'filepond',
                'inIndex'=>1,
                'inForm'=>1,
                'title'=>'File',
                'name'=>'file',

                    'filepond_options'=>[

                'label-idle'=>'Drag & Drop your files',

                'allow-multiple'=>false,

                'instant-upload'=>true,

                    ],

                ]
            ,
        'status'=>[
                'htmlType'=>'radio',
                'inIndex'=>1,
                'inForm'=>1,
                'title'=>'Status',
                'name'=>'status',

                    'options'=>[

                '0'=>'Init',

                '1'=>'Active',

                '2'=>'Deactive',

                    ],

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
                'inIndex'=>1,
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
                'relatedClass'=>'\Modules\Admin\Models\ComplexCaseCategory',
            ]
            ,
        'user'=>[
                'htmlType'=>'relation',
                'relationType'=>'mt1',
                'functionName'=>'user',
                'name'=>'user',
                'title'=>'user',
                'inIndex'=>1,
                'inForm'=>0,
                'foreignKey'=>'user_id',
                'relatedClass'=>'\App\Models\User',
            ]

    ];

    public static $title="id";
/**
	 * boot
	 * @Overrided for register soft delete events
	 *
	 * @return void
	 */
     protected static function boot() {
		parent::boot();

		static::creating(function($case) {
            $case->user_id=auth()->id();
		});

	}
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function complexCaseCategory()
    {
        return $this->belongsTo(\Modules\Admin\Models\ComplexCaseCategory::class, 'complex_case_category_id', 'id');
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
        'slug'=>'slug',
        'user_id'=>AllowedFilter::exact('user_id'),
        'summary'=>'summary',
        'short_summary'=>'short_summary',
        'file'=>'file',
        'status'=>AllowedFilter::custom('status',new \Modules\Admin\Filters\ComplexCase\Status),
        'created_at'=>'created_at',
        'updated_at'=>'updated_at'
        ];
    }
    public static function allowedIncludes(){
        return [
            'complexCaseCategory',
        'user'
        ];
    }
    public static function allowedSorts(){
        return [
            'complex_case_category_id',
        'title',
        'slug',
        'user_id',
        'summary',
        'short_summary',
        'file',
        'status',
        'created_at',
        'updated_at'
        ];
    }
}

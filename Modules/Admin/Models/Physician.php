<?php

namespace Modules\Admin\Models;

use BenSampo\Enum\Traits\CastsEnums;
use Modules\Panel\Traits\FormatesDates;
use Modules\Panel\Traits\HasRelationships;
use Modules\CrudGenerator\Filters\AllowedFilter;
use Illuminate\Database\Eloquent\Model as Model;
use Modules\AjaxUpload\Entities\Traits\HasImageUploads;
use Modules\Panel\Traits\FillUserId;
use Modules\User\Enums\Profession;
use Modules\User\Enums\Specialty;

;
/**
 * Class Physician
 * @package Modules\Admin\Models
 * @version August 8, 2021, 12:39 pm +0430
 *
 * @property \Modules\Admin\Models\\App\Models\User $user
 * @property string $first_name
 * @property string $last_name
 * @property tinyInteger $profession
 * @property tinyInteger $specialty
 * @property string $hostpital
 * @property integer $user_id
 * @property string $cover
 * @property string $avatar
 * @property string $created_at
 * @property string $updated_at
 */
class Physician extends Model
{
    use FormatesDates;
    use HasRelationships;
    use HasImageUploads;
    use FillUserId;
    use CastsEnums;
    public $table = 'physicians';




    protected $dates = ['created_at','updated_at'];



    public $fillable = [
        'first_name',
        'last_name',
        'profession',
        'specialty',
        'hostpital',
        'user_id',
        'cover',
        'avatar',
        'created_at',
        'updated_at'
    ];
    public $with = [
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
        'first_name' => 'string',
        'last_name' => 'string',
        'profession' => Profession::class,
        'specialty' => Specialty::class,
        'hostpital' => 'string',
        'user_id' => 'integer',
        'cover' => 'string',
        'avatar' => 'string'
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
    public static $api_route = '/admin/api/physicians';

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'first_name' => 'required',
        'last_name' => 'required',
        'profession' => 'nullable',
        'specialty' => 'nullable',
        'hostpital' => 'nullable',
        // 'user_id' => 'required',
        'cover' => 'nullable',
        'avatar' => 'required'
    ];


    /**
    * All the images fields for model
    *
    * @var array
    */
    public static $imageFields = [
        'cover',
        'avatar'
    ];

    /**
     * All the file fields for model
     *
     * @var array
     */
    public static $fileFields = [

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
        'first_name'=>[
                'htmlType'=>'text',
                'inIndex'=>1,
                'inForm'=>1,
                'title'=>'First Name',
                'name'=>'first_name',

                ]
            ,
        'last_name'=>[
                'htmlType'=>'text',
                'inIndex'=>1,
                'inForm'=>1,
                'title'=>'Last Name',
                'name'=>'last_name',

                ]
            ,
        'profession'=>[
                'htmlType'=>'select',
                'inIndex'=>1,
                'inForm'=>1,
                'title'=>'Profession',
                'name'=>'profession',

                    'options'=>[

                '1'=>'Fellow',

                '2'=>'Medical student',

                '3'=>'Physician',

                '4'=>'Physician assistant',

                '5'=>'Resident',

                '6'=>'Other',

                    ],

                ]
            ,
        'specialty'=>[
                'htmlType'=>'select',
                'inIndex'=>1,
                'inForm'=>1,
                'title'=>'Specialty',
                'name'=>'specialty',

                    'options'=>[

                '1'=>'General cardiologist',

                '2'=>'Interventional cardiologist',

                '3'=>'Interventional radilogist',

                '4'=>'Interventionalelectrophysiologist',

                '5'=>'Other',

                    ],

                ]
            ,
        'hostpital'=>[
                'htmlType'=>'text',
                'inIndex'=>1,
                'inForm'=>1,
                'title'=>'Hostpital',
                'name'=>'hostpital',

                ]
            ,
        'cover'=>[
                'htmlType'=>'filepond_image',
                'inIndex'=>1,
                'inForm'=>1,
                'title'=>'Cover',
                'name'=>'cover',

                    'filepond_options'=>[

                'label-idle'=>'Drag & Drop your files',

                'allow-multiple'=>false,

                'accepted-file-types'=>'image/jpeg, image/png',

                'instant-upload'=>true,

                    ],

                ]
            ,
        'avatar'=>[
                'htmlType'=>'filepond_image',
                'inIndex'=>1,
                'inForm'=>1,
                'title'=>'Avatar',
                'name'=>'avatar',

                    'filepond_options'=>[

                'label-idle'=>'Drag & Drop your files',

                'allow-multiple'=>false,

                'accepted-file-types'=>'image/jpeg, image/png',

                'instant-upload'=>true,

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
        'user'=>[
                'htmlType'=>'relation',
                'relationType'=>'mt1',
                'functionName'=>'user',
                'name'=>'user',
                'title'=>'user',
                'inIndex'=>1,
                'inForm'=>1,
                'foreignKey'=>'user_id',
                'relatedClass'=>'\App\Models\User',
            ]

    ];

    public static $title="id";

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function user()
    {
        return $this->belongsTo(\App\Models\User::class, 'user_id', 'id');
    }

public function getNameAttribute()
{
    return $this->first_name." ".$this->last_name;
}
    public static function allowedFilters(){
        return [
            'first_name'=>'first_name',
        'last_name'=>'last_name',
        'profession'=>AllowedFilter::custom('profession',new \Modules\Admin\Filters\Physician\Profession),
        'specialty'=>AllowedFilter::custom('specialty',new \Modules\Admin\Filters\Physician\Specialty),
        'hostpital'=>'hostpital',
        'user_id'=>AllowedFilter::exact('user_id'),
        'cover'=>'cover',
        'avatar'=>'avatar',
        'created_at'=>'created_at',
        'updated_at'=>'updated_at'
        ];
    }
    public static function allowedIncludes(){
        return [
            'user'
        ];
    }
    public static function allowedSorts(){
        return [
            'first_name',
        'last_name',
        'profession',
        'specialty',
        'hostpital',
        'user_id',
        'cover',
        'avatar',
        'created_at',
        'updated_at'
        ];
    }
    /**
     * update the model field
     *
     * @param $imagePath
     * @param $imageFieldName
     */
    public function updateModel($imagePath, $imageFieldName)
    {
        $imagePath="storage/".$imagePath;
        $this->{$imageFieldName} = $imagePath;

        $dispatcher = $this->getEventDispatcher();
        self::unsetEventDispatcher();
        $this->save();
        self::setEventDispatcher($dispatcher);
    }

}

<?php

namespace Modules\User\Models;
use Modules\Panel\Traits\FormatesDates;
use Modules\Panel\Traits\HasRelationships;
use Modules\CrudGenerator\Filters\AllowedFilter;
use Illuminate\Database\Eloquent\Model as Model;

use Illuminate\Database\Eloquent\SoftDeletes;


;
/**
 * Class Plan
 * @package Modules\User\Models
 * @version November 12, 2020, 7:18 pm UTC
 *
 * @property string $slug
 * @property json $name
 * @property json $description
 * @property tinyInteger $is_active
 * @property number $price
 * @property number $signup_fee
 * @property string $currency
 * @property smallint $trial_period
 * @property string $trial_interval
 * @property smallint $invoice_period
 * @property string $invoice_interval
 * @property smallint $grace_period
 * @property string $grace_interval
 * @property tinyInteger $prorate_extend_due
 * @property smallint $active_subscribers_limit
 * @property integer $sort_order
 * @property string $created_at
 * @property string $updated_at
 * @property string $deleted_at
 */
class Plan extends Model
{
    use FormatesDates;
    use HasRelationships;

    use SoftDeletes;

    public $table = 'plans';




    protected $dates = ['deleted_at'];



    public $fillable = [
        'slug',
        'name',
        'description',
        'is_active',
        'price',
        'signup_fee',
        'currency',
        'trial_period',
        'trial_interval',
        'invoice_period',
        'invoice_interval',
        'grace_period',
        'grace_interval',
        'prorate_extend_due',
        'active_subscribers_limit',
        'sort_order',
        'created_at',
        'updated_at',
        'deleted_at'
    ];
    public $with = [

    ];
    public $appends = [

    ];
    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'slug' => 'string',
        'is_active' => 'integer',
        'price' => 'decimal:2',
        'signup_fee' => 'decimal:2',
        'currency' => 'string',
        'trial_interval' => 'string',
        'invoice_interval' => 'string',
        'grace_interval' => 'string',
        'prorate_extend_due' => 'integer',
        'sort_order' => 'integer'
    ];
    public static $dateFormats = [

                    'created_at'=>'Y-m-d H:i'
                ,

                    'updated_at'=>'Y-m-d H:i'
                ,

                    'deleted_at'=>'Y-m-d H:i'

    ];
   /**
     * Api route
     *
     * @var array
     */
    public static $api_route = '/user/api/plans';

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'slug' => 'required',
        'name' => 'required',
        'description' => 'nullable',
        'is_active' => 'required',
        'price' => 'required',
        'signup_fee' => 'required',
        'currency' => 'required',
        'trial_period' => 'required',
        'trial_interval' => 'required',
        'invoice_period' => 'required',
        'invoice_interval' => 'required',
        'grace_period' => 'required',
        'grace_interval' => 'required',
        'prorate_extend_due' => 'nullable',
        'active_subscribers_limit' => 'nullable'
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
        'slug'=>[
                'htmlType'=>'text',
                'inIndex'=>1,
                'inForm'=>1,
                'title'=>'Slug',

                ]
            ,
        'name'=>[
                'htmlType'=>'textarea',
                'inIndex'=>1,
                'inForm'=>1,
                'title'=>'Name',

                ]
            ,
        'description'=>[
                'htmlType'=>'textarea',
                'inIndex'=>1,
                'inForm'=>1,
                'title'=>'Description',

                ]
            ,
        'is_active'=>[
                'htmlType'=>'checkbox',
                'inIndex'=>1,
                'inForm'=>1,
                'title'=>'Is Active',

                ]
            ,
        'price'=>[
                'htmlType'=>'number',
                'inIndex'=>1,
                'inForm'=>1,
                'title'=>'Price',

                ]
            ,
        'signup_fee'=>[
                'htmlType'=>'number',
                'inIndex'=>1,
                'inForm'=>1,
                'title'=>'Signup Fee',

                ]
            ,
        'currency'=>[
                'htmlType'=>'text',
                'inIndex'=>1,
                'inForm'=>1,
                'title'=>'Currency',

                ]
            ,
        'trial_period'=>[
                'htmlType'=>'number',
                'inIndex'=>1,
                'inForm'=>1,
                'title'=>'Trial Period',

                ]
            ,
        'trial_interval'=>[
                'htmlType'=>'select',
                'inIndex'=>1,
                'inForm'=>1,
                'title'=>'Trial Interval',

                    'options'=>[

                'month'=>'Month',

                'year'=>'Year',

                    ],

                ]
            ,
        'invoice_period'=>[
                'htmlType'=>'number',
                'inIndex'=>1,
                'inForm'=>1,
                'title'=>'Invoice Period',

                ]
            ,
        'invoice_interval'=>[
                'htmlType'=>'select',
                'inIndex'=>1,
                'inForm'=>1,
                'title'=>'Invoice Interval',

                    'options'=>[

                'month'=>'Month',

                'year'=>'Year',

                    ],

                ]
            ,
        'grace_period'=>[
                'htmlType'=>'number',
                'inIndex'=>1,
                'inForm'=>1,
                'title'=>'Grace Period',

                ]
            ,
        'grace_interval'=>[
                'htmlType'=>'text',
                'inIndex'=>1,
                'inForm'=>1,
                'title'=>'Grace Interval',

                ]
            ,
        'prorate_extend_due'=>[
                'htmlType'=>'number',
                'inIndex'=>1,
                'inForm'=>1,
                'title'=>'Prorate Extend Due',

                ]
            ,
        'active_subscribers_limit'=>[
                'htmlType'=>'number',
                'inIndex'=>1,
                'inForm'=>1,
                'title'=>'Active Subscribers Limit',

                ]
            ,
        'sort_order'=>[
                'htmlType'=>'number',
                'inIndex'=>1,
                'inForm'=>0,
                'title'=>'Sort Order',

                ]
            ,
        'created_at'=>[
                'htmlType'=>'datetime',
                'inIndex'=>1,
                'inForm'=>0,
                'title'=>'Created At',

                ]
            ,
        'updated_at'=>[
                'htmlType'=>'datetime',
                'inIndex'=>1,
                'inForm'=>0,
                'title'=>'Updated At',

                ]
            ,
        'deleted_at'=>[
                'htmlType'=>'datetime',
                'inIndex'=>1,
                'inForm'=>0,
                'title'=>'Deleted At',

                ]

    ];

    public static $title="name";



    public static function allowedFilters(){
        return [
            'slug'=>'slug',
        'name'=>'name',
        'description'=>'description',
        'is_active'=>AllowedFilter::custom('is_active',new \Modules\User\Filters\Plan\IsActive),
        'price'=>AllowedFilter::exact('price'),
        'signup_fee'=>AllowedFilter::exact('signup_fee'),
        'currency'=>'currency',
        'trial_interval'=>AllowedFilter::custom('trial_interval',new \Modules\User\Filters\Plan\TrialInterval),
        'invoice_period'=>AllowedFilter::exact('invoice_period'),
        'invoice_interval'=>AllowedFilter::custom('invoice_interval',new \Modules\User\Filters\Plan\InvoiceInterval),
        'grace_period'=>AllowedFilter::exact('grace_period'),
        'grace_interval'=>'grace_interval',
        'prorate_extend_due'=>AllowedFilter::custom('prorate_extend_due',new \Modules\User\Filters\Plan\ProrateExtendDue),
        'active_subscribers_limit'=>AllowedFilter::exact('active_subscribers_limit'),
        'sort_order'=>AllowedFilter::exact('sort_order'),
        'created_at'=>'created_at',
        'updated_at'=>'updated_at',
        'deleted_at'=>'deleted_at'
        ];
    }
}

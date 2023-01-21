<?php

namespace Modules\Admin\Models;
use Modules\Panel\Traits\FormatesDates;
use Modules\Panel\Traits\HasRelationships;
use Modules\CrudGenerator\Filters\AllowedFilter;
use Illuminate\Database\Eloquent\Model as Model;
use Modules\Comment\Comment as CommentComment;

;
/**
 * Class Comment
 * @package Modules\Admin\Models
 * @version January 4, 2021, 12:38 pm UTC
 *
 * @property \Modules\Admin\Models\\App\Models\User $user
 * @property string $commentable_type
 * @property integer $commentable_id
 * @property string $name
 * @property string $email
 * @property string $comment
 * @property tinyInteger $is_approved
 * @property integer $user_id
 * @property string $created_at
 * @property string $updated_at
 */
class Comment extends CommentComment
{
    use FormatesDates;
    use HasRelationships;

   /**
     * Api route
     *
     * @var array
     */
    public static $api_route = '/admin/api/comments';


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
        'commentable_type'=>[
                'htmlType'=>'text',
                'inIndex'=>0,
                'inForm'=>0,
                'title'=>'Commentable Type',
                'name'=>'commentable_type',

                ]
            ,
        'commentable_id'=>[
                'htmlType'=>'number',
                'inIndex'=>0,
                'inForm'=>0,
                'title'=>'Commentable Id',
                'name'=>'commentable_id',

                ]
            ,
        'name'=>[
                'htmlType'=>'text',
                'inIndex'=>1,
                'inForm'=>1,
                'title'=>'Name',
                'name'=>'name',

                ]
            ,
        'email'=>[
                'htmlType'=>'text',
                'inIndex'=>1,
                'inForm'=>1,
                'title'=>'Email',
                'name'=>'email',

                ]
            ,
        'comment'=>[
                'htmlType'=>'textarea',
                'inIndex'=>1,
                'inForm'=>1,
                'title'=>'Comment',
                'name'=>'comment',

                ]
            ,
        'is_approved'=>[
                'htmlType'=>'radio',
                'inIndex'=>1,
                'inForm'=>1,
                'title'=>'Is Approved',
                'name'=>'is_approved',

                    'options'=>[

                '0'=>'not approved',

                '1'=>'approved',

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


    public static function allowedFilters(){
        return [
            'commentable_type'=>'commentable_type',
        'commentable_id'=>AllowedFilter::exact('commentable_id'),
        'name'=>'name',
        'email'=>'email',
        'comment'=>'comment',
        'is_approved'=>AllowedFilter::custom('is_approved',new \Modules\Admin\Filters\Comment\IsApproved),
        'user_id'=>AllowedFilter::exact('user_id'),
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
            'commentable_type',
        'commentable_id',
        'name',
        'email',
        'comment',
        'is_approved',
        'user_id',
        'created_at',
        'updated_at'
        ];
    }
}

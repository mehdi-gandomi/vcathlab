<?php

namespace Modules\Panel\Models;

use Illuminate\Database\Eloquent\Model as Model;
use Modules\Alaadin\Traits\SetInitialValues;

class Personnel extends Model
{
    // public $table = 'personnel';
    protected $fillable = [
        'first_name',
        'last_name',
        'town_id',
        'cooperation_id',
        'personnel_num',
        'national_code',
        'certificate_number',
        'father_name',
        'sex',
        'registrar_id',
        'personnel_img',
        'employment_kind_id',
        'office_post_id',
        'place_code',
        'job_id',
        'state',
        'job_rank_id',
        'job_type_id',
        'department_id',
        'work_range',
        'user_in',
        'post_id',
    ];

}

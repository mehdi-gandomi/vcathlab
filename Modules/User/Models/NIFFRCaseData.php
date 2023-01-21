<?php

namespace Modules\User\Models;

use App\Models\User;
use Modules\Panel\Traits\FormatesDates;
use Modules\Panel\Traits\HasRelationships;
use Modules\CrudGenerator\Filters\AllowedFilter;
use Illuminate\Database\Eloquent\Model as Model;
use Modules\Panel\Traits\FillUserId;

;
/**
 * Class NIFFRCaseData
 * @package Modules\User\Models
 * @version November 25, 2020, 5:53 pm UTC
 *
 */
class NIFFRCaseData extends Model
{
    use FormatesDates;
    use HasRelationships;
    public $table = 'niffr_case_data';
    protected $fillable=[
        "niffr_case_id",
        "vessel",
        "region",
        "ffr",
        "dp",
        "dd",
        "ll",
        "ds",
        "map",
        "wss",
        "imr",
        "dss",
        "ass",
        "gp",
        'result_file',
        'result'
    ];
    public function niffr_case()
    {
        return $this->belongsTo(NIFFRCase::class,"niffr_case_id");
    }
}

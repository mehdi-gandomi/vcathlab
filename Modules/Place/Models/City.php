<?php

namespace Modules\Place\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $fillable = [
        "id",
        "en_name",
        "fa_name",
        "latitude",
        "longitude",
        "province_id"
    ];
    public $timestamps=false;
    public static $api_route = '/place/api/cities';
    public static $title = 'en_name';
    public function province()
    {
        return $this->belongsTo(Province::class);
    }
}

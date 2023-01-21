<?php

namespace Modules\Place\Models;

use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    protected $fillable = [
        "id",
        "en_name",
        "fa_name",
        "latitude",
        "longitude"
    ];

    /**
     * Api route
     *
     * @var array
     */
    public static $api_route = '/place/api/provinces';
    public static $title = 'en_name';
    public $timestamps=false;
    public function cities()
    {
        return $this->hasMany(City::class);
    }
}

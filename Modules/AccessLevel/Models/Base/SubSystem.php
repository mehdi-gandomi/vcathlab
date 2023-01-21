<?php

namespace Modules\AccessLevel\Models\Base;

use Illuminate\Database\Eloquent\Model;
use Modules\AccessLevel\Traits\HasTranslations;

class SubSystem extends Model
{
    use HasTranslations;

    public $table = 'subsystems';
    public static $js_prefix = 's';
    public $fillable = [
        'title',
        'header_title',
        'icon_class',
        'ordering',
        'state',
        'created_at',
        'updated_at',

        'id'
    ];
    public $translatable = ['title', 'header_title'];

    public function menus() {
	    return $this->hasMany(Menu::class, 'subsystem_id');
    }
}

<?php

namespace Modules\VueGenerator\Entities\Facades;

use Illuminate\Support\Facades\Facade;

class VueGenerator extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'vuegenerator';
    }
}

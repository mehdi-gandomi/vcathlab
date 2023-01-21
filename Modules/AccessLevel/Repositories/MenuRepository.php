<?php

namespace Modules\AccessLevel\Repositories;

use Modules\AccessLevel\Models\Menu;
use App\Repositories\BaseRepository;

/**
 * Class MenuRepository
 * @package Modules\AccessLevel\Repositories
 * @version October 15, 2020, 8:22 am UTC
*/

class MenuRepository extends BaseRepository
{
    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return array_values($this->model::allowedFilters());
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Menu::class;
    }
}

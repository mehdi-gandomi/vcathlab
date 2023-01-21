<?php

namespace Modules\AccessLevel\Repositories;

use Modules\AccessLevel\Models\SubSystem;
use App\Repositories\BaseRepository;

/**
 * Class SubSystemRepository
 * @package Modules\AccessLevel\Repositories
 * @version October 15, 2020, 8:40 am UTC
*/

class SubSystemRepository extends BaseRepository
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
        return SubSystem::class;
    }
}

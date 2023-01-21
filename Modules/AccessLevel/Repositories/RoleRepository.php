<?php

namespace Modules\AccessLevel\Repositories;

use Modules\AccessLevel\Models\Role;
use App\Repositories\BaseRepository;

/**
 * Class RoleRepository
 * @package Modules\AccessLevel\Repositories
 * @version October 15, 2020, 8:06 am UTC
*/

class RoleRepository extends BaseRepository
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
        return Role::class;
    }
}

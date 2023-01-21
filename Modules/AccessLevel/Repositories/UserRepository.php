<?php

namespace Modules\AccessLevel\Repositories;

use App\Models\User;

use App\Repositories\BaseRepository;

/**
 * Class UserRepository
 * @package Modules\AccessLevel\Repositories
 * @version October 28, 2021, 4:20 pm UTC
*/

class UserRepository extends BaseRepository
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
        return User::class;
    }
}

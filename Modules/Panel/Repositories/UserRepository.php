<?php

namespace Modules\Panel\Repositories;

use Modules\Panel\Models\User;
use App\Repositories\BaseRepository;

/**
 * Class UserRepository
 * @package Modules\Panel\Repositories
 * @version October 19, 2020, 4:00 pm UTC
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

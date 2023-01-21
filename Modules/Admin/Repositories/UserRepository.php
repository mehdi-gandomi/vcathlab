<?php

namespace Modules\Admin\Repositories;

use Modules\Admin\Models\User;
use App\Repositories\BaseRepository;

/**
 * Class UserRepository
 * @package Modules\Admin\Repositories
 * @version November 22, 2020, 11:04 am UTC
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

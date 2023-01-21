<?php

namespace Modules\AccessLevel\Repositories;

use Modules\AccessLevel\Models\UserActivity;
use App\Repositories\BaseRepository;

/**
 * Class UserActivityRepository
 * @package Modules\AccessLevel\Repositories
 * @version October 13, 2020, 11:22 am UTC
*/

class UserActivityRepository extends BaseRepository
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
        return UserActivity::class;
    }
}

<?php

namespace Modules\User\Repositories;

use Modules\User\Models\Plan;
use App\Repositories\BaseRepository;

/**
 * Class PlanRepository
 * @package Modules\User\Repositories
 * @version November 12, 2020, 7:18 pm UTC
*/

class PlanRepository extends BaseRepository
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
        return Plan::class;
    }
}

<?php

namespace Modules\User\Repositories;

use Modules\User\Models\ComputationCenter;
use App\Repositories\BaseRepository;

/**
 * Class ComputationCenterRepository
 * @package Modules\User\Repositories
 * @version October 14, 2022, 11:13 am +0330
*/

class ComputationCenterRepository extends BaseRepository
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
        return ComputationCenter::class;
    }
}

<?php

namespace Modules\User\Repositories;

use Modules\User\Models\ABPMCalculation;
use App\Repositories\BaseRepository;

/**
 * Class ABPMCalculationRepository
 * @package Modules\User\Repositories
 * @version March 23, 2023, 11:48 am +0430
*/

class ABPMCalculationRepository extends BaseRepository
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
        return ABPMCalculation::class;
    }
}

<?php

namespace Modules\User\Repositories;

use Modules\User\Models\AobpCalculation;
use App\Repositories\BaseRepository;

/**
 * Class AobpCalculationRepository
 * @package Modules\User\Repositories
 * @version March 23, 2023, 11:48 am +0430
*/

class AobpCalculationRepository extends BaseRepository
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
        return AobpCalculation::class;
    }
}

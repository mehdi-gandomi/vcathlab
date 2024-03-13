<?php

namespace Modules\User\Repositories;

use Modules\User\Models\ImtCalculation;
use App\Repositories\BaseRepository;

/**
 * Class ImtCalculationRepository
 * @package Modules\User\Repositories
 * @version June 4, 2023, 1:59 pm +0330
*/

class ImtCalculationRepository extends BaseRepository
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
        return ImtCalculation::class;
    }
}

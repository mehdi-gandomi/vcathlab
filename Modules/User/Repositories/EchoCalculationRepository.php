<?php

namespace Modules\User\Repositories;

use Modules\User\Models\EchoCalculation;
use App\Repositories\BaseRepository;
use Modules\User\Exports\EchoExport;

/**
 * Class EchoCalculationRepository
 * @package Modules\User\Repositories
 * @version December 22, 2021, 4:45 pm +0330
*/

class EchoCalculationRepository extends BaseRepository
{
    public $exportClass=EchoExport::class;
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
        return EchoCalculation::class;
    }
}

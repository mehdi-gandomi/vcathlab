<?php

namespace Modules\User\Repositories;

use Modules\User\Models\MaceAssesment;
use App\Repositories\BaseRepository;
use Modules\User\Exports\MaceExport;

/**
 * Class MaceAssesmentRepository
 * @package Modules\User\Repositories
 * @version December 15, 2021, 8:19 pm +0330
*/

class MaceAssesmentRepository extends BaseRepository
{
    public $exportClass=MaceExport::class;
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
        return MaceAssesment::class;
    }
}

<?php

namespace Modules\Admin\Repositories;

use Modules\Admin\Models\ComplexCase;
use App\Repositories\BaseRepository;

/**
 * Class ComplexCaseRepository
 * @package Modules\Admin\Repositories
 * @version December 17, 2020, 1:03 pm UTC
*/

class ComplexCaseRepository extends BaseRepository
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
        return ComplexCase::class;
    }
}

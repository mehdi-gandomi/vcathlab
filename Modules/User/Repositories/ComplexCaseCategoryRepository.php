<?php

namespace Modules\User\Repositories;

use Modules\User\Models\ComplexCaseCategory;
use App\Repositories\BaseRepository;

/**
 * Class ComplexCaseCategoryRepository
 * @package Modules\User\Repositories
 * @version November 23, 2020, 9:20 pm UTC
*/

class ComplexCaseCategoryRepository extends BaseRepository
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
        return ComplexCaseCategory::class;
    }
}

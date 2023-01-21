<?php

namespace Modules\Admin\Repositories;

use Modules\Admin\Models\ComplexCaseCategory;
use App\Repositories\BaseRepository;

/**
 * Class ComplexCaseCategoryRepository
 * @package Modules\Admin\Repositories
 * @version November 24, 2020, 6:56 am UTC
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

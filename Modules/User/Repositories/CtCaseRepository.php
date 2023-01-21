<?php

namespace Modules\User\Repositories;

use Modules\User\Models\CtCase;
use App\Repositories\BaseRepository;

/**
 * Class CtCaseRepository
 * @package Modules\User\Repositories
 * @version November 26, 2020, 7:33 am UTC
*/

class CtCaseRepository extends BaseRepository
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
        return CtCase::class;
    }
}

<?php

namespace Modules\User\Repositories;

use Modules\User\Models\Patient;
use App\Repositories\BaseRepository;

/**
 * Class PatientRepository
 * @package Modules\User\Repositories
 * @version November 23, 2020, 8:23 pm UTC
*/

class PatientRepository extends BaseRepository
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
        return Patient::class;
    }
}

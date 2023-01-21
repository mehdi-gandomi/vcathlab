<?php

namespace Modules\Admin\Repositories;

use Modules\Admin\Models\Physician;
use App\Repositories\BaseRepository;

/**
 * Class PhysicianRepository
 * @package Modules\Admin\Repositories
 * @version August 8, 2021, 12:39 pm +0430
*/

class PhysicianRepository extends BaseRepository
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
        return Physician::class;
    }
}

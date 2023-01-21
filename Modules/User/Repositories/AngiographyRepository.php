<?php

namespace Modules\User\Repositories;

use Modules\User\Models\Angiography;
use App\Repositories\BaseRepository;

/**
 * Class AngiographyRepository
 * @package Modules\User\Repositories
 * @version October 13, 2022, 9:35 pm +0330
*/

class AngiographyRepository extends BaseRepository
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
        return Angiography::class;
    }
}

<?php

namespace Modules\User\Repositories;

use Modules\User\Models\BodyComposition;
use App\Repositories\BaseRepository;

/**
 * Class BodyCompositionRepository
 * @package Modules\User\Repositories
 * @version December 30, 2022, 3:59 pm +0330
*/

class BodyCompositionRepository extends BaseRepository
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
        return BodyComposition::class;
    }
}

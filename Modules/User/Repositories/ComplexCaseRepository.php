<?php

namespace Modules\User\Repositories;

use Modules\User\Models\ComplexCase;
use App\Repositories\BaseRepository;

/**
 * Class ComplexCaseRepository
 * @package Modules\User\Repositories
 * @version December 10, 2020, 3:47 pm UTC
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
    /**
     * Build a query for retrieving all records.
     *
     * @param array $search
     * @param int|null $skip
     * @param int|null $limit
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function allQuery($search = [], $skip = null, $limit = null)
    {
        $query=parent::allQuery($search, $skip, $limit);
        return $query->where("user_id",auth()->id());
    }

}

<?php

namespace Modules\Admin\Repositories;

use Modules\Admin\Models\Comment;
use App\Repositories\BaseRepository;

/**
 * Class CommentRepository
 * @package Modules\Admin\Repositories
 * @version January 4, 2021, 12:38 pm UTC
*/

class CommentRepository extends BaseRepository
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
        $query=$query->with("commentable");
        return $query;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Comment::class;
    }
}

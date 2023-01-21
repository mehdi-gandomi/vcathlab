<?php

namespace Modules\User\Repositories;

use Modules\User\Models\NIFFRCase;
use App\Repositories\BaseRepository;
use Modules\User\Entities\ExportNiffr;

/**
 * Class NIFFRCaseRepository
 * @package Modules\User\Repositories
 * @version November 25, 2020, 6:23 pm UTC
*/

class NIFFRCaseRepository extends BaseRepository
{
    public $exportClass=ExportNiffr::class;
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
        return NIFFRCase::class;
    }
}

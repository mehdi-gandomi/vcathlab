<?php

namespace Modules\User\Repositories;

use Modules\User\Models\Echo;
use App\Repositories\BaseRepository;
use Modules\User\Entities\EchoExport;

/**
 * Class EchoRepository
 * @package Modules\User\Repositories
 * @version December 22, 2021, 4:40 pm +0330
*/

class EchoRepository extends BaseRepository
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
        return Echo::class;
    }
}

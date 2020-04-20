<?php

namespace App\Repositories;

use App\Models\aula;
use App\Repositories\BaseRepository;

/**
 * Class aulaRepository
 * @package App\Repositories
 * @version April 12, 2020, 11:37 pm UTC
*/

class aulaRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'idgrado',
        'seccion'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return aula::class;
    }
}

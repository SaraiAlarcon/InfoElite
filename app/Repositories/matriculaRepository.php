<?php

namespace App\Repositories;

use App\Models\matricula;
use App\Repositories\BaseRepository;

/**
 * Class matriculaRepository
 * @package App\Repositories
 * @version April 12, 2020, 11:39 pm UTC
*/

class matriculaRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'idalumno',
        'idaula',
        'idapoderado',
        'colegio_procedencia'
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
        return matricula::class;
    }
}

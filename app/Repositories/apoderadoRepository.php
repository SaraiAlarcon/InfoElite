<?php

namespace App\Repositories;

use App\Models\apoderado;
use App\Repositories\BaseRepository;

/**
 * Class apoderadoRepository
 * @package App\Repositories
 * @version April 12, 2020, 11:36 pm UTC
*/

class apoderadoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nombres',
        'apellidos',
        'telefono'
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
        return apoderado::class;
    }
}

<?php

namespace App\Repositories;

use App\Models\alumno;
use App\Repositories\BaseRepository;

/**
 * Class alumnoRepository
 * @package App\Repositories
 * @version April 12, 2020, 11:35 pm UTC
*/

class alumnoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nombre',
        'apellidos',
        'dni',
        'sexo',
        'fecha_nacimiento',
        'direccion'
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
        return alumno::class;
    }
}

<?php

namespace App\Repositories;

use App\Models\pagos;
use App\Repositories\BaseRepository;

/**
 * Class pagosRepository
 * @package App\Repositories
 * @version April 12, 2020, 11:42 pm UTC
*/

class pagosRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'idmatricula',
        'numero',
        'mes_pension',
        'monto_pension',
        'monto_matricula',
        'monto_material',
        'monto_copias',
        'monto_actividades'
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
        return pagos::class;
    }
}

<?php

namespace App\Repositories;

use App\Models\grado;
use App\Repositories\BaseRepository;

/**
 * Class gradoRepository
 * @package App\Repositories
 * @version April 12, 2020, 11:37 pm UTC
*/

class gradoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'descripcion'
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
        return grado::class;
    }
}

<?php

namespace App\Repositories;

use App\Models\privilegio;
use App\Repositories\BaseRepository;

/**
 * Class privilegioRepository
 * @package App\Repositories
 * @version April 12, 2020, 11:42 pm UTC
*/

class privilegioRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nombre'
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
        return privilegio::class;
    }
}

<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class alumno
 * @package App\Models
 * @version April 12, 2020, 11:35 pm UTC
 *
 * @property string nombre
 * @property string apellidos
 * @property string dni
 * @property string sexo
 * @property string fecha_nacimiento
 * @property string direccion
 */
class alumno extends Model
{
    use SoftDeletes;

    public $table = 'alumno';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'nombre',
        'apellidos',
        'dni',
        'sexo',
        'fecha_nacimiento',
        'direccion'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nombre' => 'string',
        'apellidos' => 'string',
        'dni' => 'string',
        'sexo' => 'string',
        'fecha_nacimiento' => 'date',
        'direccion' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nombre' => 'required',
        'apellidos' => 'required',
        'dni' => 'required',
        'sexo' => 'required',
        'fecha_nacimiento' => 'required',
        'direccion' => 'required'
    ];

    
}

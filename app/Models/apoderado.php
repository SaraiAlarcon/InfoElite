<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class apoderado
 * @package App\Models
 * @version April 12, 2020, 11:36 pm UTC
 *
 * @property string nombres
 * @property string apellidos
 * @property string telefono
 */
class apoderado extends Model
{
    use SoftDeletes;

    public $table = 'apoderado';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'dni_apoderado',
        'nombres_a',
        'apellidos_a',
        'telefono'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'dni_apoderado' => 'string',
        'id' => 'integer',
        'nombres_a' => 'string',
        'apellidos_a' => 'string',
        'telefono' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'dni_apoderado' => 'required',
        'nombres_a' => 'required',
        'apellidos_a' => 'required',
        'telefono' => 'required'
    ];
}

<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class matricula
 * @package App\Models
 * @version April 12, 2020, 11:39 pm UTC
 *
 * @property integer idalumno
 * @property integer idaula
 * @property integer idapoderado
 * @property string colegio_procedencia
 */
class matricula extends Model
{
    use SoftDeletes;

    public $table = 'matricula';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'idalumno',
        'idaula',
        'idapoderado',
        'idgrado',
        'colegio_procedencia'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'idalumno' => 'integer',
        'idaula' => 'integer',
        'idapoderado' => 'integer',
        'idgrado' => 'integer',
        'colegio_procedencia' => 'string'
    ];

    function alumno()
    {
        return $this->belongsTo('App\Models\alumno', 'idalumno', 'id');
    }
    function aula()
    {
        return $this->belongsTo('App\Models\aula', 'idaula', 'id');
    }
    function apoderado()
    {
        return $this->belongsTo('App\Models\apoderado', 'idapoderado', 'id');
    }
    function grado()
    {
        return $this->belongsTo('App\Models\grado', 'idgrado', 'id');
    }

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'idalumno' => 'required',
        'idaula' => 'required',
        'idapoderado' => 'required',
        'idgrado' => 'required',
        'colegio_procedencia' => 'required'
    ];
}

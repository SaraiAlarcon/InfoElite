<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class pagos
 * @package App\Models
 * @version April 12, 2020, 11:42 pm UTC
 *
 * @property integer idmatricula
 * @property string numero
 * @property string mes_pension
 * @property number monto_pension
 * @property number monto_matricula
 * @property number monto_material
 * @property number monto_copias
 * @property number monto_actividades
 */
class pagos extends Model
{
    use SoftDeletes;

    public $table = 'pagos';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
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
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'idmatricula' => 'integer',
        'numero' => 'string',
        'mes_pension' => 'string',
        'monto_pension' => 'double',
        'monto_matricula' => 'double',
        'monto_material' => 'double',
        'monto_copias' => 'double',
        'monto_actividades' => 'double'
    ];

    function matricula()
    {
        return $this->belongsTo('App\Models\matricula', 'idmatricula', 'id');
    }

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'idmatricula' => 'required',
        'numero' => 'required'
    ];

    
}

<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class aula
 * @package App\Models
 * @version April 12, 2020, 11:37 pm UTC
 *
 * @property integer idgrado
 * @property string seccion
 */
class aula extends Model
{
    use SoftDeletes;

    public $table = 'aula';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'idgrado',
        'seccion'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'idgrado' => 'integer',
        'seccion' => 'string'
    ];

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
        'idgrado' => 'required',
        'seccion' => 'required'
    ];
}

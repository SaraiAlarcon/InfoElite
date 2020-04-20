<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class users
 * @package App\Models
 * @version April 12, 2020, 11:16 pm UTC
 *
 * @property string name
 * @property string email
 * @property string password
 * @property string remember_token
 */
class users extends Model
{
    use SoftDeletes;

    public $table = 'users';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'idprivilegio',
        'name',
        'email',
        'password',
        'remember_token'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'idprivilegio' => 'integer',
        'name' => 'string',
        'email' => 'string',
        'password' => 'string',
        'remember_token' => 'string'
    ];

    function Privilegio()
    {
        return $this->belongsTo('App\Models\privilegio', 'idprivilegio', 'id');
    }

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'idprivilegio' => 'required',
        'name' => 'required',
        'email' => 'required',
        'password' => 'required'
    ];
}

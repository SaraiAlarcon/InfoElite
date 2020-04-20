<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::resource('users', 'usersAPIController');

Route::resource('alumnos', 'alumnoAPIController');

Route::resource('apoderados', 'apoderadoAPIController');

Route::resource('aulas', 'aulaAPIController');

Route::resource('grados', 'gradoAPIController');

Route::resource('matriculas', 'matriculaAPIController');

Route::resource('pagos', 'pagosAPIController');

Route::resource('privilegios', 'privilegioAPIController');
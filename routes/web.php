<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect(route('home'));
});

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');


Route::resource('users', 'usersController')->middleware('auth');

Route::resource('alumnos', 'alumnoController')->middleware('auth');

Route::resource('apoderados', 'apoderadoController')->middleware('auth');

Route::resource('aulas', 'aulaController')->middleware('auth');

Route::resource('grados', 'gradoController')->middleware('auth');

Route::resource('matriculas', 'matriculaController')->middleware('auth');

Route::resource('pagos', 'pagosController')->middleware('auth');

Route::resource('privilegios', 'privilegioController')->middleware('auth');

Route::post('setSeccion','aulaController@setSeccion')->name('setSeccion')->middleware('auth');
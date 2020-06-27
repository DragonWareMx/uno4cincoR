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

/* Route::get('/', function () {
    return view('welcome');
}); */

Route::get('/','paginaInicioController@index')->name('inicio');
Route::get('/contacto','paginaInicioController@contacto')->name('contacto');
Route::get('/sobre-nosotros','paginaInicioController@sobreNosotros')->name('sobreNosotros');





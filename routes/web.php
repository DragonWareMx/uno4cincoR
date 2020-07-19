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
Route::get('/quienes-somos','paginaInicioController@sobreNosotros')->name('sobreNosotros');
Route::get('/registro','paginaInicioController@registro')->name('registro');
Route::get('/blogs/{id}','paginaBlogsController@index')->name('blogs'); 
Route::get('/blog/{id}','paginaBlogsController@show')->name('blog');
Route::get('/autores-uno4cinco','paginaAutoresController@uno4cinco')->name('autoresUno4cinco');
Route::get('/autores-145','paginaAutoresController@autores145')->name('autores145');
Route::get('/autor-leer/{id}','paginaAutoresController@index')->name('autor');

/* RUTAS DE LA TIENDA Y EL CARRITO */
Route::get('/tienda-novedades','paginaTiendaController@index')->name('tiendaNovedades');
Route::get('/tienda-catalogo','paginaTiendaController@catalogo')->name('tiendaCatalogo');
Route::get('/tienda-145','paginaTiendaController@tienda145')->name('tienda145');
Route::get('/libro/{id}','paginaTiendaController@libro')->name('libro');
Route::get('/carrito','paginaTiendaController@carrito')->name('carrito');

Route::get('agregar-a-carrito/{id}/{cant}/{formato}', 'paginaTiendaController@addToCart')->name('agregarCarrito');
Route::patch('update-cart', 'paginaTiendaController@update')->name('actualizarCarrito');
Route::delete('remove-from-cart', 'paginaTiendaController@remove')->name('eliminarCarrito');

/*RUTAS DE GESTIÓN DE BLOGS*/
// Route::get('/adminuno4cinco/autores-uno4cinco', 'gestorAutoresController@indexuno4cinco')->name('autores-uno4cinco')->middleware('auth');
Route::get('/adminuno4cinco/autores-145', 'gestorAutoresController@index145')->name('autores-145')->middleware('auth');
Route::get('/adminuno4cinco/autores-uno4cinco', 'gestorAutoresController@indexuno4cinco')->name('autores-uno4cinco')->middleware('auth');

/*RUTAS DE GESTIÓN DE BLOGS*/
Route::get('/adminuno4cinco/blogs', 'gestorBlogsController@index')->name('verBlogs')->middleware('auth');
Route::get('/adminuno4cinco/crearblog', 'gestorBlogsController@addBlog')->name('nuevoBlog')->middleware('auth');
Route::post('/adminuno4cinco/crearblog', 'gestorBlogsController@storeBlog')->name('nuevoBlog')->middleware('auth');
Route::get('/adminuno4cinco/editarblog/{id}', 'gestorBlogsController@editBlog')->name('editarBlog')->middleware('auth');
Route::patch('/adminuno4cinco/editarblog/{id}', 'gestorBlogsController@updateBlog')->name('editarBlog')->middleware('auth');
/*RUTAS DE GESTIÓN DE RESUMEN*/
Route::get('/adminuno4cinco/resumen', 'gestorResumenController@index')->name('resumen');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/adminuno4cinco',function(){
    return view('gestor.inicio'); 
})->name('gestorInicio')->middleware('auth');
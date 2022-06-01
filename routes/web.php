<?php

use App\Http\Controllers\PaymentController;
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

Route::get('/', 'paginaInicioController@tinyversion')->name('inicio');
// Route::get('/contacto','paginaInicioController@contacto')->name('contacto');
// Route::get('/quienes-somos','paginaInicioController@sobreNosotros')->name('sobreNosotros');
// Route::get('/registro','paginaInicioController@registro')->name('registro');
// Route::get('/blogs/{id}','paginaBlogsController@index')->name('blogs');
// Route::get('/blog/{id}','paginaBlogsController@show')->name('blog');
// Route::get('/autores-uno4cinco','paginaAutoresController@uno4cinco')->name('autoresUno4cinco');
// Route::get('/autores-145','paginaAutoresController@autores145')->name('autores145');
// Route::get('/autor-leer/{id}','paginaAutoresController@index')->name('autor');

/* RUTAS DE LA TIENDA Y EL CARRITO */
//Route::get('/tienda-novedades', 'paginaTiendaController@index')->name('tiendaNovedades');
//Route::get('/tienda-catalogo','paginaTiendaController@catalogo')->name('tiendaCatalogo');
//Route::get('/tienda-145', 'paginaTiendaController@tienda145')->name('tienda145');
Route::get('/libro/{id}', 'paginaTiendaController@libro')->name('libro');
Route::get('/carrito', 'paginaTiendaController@carrito')->name('carrito');
Route::get('/compra', 'paginaTiendaController@compra')->name('compra');

/*--------------------------------------------------- B O R R A R --------------------------------------------------- */
Route::get('/prueba/{id}', 'paginaTiendaController@prueba')->name('prueba');
/*--------------------------------------------------- B O R R A R --------------------------------------------------- */

Route::get('agregar-a-carrito/{id}/{cant}/{formato}', 'paginaTiendaController@addToCart')->name('agregarCarrito');
Route::delete('eliminar-del-carrito', 'paginaTiendaController@remove')->name('eliminarCarrito');

// RUTAS DE COLECCIONES
Route::get('/colecciones', 'paginaTiendaController@colecciones')->name('colecciones');
Route::get('/coleccion/{id}', 'paginaTiendaController@coleccion')->name('coleccion');

/*RUTAS DE GESTIÓN DE AUTORES*/
// Route::get('/adminuno4cinco/autores-uno4cinco', 'gestorAutoresController@indexuno4cinco')->name('autores-uno4cinco')->middleware('auth');
Route::get('/adminuno4cinco/autores-145', 'gestorAutoresController@index145')->name('autores-145');
Route::get('/adminuno4cinco/autores-uno4cinco', 'gestorAutoresController@indexuno4cinco')->name('autores-uno4cinco');
Route::get('/adminuno4cinco/autores-nuevo', 'gestorAutoresController@addAuthor')->name('autores-nuevo');
Route::post('/adminuno4cinco/autores-nuevo', 'gestorAutoresController@storeAuthor')->name('autores-nuevo');
Route::get('/adminuno4cinco/autores-editar/{id}', 'gestorAutoresController@editAuthor')->name('autores-editar');
Route::patch('/adminuno4cinco/autores-editar/{id}', 'gestorAutoresController@updateAuthor')->name('autores-editar');
Route::delete('/adminuno4cinco/autores-eliminar/{id}', 'gestorAutoresController@deleteAuthor')->name('autores-delete');

/*RUTAS DE GESTIÓN DE BLOGS*/
Route::get('/adminuno4cinco/blogs', 'gestorBlogsController@index')->name('verBlogs');
Route::get('/adminuno4cinco/crearblog', 'gestorBlogsController@addBlog')->name('nuevoBlog');
Route::post('/adminuno4cinco/crearblog', 'gestorBlogsController@storeBlog')->name('nuevoBlog');
Route::get('/adminuno4cinco/editarblog/{id}', 'gestorBlogsController@editBlog')->name('editarBlog');
Route::patch('/adminuno4cinco/editarblog/{id}', 'gestorBlogsController@updateBlog')->name('editarBlog');
Route::delete('/adminuno4cinco/eliminarBlogs/{id}', 'gestorBlogsController@deleteBlog')->name('eliminarBlog');

// /GESTIÓN DE LIBROS/
Route::get('/adminuno4cinco/libros', 'gestorLibrosController@index')->name('verLibros');
Route::get('/adminuno4cinco/libros-editar/{id}', 'gestorLibrosController@editBook')->name('libros-editar');
Route::patch('/adminuno4cinco/libros-editar/{id}', 'gestorLibrosController@updateBook')->name('libros-editar');
Route::get('/adminuno4cinco/libros-nuevo', 'gestorLibrosController@newBook')->name('libros-crear');
Route::post('/adminuno4cinco/libros-nuevo', 'gestorLibrosController@storeBook')->name('libros-crear');
Route::delete('/adminuno4cinco/libros-borrar/{id}', 'gestorLibrosController@deleteBook')->name('libros-borrar');

/*RUTAS DE GESTION DE SLIDERS*/
Route::get('/adminuno4cinco/sliders', 'gestorSlidersController@index')->name('verSliders');
Route::get('/adminuno4cinco/crearSlider/{tipo}', 'gestorSlidersController@addSlider')->name('nuevoSlider');
Route::post('/adminuno4cinco/crearSlider/{tipo}', 'gestorSlidersController@storeSlider')->name('nuevoSlider');
Route::patch('/adminuno4cinco/editarSlider/{id}', 'gestorSlidersController@updateSlider')->name('editarSlider');

/*RUTAS DE GESTIÓN DE RESUMEN*/
Route::get('/adminuno4cinco/resumen', 'gestorResumenController@index')->name('resumen');

// RUTAS DE VENTAS
Route::get('/adminuno4cinco/historial', 'gestorVentasController@index')->name('historial');
Route::get('/adminuno4cinco/historial/{id}', 'gestorVentasController@editSell')->name('editarVenta');

/*RUTAS DE PAYPAL*/
Route::post('/paypal/pay', 'PaymentController@payWithPayPal')->name('pagoPayPal');
Route::get('/paypal/status', 'PaymentController@payPalStatus')->name('statusPayPal');
Route::get('/checkout', 'CheckoutController@index')->name('checkout.index');
Route::post('/checkout', 'CheckoutController@store')->name('checkout.store');

Auth::routes(['register' => false]);

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/costo-edicion', function () {
    return view('publicitaria.costoEdicion');
})->name('costoEdicion');

Route::get('/adminuno4cinco', function () {
    return view('gestor.inicio');
})->name('gestorInicio')->middleware('auth');

// GESTION COLECCIONES ----------------------------------------------------------------
Route::get('/adminuno4cinco/colecciones', 'gestorColeccionesController@index')->name('verColecciones');
Route::get('/adminuno4cinco/coleccion-nueva', 'gestorColeccionesController@addCollection')->name('nuevaColeccion');
Route::post('/adminuno4cinco/coleccion-nueva', 'gestorColeccionesController@storeCollection')->name('nuevaColeccion');
Route::get('/adminuno4cinco/coleccion-editar/{id}', 'gestorColeccionesController@editCollection')->name('editarColeccion');
Route::patch('/adminuno4cinco/coleccion-editar/{id}', 'gestorColeccionesController@updateCollection')->name('editarColeccion');
Route::delete('/adminuno4cinco/coleccion-borrar/{id}', 'gestorColeccionesController@deleteCollection')->name('borrarColeccion');

// GESTION DE CUPONES----------------------------------------------------------------------------------------------------------
Route::get('/adminuno4cinco/cupones', 'gestionCuponesController@index')->name('verCupones');
Route::get('/adminuno4cinco/cupon-nuevo', 'gestionCuponesController@addcupon')->name('nuevoCupon');
Route::post('/adminuno4cinco/cupon-nuevo', 'gestionCuponesController@storeCupon')->name('nuevoCupon');
Route::get('/adminuno4cinco/cupon-editar/{id}', 'gestionCuponesController@editCupon')->name('editarCupon');
Route::patch('/adminuno4cinco/cupon-editar/{id}', 'gestionCuponesController@updateCupon')->name('editarCupon');
Route::delete('/adminuno4cinco/cupon-borrar/{id}', 'gestionCuponesController@deleteCupon')->name('eliminarCupon');

Route::get('/descarga', 'DescargasController@descargar')->name('descargar')->middleware('link');

Route::get('/politica-privacidad', function () {
    return view('publicitaria.privacidad');
})->name('avisoPrivacidad');
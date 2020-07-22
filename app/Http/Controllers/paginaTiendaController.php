<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Banner;
use App\Book;
use App\Author;

class paginaTiendaController extends Controller
{
    //NOVEDADES
    public function index(){
        $banners=Banner::where('tipo','libro')->get();
        $books = Book::where('nuevo','1')->orderBy('fechaPublicacion','Desc')->paginate(12);
        return view('publicitaria.tiendaNovedades', ['banners'=>$banners, 'books'=>$books]);
    }

    //CATALOGO
    public function catalogo(){
        $books = Book::join('sellos', 'books.sello_id', '=', 'sellos.id')->select('books.*','sellos.nombre')->where("nombre",'uno4cinco')->orderBy('ventas','Desc')->paginate(12);
        return view('publicitaria.tiendaCatalogo', ['books'=>$books]);
    }

    //145
    public function tienda145(){
        $books = Book::join('sellos', 'books.sello_id', '=', 'sellos.id')->select('books.*','sellos.nombre')->where("nombre",'145')->orderBy('ventas','Desc')->paginate(12);
        return view('publicitaria.tienda145', ['books'=>$books]);
    }
    //libro
    public function libro($id){
        $book = Book::find($id);
        $autor=Author::findOrFail($id);
        return view('publicitaria.libro', ['book' => $book, 'autor'=>$autor]);
    }

    //carrito :v
    public function carrito(){
        $books = Book::all();
        return view('publicitaria.carrito',['books' => $books]);
    }

    //Agrega un producto al carrito o lo actualiza
    public function addToCart($id, $cant, $formato)
    {
        //obtenemos el libro
        $libro = Book::find($id);
 
        //verificamos que el libro exista
        if(!$libro) {
 
            abort(404);
 
        }
 
        //obtenemos el carrito de la cookie
        $cart = session()->get('cart');
 
        // Si el carrito es vacio entonces es el primer producto que se agrega, se crea la variable
        if(!$cart) {
            //si el formato es fisico entonces se guarda su cantidad en fisico, sino se guarda en digital
            if($formato == 'fisico'){
                $cart = [
                        $id => [
                            "cantidadFisico" => $cant,
                            "cantidadDigital" => 0
                        ]
                ];
            }
            else{
                $cart = [
                    $id => [
                        "cantidadFisico" => 0,
                        "cantidadDigital" => 1
                    ]
                ];
            }
            
            //se guarda el carrito en la cookie
            session()->put('cart', $cart);
 
            return;
        }
 
        // si el carrito no esta vacio entonces checa la cantidad y la actualiza
        if(isset($cart[$id])) {
            //checa si se quiere actualizar la version fisica o digital
            if($formato == 'fisico'){
                $cart[$id]['cantidadFisico'] = $cant;
    
                session()->put('cart', $cart);
    
                return;
            }
            else{
                $cart[$id]['cantidadDigital'] = 1;
    
                session()->put('cart', $cart);
    
                return;
            }
 
        }
 
        // Si el producto no existe en el carrito entonces se crea
        if($formato == 'fisico'){
            $cart[$id] = [
                        "cantidadFisico" => $cant,
                        "cantidadDigital" => 0
                        ];
        }
        else{
            $cart[$id] = [
                    "cantidadFisico" => 0,
                    "cantidadDigital" => 1
            ];
        }
 
        session()->put('cart', $cart);
 
        return;
    }
 
    //elimina un producto del carrito
    public function remove(Request $request)
    {
        //se verifica que se obtengan los datos
        if($request->id && $request->formato) {

            //se obtiene el carrito de la cookie
            $cart = session()->get('cart');
            
            //se verifica que el producto exista en el carrito
            if(isset($cart[$request->id])) {

                //se baja la cantidad dependiendo del formato
                if($request->formato == "fisico"){
                    $cart[$request->id]['cantidadFisico'] = 0;
                }
                else if($request->formato == "digital"){
                    $cart[$request->id]['cantidadDigital'] = 0;
                }

                //si el producto tiene ambas cantidades como 0 se elimina del carrito
                if($cart[$request->id]['cantidadDigital'] == 0 && $cart[$request->id]['cantidadFisico'] == 0){
                    unset($cart[$request->id]);
                }
 
                session()->put('cart', $cart);
            }
 
            session()->flash('success', 'Product removed successfully');
        }
    }
}

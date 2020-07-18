<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Banner;
use App\Book;

class paginaTiendaController extends Controller
{
    //NOVEDADES
    public function index(){
        $banners=Banner::where('tipo','libro')->get();
        $books = Book::where('nuevo','1')->orderBy('fechaPublicacion','Desc')->paginate(12);
        return view('publicitaria.tiendaNovedades', ['banners'=>$banners, 'books'=>$books]);
    }

    public function libro($id){
        $book = Book::find($id);
        return view('publicitaria.libro', ['book' => $book]);
    }

    public function carrito(){
        $books = Book::all();
        return view('publicitaria.carrito',['books' => $books]);
    }

    //Agrega un producto al carrito y lo actualiza
    public function addToCart($id, $cant, $formato)
    {
        //obtenemos el libro
        $libro = Book::find($id);
 
        if(!$libro) {
 
            abort(404);
 
        }
 
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

    public function update(Request $request)
    {
        if($request->id and $request->quantity)
        {
            $cart = session()->get('cart');
 
            $cart[$request->id]["quantity"] = $request->quantity;
 
            session()->put('cart', $cart);
 
            session()->flash('success', 'Cart updated successfully');
        }
    }
 
    public function remove(Request $request)
    {
        if($request->id) {
 
            $cart = session()->get('cart');
 
            if(isset($cart[$request->id])) {
 
                unset($cart[$request->id]);
 
                session()->put('cart', $cart);
            }
 
            session()->flash('success', 'Product removed successfully');
        }
    }
}

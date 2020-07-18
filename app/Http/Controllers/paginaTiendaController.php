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
        return view('publicitaria.carrito');
    }

    //Agrega un producto al carrito
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
 
            return redirect()->back()->with('success', 'Product added to cart successfully!');
        }
 
        // if cart not empty then check if this product exist then increment quantity
        if(isset($cart[$id])) {
 
            $cart[$id]['quantity']++;
 
            session()->put('cart', $cart);
 
            return redirect()->back()->with('success', 'Product added to cart successfully!');
 
        }
 
        // if item not exist in cart then add to cart with quantity = 1
        $cart[$id] = [
            "name" => $libro->name,
            "quantity" => 1,
            "price" => $libro->precioFisico,
            "photo" => $libro->tiendaImagen
        ];
 
        session()->put('cart', $cart);
 
        return redirect()->back()->with('success', 'Product added to cart successfully!');
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

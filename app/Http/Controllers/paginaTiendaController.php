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
}

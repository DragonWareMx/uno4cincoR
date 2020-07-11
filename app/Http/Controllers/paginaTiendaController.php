<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Banner;
use App\Book;

class paginaTiendaController extends Controller
{
    public function index(){
        $banners=Banner::where('tipo','libro')->get();
        $books = Book::paginate(12);
        return view('publicitaria.tiendaNovedades', ['banners'=>$banners, 'books'=>$books]);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sell;
use App\Book_Sell;
use App\Book;

class gestorVentasController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    
    
    public function index(){
        $ventas=Sell::orderBy('id','desc')->get();
        $book_sell=Book_Sell::get();
        $books=Book::get();
        // dd($ventas);
        return view ('gestor.historialVentas',['ventas'=>$ventas,'book_sell'=>$book_sell,'books'=>$books]);
    }
    public function estadisticas(){
        return view ('gestor.estadisticasPublico');
    }
}

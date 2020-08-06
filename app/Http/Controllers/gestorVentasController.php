<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sell;
use App\Book_Sell;

class gestorVentasController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    
    
    public function index(){
        $ventas=Sell::get();
        $book_sell=Book_Sell::get();
        //  dd($book_sell);
        return view ('gestor.historialVentas',['ventas'=>$ventas,'book_sell'=>$book_sell]);
    }
    public function estadisticas(){
        return view ('gestor.estadisticasPublico');
    }
}

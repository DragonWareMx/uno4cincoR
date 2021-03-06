<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sell;
use App\Book_Sell;
use App\Book;
use App\Promotion;

class gestorVentasController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    
    
    public function index(){
        $ventas=Sell::orderBy('id','desc')->get();
        $book_sell=Book_Sell::get();
        $books=Book::get();
        $cupones=Promotion::get();
        return view ('gestor.historialVentas',['ventas'=>$ventas,'book_sell'=>$book_sell,'books'=>$books,'cupones'=>$cupones]);
    } 

    public function editSell(Request $request){
        $estatus = $request->estatus;
        $id = $request->id;

        $ventaUpdate=Sell::findOrFail($id);
        $ventaUpdate->status=$estatus;
        $ventaUpdate->save();

        $ventas=Sell::orderBy('id','desc')->get();
        $book_sell=Book_Sell::get();
        $books=Book::get();
        return view ('gestor.historialVentas',['ventas'=>$ventas,'book_sell'=>$book_sell,'books'=>$books]);
        
    }
}

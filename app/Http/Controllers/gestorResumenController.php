<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class gestorResumenController extends Controller
{
    //
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        $today=Carbon::now();
        $ventas=DB::table('sells')
                    ->join('book_sell',function($join){
                        $join->on('sells.id','=','book_sell.sell_id');
                    })
                    ->leftJoin('books','books.id','=','book_sell.book_id')
                    ->get();
        //dd($ventas);
        $librosVenta=DB::select('SELECT titulo,COUNT(*) as cantidadN, descuentoFisico, descuentoDigital 
        from (sells cross join book_sell on sells.id=book_sell.sell_id ) left join books on books.id=book_sell.book_id 
        group by titulo,descuentoFisico,descuentoDigital order by cantidadN desc');
        $ciudadesVenta=DB::select('SELECT ciudad,COUNT(*) as cantidadN
        from (sells cross join book_sell on sells.id=book_sell.sell_id ) left join books on books.id=book_sell.book_id 
        group by ciudad order by cantidadN desc');
                    
        return view('gestor.resumen',['ventas'=>$ventas,'today'=>$today,
        'librosVenta'=>$librosVenta,'ciudadesVenta'=>$ciudadesVenta]);
    }
}

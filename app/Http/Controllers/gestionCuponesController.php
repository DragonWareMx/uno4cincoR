<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Promotion;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;

class gestionCuponesController extends Controller
{
    public function index(){
        $cupones=Promotion::orderBy('id','desc')->paginate(20);
        return view('gestor.cupones', ['cupones'=>$cupones]);
    }
    public function addCupon(){
        return view('gestor.cupones.nuevoCupon');
    }
    public function storeCupon(){
        $data=request()->validate([
            'codigo'=>'required|max:20',
            'tipo'=>'required'
        ]);
        $cupon=new Promotion();
        $cupon->codigo=request('codigo');
        $cupon->limiteFecha=request('limiteFecha');
        $cupon->numUsos=request('limiteUsos');
        $cupon->minimoCompra=request('minimoCompra');
        if (request('reusable')){ $cupon->reusable=1;}
        else {$cupon->reusable=0;}
        if(request('nuevos')){$cupon->nuevos=1;}
        else{$cupon->reusable=0;}
        $cupon->porcentajeDesc=request('PorcentajeDescuento');
        $cupon->valorDesc=request('valorDescuento');
        $cupon->tipo=request('tipo');
        $cupon->save();
        return redirect()->route('verCupones');

    }
}

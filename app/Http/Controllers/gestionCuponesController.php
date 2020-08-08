<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Promotion;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;

class gestionCuponesController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
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
        else{$cupon->nuevos=0;}
        $cupon->porcentajeDesc=request('porcentajeDescuento');
        $cupon->valorDesc=request('valorDescuento');
        $cupon->tipo=request('tipo');
        $cupon->save();
        return redirect()->route('verCupones');
    }
    public function editCupon($id){
        $cupon=Promotion::findOrFail($id);
        return view('gestor.cupones.editarCupon',['cupon'=>$cupon]);
    }
    public function updateCupon($id){
        $data=request()->validate([
            'codigo'=>'required|max:20',
            'tipo'=>'required'
        ]);
        $cupon=Promotion::findOrFail($id);
        $cupon->codigo=request('codigo');
        $cupon->limiteFecha=request('limiteFecha');
        $cupon->numUsos=request('limiteUsos');
        $cupon->minimoCompra=request('minimoCompra');
        if (request('reusable')){ $cupon->reusable=1;}
        else {$cupon->reusable=0;}
        if(request('nuevos')){$cupon->nuevos=1;}
        else{$cupon->nuevos=0;}
        $cupon->porcentajeDesc=request('porcentajeDescuento');
        $cupon->valorDesc=request('valorDescuento');
        $cupon->tipo=request('tipo');
        $cupon->save();
        return redirect()->route('verCupones');
    }
    public function deleteCupon($id){
        $cupon=Promotion::findOrFail($id);
        $cupon->delete();
        return redirect()->route('verCupones');
    }
}

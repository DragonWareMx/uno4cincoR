<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cupon;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;

class gestionCuponesController extends Controller
{
    public function index(){
        $cupones=Cupon::get();
        return view('gestor.cupones', ['cupones'=>$cupones]);
    }
}

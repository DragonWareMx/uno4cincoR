<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Promotion;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;

class gestionCuponesController extends Controller
{
    public function index(){
        $cupones=Promotion::paginate(20);
        return view('gestor.cupones', ['cupones'=>$cupones]);
    }
}

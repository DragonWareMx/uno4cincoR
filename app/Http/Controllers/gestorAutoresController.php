<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class gestorAutoresController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function indexuno4cinco(){
        return view ('gestor.autores.autores-uno4cinco');
    }

    public function index145(){
        return view ('gestor.autores.autores-145');
    }
}

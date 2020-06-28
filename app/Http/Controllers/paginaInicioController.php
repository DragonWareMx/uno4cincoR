<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class paginaInicioController extends Controller
{
    //
    public function index(){
        return view('publicitaria.countdown');
    }

    public function contacto(){
        return view('publicitaria.contacto');
    }

    public function sobreNosotros(){
        return view('publicitaria.sobreNosotros');
    }
}
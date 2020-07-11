<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Banner;
use App\Author;

class paginaAutoresController extends Controller
{
    public function index(){

    }

    public function uno4cinco(){

        $BannerAutores=Banner::where('tipo','autor')->get();
        //poner que ese autor sea de uno4cinco
        $Autores=Author::get();
        return view('publicitaria.autoresUno4cinco',['bannerAutores'=>$BannerAutores, 'autores'=>$Autores]);
    }
}

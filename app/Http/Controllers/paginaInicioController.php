<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Banner;
use App\Author;
use App\Book;

class paginaInicioController extends Controller
{
    //
    public function index(){
        
        $BannerLibros=Banner::where('tipo','libro')->get();
        $BannerAutores=Banner::where('tipo','autor')->get();
        $Libros=Book::get();
        $Autores=Author::get();
        //dd($BannerLibros,$BannerAutores,$Libros,$Autores);
        return view('publicitaria.index',['bannerLibros'=>$BannerLibros, 'bannerAutores'=>$BannerAutores, 
        'libros'=>$Libros, 'autores'=>$Autores]);
    }

    public function contacto(){
        return view('publicitaria.contacto');
    }

    public function sobreNosotros(){
        return view('publicitaria.sobreNosotros');
    }

    public function registro(){
        return view('publicitaria.registro');
    }
}
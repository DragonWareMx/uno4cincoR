<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Banner;
use App\Author;
use App\Book;
use App\Image;
use App\BLog;

class paginaInicioController extends Controller
{
    //
    public function index(){
        
        $BannerLibros=Banner::where('tipo','libro')->where('active','activo')->orderBy('id', 'desc')->limit(5)->get();
        $BannerAutores=Banner::where('tipo','autor')->where('active','activo')->orderBy('id', 'desc')->limit(5)->get();
        $BannerBlogs=Blog::orderBy('id', 'desc')->limit(5)->get();
        $Libros=Book::get();
        $Autores=Author::get();
        $Imagenes=Image::get();
        //dd($BannerLibros,$BannerAutores,$Libros,$Autores);
        return view('publicitaria.index',['bannerLibros'=>$BannerLibros, 'bannerAutores'=>$BannerAutores, 
        'libros'=>$Libros, 'autores'=>$Autores, 'imagenes'=>$Imagenes,'bannerBlogs'=>$BannerBlogs]);
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
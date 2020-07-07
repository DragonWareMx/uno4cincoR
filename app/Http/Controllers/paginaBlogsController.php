<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class paginaBlogsController extends Controller
{
    public function index(){
        
        
        //dd($BannerLibros,$BannerAutores,$Libros,$Autores);
        return view('publicitaria.blogs',[]);
    }
}

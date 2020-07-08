<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog;

class paginaBlogsController extends Controller
{
    public function index(){
        
        $blogs=Blog::get();
        //dd($BannerLibros,$BannerAutores,$Libros,$Autores);
        return view('publicitaria.blogs',['blogs'=>$blogs]);
    }
}

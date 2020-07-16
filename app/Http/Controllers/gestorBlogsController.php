<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Author;
use App\Blog;

class gestorBlogsController extends Controller
{
    public function addBlog()
    {
        $autoresLibro=Author::get();
        $autoresBlog=Blog::groupBy('autor')->get('autor');
        return view ('gestor.blogs.crearBlog',['autoresLibro'=>$autoresLibro,'autoresBlog'=>$autoresBlog]);
    }

    public function editBlog($id){

        $blog=Blog::findOrFail($id);
        $autoresLibro=Author::get();
        $autoresBlog=Blog::groupBy('autor')->get('autor');
        return view ('gestor.blogs.editarBlog',['autoresLibro'=>$autoresLibro,'autoresBlog'=>$autoresBlog,'blog'=>$blog]);
    }
}

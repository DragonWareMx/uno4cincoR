<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Author;
use App\Blog;

class gestorBlogsController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function addBlog()
    {
        $autoresLibro=Author::get();
        $autoresBlog=Blog::groupBy('autor')->get('autor');
        return view ('gestor.blogs.crearBlog',['autoresLibro'=>$autoresLibro,'autoresBlog'=>$autoresBlog]);
    }

    public function storeBlog(Request $request)
    {
        dd($request);
        
    }

    public function editBlog($id){

        $blog=Blog::findOrFail($id);
        $autoresLibro=Author::get();
        $autoresBlog=Blog::groupBy('autor')->whereNotNull('autor')->get('autor');
        return view ('gestor.blogs.editarBlog',['autoresLibro'=>$autoresLibro,'autoresBlog'=>$autoresBlog,'blog'=>$blog]);
    }

    public function updateBlog($id){
        $data=request()->validate([
            'titulo'=>'required|max:250',
            'autorBlog'=>'nullable',
            'autorBlogNuevo'=>'nullable',
            'autorLibro'=>'nullable',
            'tags'=>'required|max:250',
            'contenido'=>'required|max:2500',
            'imagen'=>'nullable|image',
        ]);
        //dd(request());
        $str_arr = explode (",", request('tags'));  
        dd($str_arr); 
    }
}

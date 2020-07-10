<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog;
use App\Author;
use App\Tag;
use App\Banner;

class paginaBlogsController extends Controller
{
    public function index(){
        
        $blogs=Blog::get();
        $bannerBlogs=Banner::where('tipo','blog')->get();
        $authors=Author::get();
        $tags=Tag::get();

        //dd($BannerLibros,$BannerAutores,$Libros,$Autores);
        return view('publicitaria.blogs',['blogs'=>$blogs,'authors'=>$authors,'bannerBlogs'=>$bannerBlogs,'tags'=>$tags]);
    }
    public function show($id){
        $blog=Blog::findOrFail($id);
        $blogAutor=Blog::where('author_id', $blog->author_id)->get();
        return view('publicitaria.blog',['blog'=>$blog, 'blogAutor'=>$blogAutor]);
    }
}

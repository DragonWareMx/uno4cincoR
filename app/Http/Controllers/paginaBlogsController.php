<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog;
use App\Author;
use App\Tag;
use App\Banner;

class paginaBlogsController extends Controller
{
    public function index(Request $request){
        $tipo=$request->tipo;
        $id=$request->id;
        if($tipo){
            if($tipo=='autor'){
                $blogs=Blog::where('author_id',$id)->paginate(10);
                $bannerBlogs=Banner::where('tipo','blog')->get();
                $authors=Author::get();
                $tags=Tag::get();
                return view('publicitaria.blogs',['blogs'=>$blogs,'authors'=>$authors,'bannerBlogs'=>$bannerBlogs,'tags'=>$tags]);
            }
            if($tipo=='tag'){
                $blogs=Blog::where('author_id',$id)->paginate(10);
                $bannerBlogs=Banner::where('tipo','blog')->get();
                $authors=Author::get();
                $tags=Tag::get();
                return view('publicitaria.blogs',['blogs'=>$blogs,'authors'=>$authors,'bannerBlogs'=>$bannerBlogs,'tags'=>$tags]);
            }
        }
        else{
            $blogs=Blog::paginate(10);
            $bannerBlogs=Banner::where('tipo','blog')->get();
            $authors=Author::get();
            $tags=Tag::get();
            return view('publicitaria.blogs',['blogs'=>$blogs,'authors'=>$authors,'bannerBlogs'=>$bannerBlogs,'tags'=>$tags]);
        }
    }
    public function show($id){
        $blog=Blog::findOrFail($id);
        $blogAutor=Blog::where('author_id', $blog->author_id)->get();
        return view('publicitaria.blog',['blog'=>$blog, 'blogAutor'=>$blogAutor]);
    }
}

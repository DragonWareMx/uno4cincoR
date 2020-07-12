<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog;
use App\Author;
use App\Tag;
use App\Banner;
use App\Blog_tag;

class paginaBlogsController extends Controller
{
    public function index(Request $request){
        $tipo=$request->tipo;
        $id=$request->id;
        $nombre=$request->nombre;
        if($tipo){
            if($tipo=='autor'){
                $blogs=Blog::orderBy('fecha','desc')->orderBy('id','desc')->where('author_id',$id)->paginate(10);
            }
            if($tipo=="autor2"){
                $blogs=Blog::orderBy('fecha','desc')->orderBy('id','desc')->where('autor',$nombre)->paginate(10);
            }
            if($tipo=='tag'){
                $blogTags=Blog_tag::select('blog_id')->where('tag_id',$id)->get();
                $blogs=Blog::orderBy('fecha','desc')->orderBy('id','desc')->whereIn('id',$blogTags)->paginate(10);
            }
        }
        else{
            $blogs=Blog::orderBy('fecha','desc')->orderBy('id','desc')->paginate(10);
        }
        $bannerBlogs=Banner::where('tipo','blog')->get();
        $blogAutores=Blog::select('author_id')->groupBy('author_id')->get();
        $authors=Author::whereIn('id',$blogAutores)->get();
        $authors2=Blog::orderBy('autor')->select('autor')->groupBy('autor')->get();
        $tags=Tag::get();
        return view('publicitaria.blogs',['blogs'=>$blogs,'authors'=>$authors,'bannerBlogs'=>$bannerBlogs,'tags'=>$tags,'authors2'=>$authors2]);
    }
    public function show($id){
        $blog=Blog::findOrFail($id);
        $blogAutor=Blog::where('author_id', $blog->author_id)->get();
        return view('publicitaria.blog',['blog'=>$blog, 'blogAutor'=>$blogAutor]);
    }
}

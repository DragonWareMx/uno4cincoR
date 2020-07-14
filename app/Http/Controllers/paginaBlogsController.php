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
            if(request('clasificacion')=='titulo'){
                $blogs=Blog::orderBy('fecha','desc')->orderBy('id','desc')->where('titulo','like',"%".request('busqueda')."%")->paginate(10);
            }
            else if(request('clasificacion')=='autor'){
                $blogs=Blog::orderBy('fecha','desc')->orderBy('blogs.id','desc')->leftJoin('authors', 'blogs.author_id', '=', 'authors.id')
                ->where('blogs.autor','like',"%".request('busqueda')."%")
                ->orWhere('authors.nombre','like',"%".request('busqueda')."%")
                ->paginate(10);
            }
            else if(request('clasificacion')=='contenido'){
                $blogs=Blog::orderBy('fecha','desc')->orderBy('id','desc')->where('contenido','like',"%".request('busqueda')."%")->paginate(10);
            }
            else if(request('clasificacion')=='tags'){
                $busquedaTags = str_replace("#", "", request('busqueda'));
                $separaTags=explode(" ",$busquedaTags);
                $blogsTotales=Blog::orderBy('fecha','desc')->orderBy('blogs.id','desc')
                    ->leftJoin('blog_tag','blogs.id','=','blog_tag.blog_id')
                    ->leftJoin('tags','blog_tag.tag_id','=','tags.id')
                    ->whereIn('tags.nombre',$separaTags)
                    ->get();
                $arregloBlogs=[];
                $i=0;
                foreach ($blogsTotales as $totales) {
                   $arregloBlogs[$i]=$blogsTotales[$i]['titulo']; 
                   $i++;
                }
                $blogs=Blog::whereIn('titulo',$arregloBlogs)->paginate(10);
            }
            else{
                $blogs=Blog::groupBy('id')->orderBy('fecha','desc')->orderBy('id','desc')->paginate(10);
            }
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
        $tags=Tag::get();
        return view('publicitaria.blog',['blog'=>$blog, 'blogAutor'=>$blogAutor, 'tags'=>$tags]);
    }
}

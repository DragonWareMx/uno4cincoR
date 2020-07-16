<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Author;
use App\Blog;
use App\Tag;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

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
        $tags=DB::table('blog_tag')
        ->select(DB::raw('*'))
        ->where('blog_id', '=', $blog->id)
        ->get();
        $tagsActuales="";
        foreach($tags as $tag){
            $tagName=Tag::findOrFail($tag->tag_id);
            $tagsActuales=$tagsActuales.$tagName->nombre.",";
        }
        $autoresLibro=Author::get();
        $autoresBlog=Blog::groupBy('autor')->whereNotNull('autor')->get('autor');
        return view ('gestor.blogs.editarBlog',['autoresLibro'=>$autoresLibro,'autoresBlog'=>$autoresBlog,'blog'=>$blog,'tagsActuales'=>$tagsActuales]);
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
        //Esta parte de aqui es para sacar los tags, primero descompone los tags en un arreglo, despues 
        //se recorre ese arreglo y se revisa si existen o no en la tabla Tags, en caso de que no existan se guardan ahi
        $arrTags = explode (",", request('tags'));  
        foreach($arrTags as $tagsNuevos){
            $tagActual=Tag::where('nombre',$tagsNuevos)->first();
            if(!$tagActual){
                $tagNew=new Tag();
                $tagNew->nombre=$tagsNuevos;
                $tagNew->save();
            }
        }
        //después se crea otro array para almacenar los ID's que tiene cada tag
        $arrTagsID=$arrTags;
        $contador=0;
        foreach($arrTags as $tagsNuevos){
            $tagActual=Tag::where('nombre',$tagsNuevos)->first();
            $arrTagsID[$contador]=$tagActual->id;
            $contador++;
        }
        
        //aquí instanciamos el blog para ya updatear su información;
        $blog=Blog::findOrFail($id);
        $blog->titulo=request('titulo');
        $blog->contenido=request('contenido');
        $mytime = Carbon::now();
        $blog->fecha=$mytime->toDateString();
        if(request('autorBlogNuevo')!=NULL){
            $blog->autor=request('autorBlogNuevo');
        }
        else{
            $blog->autor=request('autorBlog');
        }
        $blog->author_id=request('autorLibro');
        //esta es la parte para guardar la imagen
        if(request('imagen')==null){
            $newFileName=$blog->imagen;
        }
        else{
        $fileNameWithTheExtension = request('imagen')->getClientOriginalName();
        $fileName = pathinfo( $fileNameWithTheExtension,PATHINFO_FILENAME);
        $extension = request('imagen')->getClientOriginalExtension();
        $newFileName=$fileName.'_'.time().'.'.$extension;
        $path = request('imagen')->storeAs('/public/blogs/',$newFileName);

        $oldImage=public_path().'/storage/blogs/'.$blog->imagen;
            if(file_exists($oldImage)){
                unlink($oldImage);
            }
        }
        $blog->imagen=$newFileName;
        //aqui termina la parte de las imagenes
        $blog->save();

        //Ahora falta asignarle los tags al blog recien guardado
        $blog->tags()->sync($arrTagsID);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Author;
use App\Book;
use App\Blog;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;

class gestorAutoresController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function indexuno4cinco(){
        $autor=Author::with('books')->get();
        $uno4cinco=[];
        $cont=0;
        
        foreach($autor as $autor)
        {
            foreach($autor->books as $libro){
                if($libro->sello_id==1){
                    $uno4cinco[$cont]=$autor->id;
                }
                $cont++;
            }
        }

        $blog=Blog::whereNotNull('author_id')->get();
        $autoruno4cinco=Author::whereIn('id',$uno4cinco)->distinct()->paginate(9);
        return view ('gestor.autores.autores-uno4cinco',['autoruno4cinco'=>$autoruno4cinco, 'blogs'=>$blog]);
    }

    public function index145(){
        $autor=Author::with('books')->get();
        $a145=[];
        $cont=0;
        
        foreach($autor as $autor)
        {
            foreach($autor->books as $libro){
                if($libro->sello_id==1){
                    $a145[$cont]=$autor->id;
                }
                $cont++;
            }
        }
        $blog=Blog::whereNotNull('author_id')->get();
        $autor145=Author::whereNotIn('id',$a145)->distinct()->paginate(9); 
        return view ('gestor.autores.autores-145',['autor145'=>$autor145, 'blogs'=>$blog]);
    }

    public function addAuthor(){
        
        return view ('gestor.autores.autores-nuevo');
    }

    public function editAuthor($id){
        $break=explode(',',$id);
        $number=$break[0];
        $autor=Author::findOrFail($number);
        return view ('gestor.autores.autores-editar',['autor'=>$autor, 'id'=>$id]);
    }

    public function updateAuthor($id){
        $data=request()->validate([
            'nombre'=>'required|max:191',
            'biografia'=>'required|max:65535',
            'nacimiento'=>'date',
            'muerte'=>'nullable|date',
            'imagen'=>'nullable|image',
            'fotoPerfil'=>'nullable|image'
        ]);

        $break=explode(',',$id);
        $id=$break[0];
        $ruta=$break[1];

        try{
            DB::transaction(function() use ($id)
            {
                $autor=Author::findOrFail($id);
                $autor->nombre=request('nombre');
                $autor->descripcion=request('biografia');
                $autor->fechaNac=request('nacimiento');
                $autor->fechaMuerte=request('muerte');
        
                if(request('imagen')==null){
                    $newFileName=$autor->foto;
                }
                else{
                $fileNameWithTheExtension = request('imagen')->getClientOriginalName();
                $fileName = pathinfo( $fileNameWithTheExtension,PATHINFO_FILENAME);
                $extension = request('imagen')->getClientOriginalExtension();
                $newFileName=$fileName.'_'.time().'.'.$extension;
                $path = request('imagen')->storeAs('/public/autores/',$newFileName);
        
                $oldImage=public_path().'/storage/autores/'.$autor->foto;
                    if(file_exists($oldImage)){
                        unlink($oldImage);
                    }
                }
                $autor->foto=$newFileName;

                if(request('fotoPerfil')==null){
                    $newFileName=$autor->fotoPerfil;
                }
                else{
                $fileNameWithTheExtension = request('fotoPerfil')->getClientOriginalName();
                $fileName = pathinfo( $fileNameWithTheExtension,PATHINFO_FILENAME);
                $extension = request('fotoPerfil')->getClientOriginalExtension();
                $newFileName=$fileName.'_'.time().'.'.$extension;
                $path = request('fotoPerfil')->storeAs('/public/autores/',$newFileName);
        
                $oldImage=public_path().'/storage/autores/'.$autor->fotoPerfil;
                    if(file_exists($oldImage)){
                        unlink($oldImage);
                    }
                }
                $autor->fotoPerfil=$newFileName;
                $autor->save();
            });
        }
        catch(QueryException $ex){
            return redirect()->back()->withErrors(['error' => 'ERROR: No se pudieron actualizar los datos del autor!']);
        }

        if($ruta==1){
            return redirect()->route('autores-uno4cinco');
        }
        else{
            return redirect()->route('autores-145');
        }
        
    }

    public function storeAuthor(){
        $data=request()->validate([
            'nombre'=>'required|max:191',
            'biografia'=>'required|max:65535',
            'nacimiento'=>'date',
            'muerte'=>'nullable|date',
            'imagen'=>'required|image',
            'fotoPerfil'=>'required|image'
        ]);
        
        try{
            DB::transaction(function()
            {
                $autor=new Author();
                $autor->nombre=request('nombre');
                $autor->descripcion=request('biografia');
                $autor->fechaNac=request('nacimiento');
                $autor->fechaMuerte=request('muerte');
        
                $fileNameWithTheExtension = request('imagen')->getClientOriginalName();
                $fileName = pathinfo( $fileNameWithTheExtension,PATHINFO_FILENAME);
                $extension = request('imagen')->getClientOriginalExtension();
                $newFileName=$fileName.'_'.time().'.'.$extension;
                $path = request('imagen')->storeAs('/public/autores/',$newFileName);
        
                $autor->foto=$newFileName;
                
                $fileNameWithTheExtension = request('fotoPerfil')->getClientOriginalName();
                $fileName = pathinfo( $fileNameWithTheExtension,PATHINFO_FILENAME);
                $extension = request('fotoPerfil')->getClientOriginalExtension();
                $newFileName=$fileName.'_'.time().'.'.$extension;
                $path = request('fotoPerfil')->storeAs('/public/autores/',$newFileName);
        
                $autor->fotoPerfil=$newFileName;
                // dd($autor);
                $autor->save();
            });
        }
        catch(QueryException $ex){
            return redirect()->back()->withErrors(['error' => 'ERROR: No se pudo guardar el autor!']);
        }
        return redirect()->route('autores-145');
    }

    public function deleteAuthor($id){
        $break=explode(',',$id);
        $id=$break[0];
        $ruta=$break[1];

        $autor=Author::findOrFail($id);

        $oldImage=public_path().'/storage/autores/'.$autor->foto;

        if(file_exists($oldImage)){
            unlink($oldImage);
        }

        $autor->delete();


        if($ruta==1){
            return redirect()->route('autores-uno4cinco');
        }
        else{
            return redirect()->route('autores-145');
        }
    }
}

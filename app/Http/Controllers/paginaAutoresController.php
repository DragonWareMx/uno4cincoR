<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Banner;
use App\Author;
use App\Book;


class paginaAutoresController extends Controller
{
    public function index($id){
        $autor=Author::findOrFail($id);
        // dd($autor);
        // $idLibro=Book::with('authors')->get();
        // $cont=0;
        // $libros=[];
        // foreach($idLibro as $idLibro)
        // {
        //     if($idLibro->id==$id){

        //     }
        // }
        // // $libros=$idLibro->select('book_id')->where('book_id',$id)->get();
        
        // dd($idLibro);

        return view('publicitaria.autor',['autor'=>$autor]);
    }

    public function uno4cinco(){
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

        if(request('clasificacion')=='nombre'){
            $autoruno4cinco=Author::where('nombre','like',"%".request('busqueda')."%")->whereIn('id',$uno4cinco)->distinct()->paginate(4);
        }
        else if(request('clasificacion')=='descripcion'){
            $autoruno4cinco=Author::where('descripcion','like',"%".request('busqueda')."%")->whereIn('id',$uno4cinco)->distinct()->paginate(4);
        }
        else if(request('clasificacion')=='obras'){
            $autoruno4cinco=Author::leftJoin('author_book','authors.id','=','author_book.author_id')
                    ->leftJoin('books','author_book.book_id','=','books.id')
                    ->where('books.titulo','like',"%".request('busqueda')."%")
                    ->whereIn('authors.id',$uno4cinco)
                    ->distinct()
                    ->paginate(4);
        }
        else{
            $autoruno4cinco=Author::whereIn('id',$uno4cinco)->distinct()->paginate(4);
        }

        $BannerAutores=Banner::wherein('id',$uno4cinco)->get();
        
        return view('publicitaria.autoresUno4cinco',['bannerAutores'=>$BannerAutores, 'autoruno4cinco'=>$autoruno4cinco]);
    }

    public function autores145(){
        $autor=Author::with('books')->get();
        $uno4cinco=[];
        $cont=0;
        foreach($autor as $autor)
        {
            foreach($autor->books as $libro){
                if($libro->sello_id==2){
                    $uno4cinco[$cont]=$autor->id;
                }
                $cont++;
            }
        }

        if(request('clasificacion')=='nombre'){
            $autoruno4cinco=Author::where('nombre','like',"%".request('busqueda')."%")->whereIn('id',$uno4cinco)->distinct()->paginate(4);
        }
        else if(request('clasificacion')=='descripcion'){
            $autoruno4cinco=Author::where('descripcion','like',"%".request('busqueda')."%")->whereIn('id',$uno4cinco)->distinct()->paginate(4);
        }
        else if(request('clasificacion')=='obras'){
            $autoruno4cinco=Author::leftJoin('author_book','authors.id','=','author_book.author_id')
                    ->leftJoin('books','author_book.book_id','=','books.id')
                    ->where('books.titulo','like',"%".request('busqueda')."%")
                    ->whereIn('authors.id',$uno4cinco)
                    ->distinct()
                    ->paginate(4);
        }
        else{
            $autoruno4cinco=Author::whereIn('id',$uno4cinco)->distinct()->paginate(4);
        }
        $BannerAutores=Banner::wherein('id',$uno4cinco)->get();
        
        return view('publicitaria.autores145',['bannerAutores'=>$BannerAutores, 'autoruno4cinco'=>$autoruno4cinco]);
    }
}

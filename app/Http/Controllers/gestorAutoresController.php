<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Author;
use App\Book;

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
        $autoruno4cinco=Author::whereIn('id',$uno4cinco)->distinct()->paginate(9);
        return view ('gestor.autores.autores-uno4cinco',['autoruno4cinco'=>$autoruno4cinco]);
    }

    public function index145(){
        $autor=Author::with('books')->get();
        $a145=[];
        $cont=0;
        
        foreach($autor as $autor)
        {
            foreach($autor->books as $libro){
                if($libro->sello_id!=1){
                    $a145[$cont]=$autor->id;
                }
                $cont++;
            }
        }
        $autor145=Author::whereIn('id',$a145)->distinct()->paginate(9);
        return view ('gestor.autores.autores-145',['autor145'=>$autor145]);
    }

    public function addAuthor(){
        return view ('gestor.autores.nuevoAutor');
    }
    public function storeAuthor(){


        return redirect()->route('autores-145');
    }
}

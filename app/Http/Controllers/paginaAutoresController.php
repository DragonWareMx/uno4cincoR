<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Banner;
use App\Author;
use App\Book;


class paginaAutoresController extends Controller
{
    public function index($id){
        $autor=Author::where('id',$id)->distinct()->get();
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
        $autoruno4cinco=Author::whereIn('id',$uno4cinco)->distinct()->paginate(9);
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
        $autoruno4cinco=Author::whereIn('id',$uno4cinco)->distinct()->paginate(9);
        $BannerAutores=Banner::wherein('id',$uno4cinco)->get();
        
        return view('publicitaria.autores145',['bannerAutores'=>$BannerAutores, 'autoruno4cinco'=>$autoruno4cinco]);
    }
}

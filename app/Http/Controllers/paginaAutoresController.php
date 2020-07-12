<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Banner;
use App\Author;
use App\Book;


class paginaAutoresController extends Controller
{
    public function index(){
        return view('publicitaria.autor');
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
        $autoruno4cinco=Author::whereIn('id',$uno4cinco)->distinct()->get();
        $BannerAutores=Banner::wherein('id',$uno4cinco)->get();
        
        return view('publicitaria.autoresUno4cinco',['bannerAutores'=>$BannerAutores, 'autoruno4cinco'=>$autoruno4cinco]);
    }
}

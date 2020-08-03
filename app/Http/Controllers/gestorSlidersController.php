<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Author;
use App\Book;
use App\Blog;
use App\Banner;

class gestorSlidersController extends Controller
{
    public function index(){
        $BannerLibros=Banner::where('tipo','libro')->where('active','activo')->orderBy('id', 'desc')->limit(5)->get();
        $BannerAutores=Banner::where('tipo','autor')->where('active','activo')->orderBy('id', 'desc')->limit(5)->get();
        $BannerBlogs=Banner::where('tipo','blog')->get();
        return view('gestor.sliders', ['bannerLibros'=>$BannerLibros, 'bannerAutores'=>$BannerAutores, 
        'bannerBlogs'=>$BannerBlogs]);
    }

    public function addSlider($tipo){
        $Banners=Banner::where('tipo',$tipo)->where('active','inactivo')->get();

        if($tipo=='libro'){
            $Relaciones=Book::get();
            $aux=true;
        }
        else{
            $Relaciones=Author::get();
            $aux=false;
        }
        
        return view('gestor.addSlider', ['banners'=>$Banners, 'relaciones'=>$Relaciones, 'aux'=>$aux]);
    }

    public function storeSlider($tipo)
    {
        $data=request()->validate([ 
            'imagenPC'=>'nullable|image',
            'imagenCell'=>'nullable|image',
            'relacionBanner'=>'nullable',
            'imgSelected'=>'nullable',
        ]);

        try{
            
                if(request('imgSelected')){
                    $banner=Banner::findOrFail(request('imgSelected'));
                    $banner->active='activo';

                    $banner->save();
                }
                else{
                    $banner=new Banner();
                    //para el formato de imagen 

                    $fileNameWithTheExtension = request('imagenPC')->getClientOriginalName();
                    $fileName = pathinfo( $fileNameWithTheExtension,PATHINFO_FILENAME);
                    $extension = request('imagenPC')->getClientOriginalExtension();
                    $newFileNamePC=$fileName.'_'.time().'.'.$extension;
                    $path = request('imagenPC')->storeAs('public/banners/',$newFileNamePC);
                    
                    $fileNameWithTheExtension = request('imagenCell')->getClientOriginalName();
                    $fileName = pathinfo( $fileNameWithTheExtension,PATHINFO_FILENAME);
                    $extension = request('imagenCell')->getClientOriginalExtension();
                    $newFileNameCell=$fileName.'_'.time().'.'.$extension;
                    $path = request('imagenCell')->storeAs('public/banners/',$newFileNameCell);
                    

                    $banner->imagenPC=$newFileNamePC;
                    $banner->imagenCell=$newFileNameCell;
                    
                    //termina formato imagenes

                    $banner->tipo=$tipo;
                    $banner->active='activo';
                    $banner->link='http://uno4cinco.com/registro';
                    
                    if($tipo=='autor'){
                        $banner->author_id=request('relacionBanner');
                    }
                    else{
                        $banner->book_id=request('relacionBanner');
                    }

                    $banner->save();
                }
            
        }
        catch(QueryException $ex){
            return redirect()->back()->withErrors(['error' => 'ERROR: No se pudo guardar el slider!']);
        }
        return redirect()->route('verSliders');
    }

    public function updateSlider($id){
  
        try{
                $banner=Banner::findOrFail($id);
                $banner->active='inactivo';

                $banner->save();
        }
        catch(QueryException $ex){
            return redirect()->back()->withErrors(['error' => 'ERROR: No se pudo actualizar el slider!']);
        }

        return redirect()->route('verSliders');
    }

}

 
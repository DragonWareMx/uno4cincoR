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
        $BannerLibros=Banner::where('tipo','libro')->get();
        $BannerAutores=Banner::where('tipo','autor')->get();
        $BannerBlogs=Banner::where('tipo','blog')->get();
        return view('gestor.sliders', ['bannerLibros'=>$BannerLibros, 'bannerAutores'=>$BannerAutores, 
        'bannerBlogs'=>$BannerBlogs]);
    }
    public function addSlider($tipo){
        $Banners=Banner::where('tipo',$tipo)->get();
        return view('gestor.addSlider', ['banners'=>$Banners]);
    }
}

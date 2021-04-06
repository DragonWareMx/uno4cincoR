<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Banner;
use App\Author;
use App\Book;
use App\Image;
use App\Blog;

class paginaInicioController extends Controller
{
    //
    public function index(){
        
        $BannerLibros=Banner::where('tipo','libro')->where('active','activo')->orderBy('id', 'desc')->limit(5)->get();
        $BannerAutores=Banner::where('tipo','autor')->where('active','activo')->orderBy('id', 'desc')->limit(5)->get();
        $BannerBlogs=Blog::orderBy('id', 'desc')->limit(5)->get();
        $Libros=Book::get();
        $Autores=Author::get();
        $Imagenes=Image::get();
        //dd($BannerLibros,$BannerAutores,$Libros,$Autores);
        return view('publicitaria.index',['bannerLibros'=>$BannerLibros, 'bannerAutores'=>$BannerAutores, 
        'libros'=>$Libros, 'autores'=>$Autores, 'imagenes'=>$Imagenes,'bannerBlogs'=>$BannerBlogs]);
    }

    //busqueda
    public function busqueda($tipo, $id){
        $resultado = null;

        if(!isset($_REQUEST["filtro"]) || !isset($_REQUEST["orden"])){
            return $resultado;
        }

        switch($tipo){
            case 'index':
                $resultado = Book::where('nuevo','1')->orderBy('fechaPublicacion','Desc')->with("collection");
                break;
            case 'catalogo':
                $resultado = Book::join('sellos', 'books.sello_id', '=', 'sellos.id')->select('books.*','sellos.nombre')->where("sellos.nombre",'uno4cinco')->orderBy('ventas','Desc');
                break;
            case '145':
                $resultado = Book::join('sellos', 'books.sello_id', '=', 'sellos.id')->select('books.*','sellos.nombre')->where("sellos.nombre",'145')->orderBy('ventas','Desc');
                break;
            case 'coleccion':
                $resultado = Book::where('collection_id',$id)->orderBy('ventas','Desc');
                break;
            case 'colecciones':
                //Obtiene unicamente las colecciones que se encuentren relacionadas con al menos un libro y lo convierte en un arreglo de IDs
                //esto se hace porque usar paginate con select distinct causa problemas
                $collectionsIds = Collection::select('collections.id')
                                            ->join('books', 'books.collection_id', '=', 'collections.id')
                                            ->distinct()
                                            ->pluck('id')->toArray();
                //obtiene las colecciones
                $resultado = Collection::whereIn('id', $collectionsIds)->orderBy('created_at','Desc');
                break;
        }

        // switch(request('clasificacion')){
        //     case 'titulo':
        //         $resultado = $resultado->where('titulo','like',"%".request('busqueda')."%")->paginate(12);
        //         break;
        //     case 'autor':
        //         $resultado = $resultado->leftJoin('author_book', 'books.id', '=', 'author_book.book_id')
        //                                 ->leftJoin('authors','author_book.author_id','=','authors.id')
        //                                 ->where('authors.nombre','LIKE',"%".request('busqueda')."%")->paginate(12);
        //         break;
        //     case 'precio':
        //         if(strcasecmp(request('busqueda'),'gratis') == 0){
        //             $request = '0.00';
        //             $resultado = $resultado->where('books.precioFisico','LIKE',"".$request."")
        //                                     ->orWhere('books.precioDigital','LIKE',"".$request."")->paginate(12);
        //         }
        //         else{
        //             $request = request('busqueda');
        //             $resultado = $resultado->where('books.precioFisico','LIKE',"%".$request."%")
        //                                     ->orWhere('books.precioDigital','LIKE',"%".$request."%")->paginate(12);
        //         }
        //         break;
        //     case 'contenido':
        //         $resultado = $resultado->where('sinopsis','like',"%".request('busqueda')."%")->paginate(12);
        //         break;
        //     case 'genero':
        //         $resultado = $resultado->leftJoin('book_genre', 'books.id', '=', 'book_genre.book_id')
        //                                 ->leftJoin('genres','book_genre.genre_id','=','genres.id')
        //                                 ->where('genres.nombre','LIKE',"%".request('busqueda')."%")->paginate(12);
        //         break;
        //     case 'collecion':
        //         $resultado = $resultado->join('collections', 'books.collection_id', '=', 'collections.id')
        //                                 ->select('books.*','collections.nombre')
        //                                 ->where('collections.nombre','like',"%".request('busqueda')."%")->paginate(12);
        //         break;
        //     case 'colecciones':
        //         $resultado = $resultado->where('nombre','LIKE',"%".request('busqueda')."%")->paginate(12);
        //         break;
        //     default:
        //         $resultado = $resultado->paginate(12);
        // }

        switch($_REQUEST["filtro"]){
            case 'titulo':
                switch($_REQUEST["orden"]){
                    case 'az':
                        $resultado = $resultado->orderBy('titulo','Asc')->paginate(12);
                        break;
                    case 'za':
                        $resultado = $resultado->orderBy('titulo','Desc')->paginate(12);
                        break;
                    case 'ant':
                        $resultado = $resultado->orderBy('fechaPublicacion','Asc')->paginate(12);
                        break;
                    case 'nue':
                        $resultado = $resultado->orderBy('fechaPublicacion','Desc')->paginate(12);
                        break;
                    default:
                        $resultado = $resultado->orderBy('titulo','Asc')->paginate(12);
                        break;
                }
                break;
            case 'autor':
                $resultado = $resultado->leftJoin('author_book', 'books.id', '=', 'author_book.book_id')
                                        ->leftJoin('authors','author_book.author_id','=','authors.id');
                switch($_REQUEST["orden"]){
                    case 'az':
                        $resultado = $resultado->orderBy('authors.nombre','Asc')->paginate(12);
                        break;
                    case 'za':
                        $resultado = $resultado->orderBy('authors.nombre','Desc')->paginate(12);
                        break;
                    case 'ant':
                        $resultado = $resultado->orderBy('authors.created_at','Asc')->paginate(12);
                        break;
                    case 'nue':
                        $resultado = $resultado->orderBy('authors.created_at','Desc')->paginate(12);
                        break;
                    default:
                        $resultado = $resultado->orderBy('authors.nombre','Asc')->paginate(12);
                        break;
                }
                break;
            case 'genero':
                $resultado = $resultado->leftJoin('book_genre', 'books.id', '=', 'book_genre.book_id')
                                        ->leftJoin('genres','book_genre.genre_id','=','genres.id');
                
                //Obtiene unicamente los generos que se encuentren relacionadas con al menos un libro y lo convierte en un arreglo de IDs
                //esto se hace porque usar paginate con select distinct causa problemas
                $genresIDS = Genre::select('genres.id')
                                    ->Join('book_genre', 'genres.id', '=', 'book_genre.genre_id')
                                    ->distinct()
                                    ->pluck('id')->toArray();
                //obtiene los generos
                $genres = Genre::whereIn('id', $genresIDS)->orderBy('created_at','Desc')->get();

                if(is_numeric($_REQUEST["orden"]) && in_array($_REQUEST["orden"], $genresIDS)){
                    $resultado = $resultado->where('genres.id','=',$_REQUEST["orden"])->orderBy('genres.nombre','Asc')->paginate(12);
                }
                else{
                    $resultado = $resultado->where('genres.id','=',$genresIDS[0])->orderBy('genres.nombre','Asc')->paginate(12);
                }
                break;
            case 'coleccion':
                $resultado = $resultado->join('collections', 'books.collection_id', '=', 'collections.id')
                                        ->select('books.*','collections.nombre');
                switch($_REQUEST["orden"]){
                    case 'az':
                        $resultado = $resultado->orderBy('collections.nombre','Asc')->paginate(12);
                        break;
                    case 'za':
                        $resultado = $resultado->orderBy('collections.nombre','Desc')->paginate(12);
                        break;
                    case 'ant':
                        $resultado = $resultado->orderBy('collections.created_at','Asc')->paginate(12);
                        break;
                    case 'nue':
                        $resultado = $resultado->orderBy('collections.created_at','Desc')->paginate(12);
                        break;
                    default:
                        $resultado = $resultado->orderBy('collections.nombre','Asc')->paginate(12);
                        break;
                }
                break;
            case 'colecciones':
                $resultado = $resultado->where('nombre','LIKE',"%".request('busqueda')."%")->paginate(12);
                break;
            default:
                $resultado = $resultado->paginate(12);
        }

        return $resultado;
    }


    public function tinyversion(){
        $books = $this->busqueda("catalogo",0);

        if(!$books)
            $books = Book::join('sellos', 'books.sello_id', '=', 'sellos.id')->select('books.*','sellos.nombre')->where("nombre",'uno4cinco')->orderBy('ventas','Desc')->orderBy('titulo','Asc')->paginate(12);
        return view('publicitaria.index', ['books'=>$books]);
    }

    public function contacto(){
        return view('publicitaria.contacto');
    }

    public function sobreNosotros(){
        return view('publicitaria.sobreNosotros');
    }

    public function registro(){
        return view('publicitaria.registro');
    }
}
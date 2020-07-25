<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;
use App\Author;
class gestorLibrosController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    
    
    public function index(){
        if(request('clasificacion')=='Catalogo'){
            if(request('busqueda')){
                $busqueda=request('busqueda');
                $booksTotales=Book::orderBy('fechaPublicacion','desc')->orderBy('books.id','desc')
                    ->leftJoin('author_book', 'books.id', '=', 'author_book.book_id')
                    ->leftJoin('authors','author_book.author_id','=','authors.id')
                    ->where('books.titulo','LIKE',"%$busqueda%")
                    ->orWhere('books.precioFisico','LIKE',"%$busqueda%")
                    ->orWhere('books.precioDigital','LIKE',"%$busqueda%")
                    ->orWhere('books.sinopsis','LIKE',"%$busqueda%")
                    ->orWhere('books.fechaPublicacion','LIKE',"%$busqueda%")
                    ->orWhere('authors.nombre','LIKE',"%$busqueda%")
                    ->select('books.id as id')
                    ->get();
                $books=Book::where('sello_id',1)->whereIn('id',$booksTotales)->paginate(15);
            }
            else{
                $books=Book::where('sello_id',1)->paginate(15);
            }
            $clasificacion='Catalogo';
        }
        else if(request('clasificacion')=='145'){
            if(request('busqueda')){
                $busqueda=request('busqueda');
                $booksTotales=Book::orderBy('fechaPublicacion','desc')->orderBy('books.id','desc')
                    ->leftJoin('author_book', 'books.id', '=', 'author_book.book_id')
                    ->leftJoin('authors','author_book.author_id','=','authors.id')
                    ->where('books.titulo','LIKE',"%$busqueda%")
                    ->orWhere('books.precioFisico','LIKE',"%$busqueda%")
                    ->orWhere('books.precioDigital','LIKE',"%$busqueda%")
                    ->orWhere('books.sinopsis','LIKE',"%$busqueda%")
                    ->orWhere('books.fechaPublicacion','LIKE',"%$busqueda%")
                    ->orWhere('authors.nombre','LIKE',"%$busqueda%")
                    ->select('books.id as id')
                    ->get();
                $books=Book::where('sello_id',2)->whereIn('id',$booksTotales)->paginate(15);
            }
            else{
                $books=Book::where('sello_id',2)->paginate(15);
            }
            $clasificacion='145';
        }
        else{
            if(request('busqueda')){
                $busqueda=request('busqueda');
                $booksTotales=Book::orderBy('fechaPublicacion','desc')->orderBy('books.id','desc')
                    ->leftJoin('author_book', 'books.id', '=', 'author_book.book_id')
                    ->leftJoin('authors','author_book.author_id','=','authors.id')
                    ->where('books.titulo','LIKE',"%$busqueda%")
                    ->orWhere('books.precioFisico','LIKE',"%$busqueda%")
                    ->orWhere('books.precioDigital','LIKE',"%$busqueda%")
                    ->orWhere('books.sinopsis','LIKE',"%$busqueda%")
                    ->orWhere('books.fechaPublicacion','LIKE',"%$busqueda%")
                    ->orWhere('authors.nombre','LIKE',"%$busqueda%")
                    ->select('books.id as id')
                    ->get();
                $books=Book::whereIn('id',$booksTotales)->paginate(15);
            }
            else{
                $books=Book::paginate(15);
            }
            $clasificacion='Todos';
        }
        return view('gestor.libros',['books'=>$books,'clasificacion'=>$clasificacion]);
    }

    public function editBook($id){
        $book=Book::findOrFail($id);
        return view('gestor.libros-editar',['book'=>$book]);
    }

    public function newBook(){
        $authors=Author::orderBy('nombre','desc')->get('nombre');
        return view('gestor.libros-crear',['authors'=>$authors]);
    }
    public function storeBook(){
        $data=request()->validate([
            'titulo'=>'required|max:65535',
            'autor'=>'required',
            'sello'=>'required',
            'formato'=>'required',
            'estatus'=>'required',
            'ejemplares'=>'required|numeric',
            'preciofisico'=>'nullable|numeric',
            'ofertafisico'=>'nullable|numeric',
            'preciodigital'=>'nullable|numeric',
            'ofertadigital'=>'nullable|numeric',
            'paginas'=>'required|numeric',
            'edicion'=>'required|numeric',
            'genero'=>'required',
            'isbn'=>'nullable',
            'publicacion'=>'required|date',
            'sinopsis'=>'required|max:65535',
            'imagenPortada'=>'required|image',
            'imagenTienda'=>'required|image',
            'imagenBanner'=>'required|image',
            // 'imagenExtra'=>'required|image'
        ]);
        dd(request());

        
        return view('gestor.libros');
    }
}

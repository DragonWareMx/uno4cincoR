<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Banner;
use App\Book;
use App\Author;
use App\Tipoenvio;
use App\Collection;
use App\Promotion;

class paginaTiendaController extends Controller
{
    //busqueda
    public function busqueda($tipo, $id){
        $resultado = null;

        switch($tipo){
            case 'index':
                $resultado = Book::where('nuevo','1')->orderBy('fechaPublicacion','Desc')->with("collection");
                break;
            case 'catalogo':
                $resultado = Book::join('sellos', 'books.sello_id', '=', 'sellos.id')->select('books.*','sellos.nombre')->where("nombre",'uno4cinco')->orderBy('ventas','Desc');
                break;
            case '145':
                $resultado = Book::join('sellos', 'books.sello_id', '=', 'sellos.id')->select('books.*','sellos.nombre')->where("nombre",'145')->orderBy('ventas','Desc');
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

        switch(request('clasificacion')){
            case 'titulo':
                $resultado = $resultado->where('titulo','like',"%".request('busqueda')."%")->paginate(12);
                break;
            case 'autor':
                $resultado = $resultado->leftJoin('author_book', 'books.id', '=', 'author_book.book_id')
                                        ->leftJoin('authors','author_book.author_id','=','authors.id')
                                        ->where('authors.nombre','LIKE',"%".request('busqueda')."%")->paginate(12);
                break;
            case 'precio':
                if(strcasecmp(request('busqueda'),'gratis') == 0){
                    $request = '0.00';
                    $resultado = $resultado->where('books.precioFisico','LIKE',"".$request."")
                                            ->orWhere('books.precioDigital','LIKE',"".$request."")->paginate(12);
                }
                else{
                    $request = request('busqueda');
                    $resultado = $resultado->where('books.precioFisico','LIKE',"%".$request."%")
                                            ->orWhere('books.precioDigital','LIKE',"%".$request."%")->paginate(12);
                }
                break;
            case 'contenido':
                $resultado = $resultado->where('sinopsis','like',"%".request('busqueda')."%")->paginate(12);
                break;
            case 'genero':
                $resultado = $resultado->leftJoin('book_genre', 'books.id', '=', 'book_genre.book_id')
                                        ->leftJoin('genres','book_genre.genre_id','=','genres.id')
                                        ->where('genres.nombre','LIKE',"%".request('busqueda')."%")->paginate(12);
                break;
            case 'collecion':
                $resultado = $resultado->join('collections', 'books.collection_id', '=', 'collections.id')
                                        ->select('books.*','collections.nombre')
                                        ->where('collections.nombre','like',"%".request('busqueda')."%")->paginate(12);
                break;
            case 'colecciones':
                $resultado = $resultado->where('nombre','LIKE',"%".request('busqueda')."%")->paginate(12);
                break;
            default:
                $resultado = $resultado->paginate(12);
        }

        return $resultado;
    }

    //NOVEDADES
    public function index(){
        $banners=Banner::where('tipo','libro')->get();

        $books = $this->busqueda("index",0);

        if(!$books)
            $books = Book::where('nuevo','1')->orderBy('fechaPublicacion','Desc')->paginate(12);

        $request = request("clasificacion");
        
        return view('publicitaria.tiendaNovedades', ['banners'=>$banners, 'books'=>$books, 'request'=>$request]);
    }

    //CATALOGO
    public function catalogo(){
        $books = $this->busqueda("catalogo",0);

        if(!$books)
            $books = Book::join('sellos', 'books.sello_id', '=', 'sellos.id')->select('books.*','sellos.nombre')->where("nombre",'uno4cinco')->orderBy('ventas','Desc')->paginate(12);
        return view('publicitaria.tiendaCatalogo', ['books'=>$books]);
    }

    //145
    public function tienda145(){
        $books = $this->busqueda("145",0);

        if(!$books)
            $books = Book::join('sellos', 'books.sello_id', '=', 'sellos.id')->select('books.*','sellos.nombre')->where("nombre",'145')->orderBy('ventas','Desc')->paginate(12);

        return view('publicitaria.tienda145', ['books'=>$books]);
    }

    //COLECCIONES
    public function colecciones(){
        $collections = $this->busqueda("colecciones", 0);

        if(!$collections){
            //Obtiene unicamente las colecciones que se encuentren relacionadas con al menos un libro y lo convierte en un arreglo de IDs
            //esto se hace porque usar paginate con select distinct causa problemas
            $collectionsIds = Collection::select('collections.id')
                                        ->join('books', 'books.collection_id', '=', 'collections.id')
                                        ->distinct()
                                        ->pluck('id')->toArray();
            //obtiene las colecciones
            $collections = Collection::whereIn('id', $collectionsIds)->orderBy('created_at','Desc')->paginate(12);
        }
        
        return view('publicitaria.colecciones', ['collections'=>$collections, 'books'=>null]);
    }

    //COLECCION
    public function coleccion($id){
        $books = $this->busqueda("coleccion", $id);

        if(!$books)
            $books = Book::where('collection_id',$id)->orderBy('ventas','Desc')->paginate(12);

        $request = request("clasificacion");

        $collection = Collection::find($id);
        
        return view('publicitaria.collectionBook', ['books'=>$books, 'request'=>$request, 'collection'=>$collection]);
    }
    
    //libro
    public function libro($id){
        $book = Book::find($id);

        //se obtienen los autores
        $idsAutores = $book->authors->pluck('id')->toArray();

        //encuentra los libros que coincidan con los autores
        $books = Book::whereHas('authors', function ($query) use($idsAutores) {
            $query->whereIn('author_book.author_id', $idsAutores);
        })->orderBy('ventas','Desc')->take(5)->get();

        //$books= Book::whereIn('id', $book->authors)->get();
        return view('publicitaria.libro', ['book' => $book, 'books'=>$books]);
    }

    //carrito :v
    public function carrito(){
        $books = Book::all();
        return view('publicitaria.carrito',['books' => $books]);
    }

    //compra
    public function compra(){
        $books = Book::all();
        $envios = Tipoenvio::all();
        $cupones = Promotion::all();

        return view('publicitaria.compra',['books' => $books, 'envios' => $envios, 'cupones' => $cupones]);
    }

    //Agrega un producto al carrito o lo actualiza
    public function addToCart($id, $cant, $formato)
    {
        //obtenemos el libro
        $libro = Book::find($id);
 
        //verificamos que el libro exista
        if(!$libro) {
 
            abort(404);
 
        }
 
        //obtenemos el carrito de la cookie
        $cart = session()->get('cart');
 
        // Si el carrito es vacio entonces es el primer producto que se agrega, se crea la variable
        if(!$cart) {
            //si el formato es fisico entonces se guarda su cantidad en fisico, sino se guarda en digital
            if($formato == 'fisico'){
                $cart = [
                        $id => [
                            "cantidadFisico" => $cant,
                            "cantidadDigital" => 0
                        ]
                ];
            }
            else{
                $cart = [
                    $id => [
                        "cantidadFisico" => 0,
                        "cantidadDigital" => 1
                    ]
                ];
            }
            
            //se guarda el carrito en la cookie
            session()->put('cart', $cart);
 
            return;
        }
 
        // si el carrito no esta vacio entonces checa la cantidad y la actualiza
        if(isset($cart[$id])) {
            //checa si se quiere actualizar la version fisica o digital
            if($formato == 'fisico'){
                $cart[$id]['cantidadFisico'] = $cant;
    
                session()->put('cart', $cart);
    
                return;
            }
            else{
                $cart[$id]['cantidadDigital'] = 1;
    
                session()->put('cart', $cart);
    
                return;
            }
 
        }
 
        // Si el producto no existe en el carrito entonces se crea
        if($formato == 'fisico'){
            $cart[$id] = [
                        "cantidadFisico" => $cant,
                        "cantidadDigital" => 0
                        ];
        }
        else{
            $cart[$id] = [
                    "cantidadFisico" => 0,
                    "cantidadDigital" => 1
            ];
        }
 
        session()->put('cart', $cart);
 
        return;
    }
 
    //elimina un producto del carrito
    public function remove(Request $request)
    {
        //se verifica que se obtengan los datos
        if($request->id && $request->formato) {

            //se obtiene el carrito de la cookie
            $cart = session()->get('cart');
            
            //se verifica que el producto exista en el carrito
            if(isset($cart[$request->id])) {

                //se baja la cantidad dependiendo del formato
                if($request->formato == "fisico"){
                    $cart[$request->id]['cantidadFisico'] = 0;
                }
                else if($request->formato == "digital"){
                    $cart[$request->id]['cantidadDigital'] = 0;
                }

                //si el producto tiene ambas cantidades como 0 se elimina del carrito
                if($cart[$request->id]['cantidadDigital'] == 0 && $cart[$request->id]['cantidadFisico'] == 0){
                    unset($cart[$request->id]);
                }
 
                session()->put('cart', $cart);
            }
 
            session()->flash('success', 'Product removed successfully');
        }
    }

    //Agrega un producto al carrito o lo actualiza
    public function addCupon($id)
    {
        //obtenemos el libro
        $cupon = Promotion::find($id);
 
        //verificamos que el libro exista
        if(!$cupon) {
 
            abort(404);
 
        }
 
        //obtenemos el carrito de la cookie
        $cupones = session()->get('cart');
 
        // Si el carrito es vacio entonces es el primer producto que se agrega, se crea la variable
        if(!$cupones) {
            $cart = [
                    $id => [
                        "cantidad" => $cant
                    ]
            ];
            
            //se guarda el carrito en la cookie
            session()->put('cart', $cart);
 
            return;
        }
 
        // si el carrito no esta vacio entonces checa la cantidad y la actualiza
        if(isset($cart[$id])) {
            //checa si se quiere actualizar la version fisica o digital
            if($formato == 'fisico'){
                $cart[$id]['cantidadFisico'] = $cant;
    
                session()->put('cart', $cart);
    
                return;
            }
            else{
                $cart[$id]['cantidadDigital'] = 1;
    
                session()->put('cart', $cart);
    
                return;
            }
 
        }
 
        // Si el producto no existe en el carrito entonces se crea
        if($formato == 'fisico'){
            $cart[$id] = [
                        "cantidadFisico" => $cant,
                        "cantidadDigital" => 0
                        ];
        }
        else{
            $cart[$id] = [
                    "cantidadFisico" => 0,
                    "cantidadDigital" => 1
            ];
        }
 
        session()->put('cart', $cart);
 
        return;
    }
}

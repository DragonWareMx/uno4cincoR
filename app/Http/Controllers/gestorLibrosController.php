<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;
use App\Author;
use App\Collection;
use App\Image;
use App\Genre;
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
        // dd($book);
        $autorLibro=DB::table('author_book')
        ->select(DB::raw('*'))
        ->where('book_id', '=', $id)
        ->get();

        $autoresActuales="";
        foreach($autorLibro as $autorL){
            $autorNombre=Author::findOrFail($autorL->author_id);
            $autoresActuales=$autoresActuales.$autorNombre->nombre.",";
        }

        $generos=Genre::get();

        $collections=Collection::orderBy('nombre','desc')->get();
        $authors=Author::orderBy('nombre','desc')->get('nombre');
        return view('gestor.libros-editar',['book'=>$book,'collections'=>$collections,'authors'=>$authors,'autoresActuales'=>$autoresActuales,'generos'=>$generos,'id'=>$id]);
    }

    public function updateBook($id){
        $data=request()->validate([
            'titulo'=>'required|max:65535',
            'autor'=>'required',
            'sello'=>'required',
            'formato'=>'required',
            'estatus'=>'required',
            'ejemplares'=>'nullable|numeric',
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
            'archivoLibro'=>'nullable|mimes:pdf,epub',
            'imagenPortada'=>'nullable|image',
            'imagenTienda'=>'nullable|image',
            'imagenBanner'=>'nullable|image',
            'imagenExtra.*'=>'image'
        ]);

        $book=Book::findOrFail($id);

        $book->isbn=request('isbn');
        $book->titulo=request('titulo');
        $book->numEdicion=request('edicion');
        $book->paginas=request('paginas');
        $book->fechaPublicacion=request('publicacion');
        $book->sinopsis=request('sinopsis');
        $book->sello_id=request('sello');
        if(request('coleccion')){
            $book->collection_id=request('coleccion');
        }
        //GUARDA LOS AUTORES DEL LIBRO
        
        $arrAutores = explode (",", request('autor'));
        // dd($arrAutores);
        $idAutores=[];
        $cont=0;
        foreach ($arrAutores as $arr) {
            if($arr!=null){
                $author=Author::where('nombre',$arr)->first();
            $idAutores[$cont]=$author->id;
            $cont++;
            }
            
        }

        if (request('preciofisico')){   $book->precioFisico=request('preciofisico'); }
        else{   $book->precioFisico=0;}
        if (request('preciodigital')){  $book->precioDigital=request('preciodigital');}
        else{   $book->precioDigital=0; }
        if (request('ofertafisico')){   $book->descuentoFisico=request('ofertafisico');}
        else{   $book->descuentoFisico=0;}
        if (request('ofertadigital')){  $book->descuentoDigital=request('ofertadigital');}
        else{   $book->descuentoDigital=0;}
        $book->sinopsis=request('sinopsis');
        if(request('ejemplares')){  $book->stockFisico=request('ejemplares');}
        else{   $book->stockFisico=0;}
        $book->stockDigital=request('estatus');

        // LINK DESCARGA---------------------------------------------------
        if(request('archivoLibro')==null){  
            $newFileName=$book->linkDescarga;
        }
        else{
            $fileNameWithTheExtension = request('archivoLibro')->getClientOriginalName();
            $fileName = pathinfo( $fileNameWithTheExtension,PATHINFO_FILENAME);
            $extension = request('archivoLibro')->getClientOriginalExtension();
            $newFileName=$fileName.'_'.time().'.'.$extension;
            $path = request('archivoLibro')->storeAs('/public/descargas/',$newFileName);
            
            $oldFile=public_path().'/public/descargas/'.$book->linkDescarga;
            if(file_exists($oldFile)){
                unlink($oldFile);
            }
        }
        $book->linkDescarga=$newFileName;
 
        // LINK IMAGEN PORTADA---------------------------------------------------
        if(request('imagenPortada')==null){  
            $newFileName=$book->portadaImagen;
        }
        else{
            $fileNameWithTheExtension = request('imagenPortada')->getClientOriginalName();
            $fileName = pathinfo( $fileNameWithTheExtension,PATHINFO_FILENAME);
            $extension = request('imagenPortada')->getClientOriginalExtension();
            $newFileName=$fileName.'_'.time().'.'.$extension;
            $path = request('imagenPortada')->storeAs('/public/libros/',$newFileName);
            
            $oldFile=public_path().'/storage/libros/'.$book->portadaImagen;
            if(file_exists($oldFile)){
                unlink($oldFile);
            }
        }
        $book->portadaImagen=$newFileName;

        // LINK IMAGEN TIENDA---------------------------------------------------
        if(request('imagenTienda')==null){  
            $newFileName=$book->tiendaImagen;
        }
        else{
            $fileNameWithTheExtension = request('imagenTienda')->getClientOriginalName();
            $fileName = pathinfo( $fileNameWithTheExtension,PATHINFO_FILENAME);
            $extension = request('imagenTienda')->getClientOriginalExtension();
            $newFileName=$fileName.'_'.time().'.'.$extension;
            $path = request('imagenTienda')->storeAs('/public/libros/',$newFileName);
            
            $oldFile=public_path().'/storage/libros/'.$book->tiendaImagen;
            if(file_exists($oldFile)){
                unlink($oldFile);
            }
        }
        $book->tiendaImagen=$newFileName;

        // LINK IMAGEN BANNER---------------------------------------------------
        if(request('imagenBanner')==null){  
            $newFileName=$book->bannerImagen;
        }
        else{
            $fileNameWithTheExtension = request('imagenBanner')->getClientOriginalName();
            $fileName = pathinfo( $fileNameWithTheExtension,PATHINFO_FILENAME);
            $extension = request('imagenBanner')->getClientOriginalExtension();
            $newFileName=$fileName.'_'.time().'.'.$extension;
            $path = request('imagenBanner')->storeAs('/public/libros/',$newFileName);
            
            $oldFile=public_path().'/storage/libros/'.$book->bannerImagen;
            if(file_exists($oldFile)){
                unlink($oldFile);
            }
        }
        $book->bannerImagen=$newFileName;

        // LINK EXTRAS---------------------------------------------------
        $book->save();
        if(request('imagenExtra')){
            $idImagenes=[];
            $cont=0;
            
            foreach (request('imagenExtra') as $imagen) {
                //AQUÍ GUARDA LAS IMAGENES EXTRA
                $fileNameWithTheExtension = $imagen->getClientOriginalName();
                $fileName = pathinfo( $fileNameWithTheExtension,PATHINFO_FILENAME);
                $extension = $imagen->getClientOriginalExtension();
                $newFileName=$fileName.'_'.time().'.'.$extension;
                $path = $imagen->storeAs('/public/libros/',$newFileName);
                $image=new Image();
                $image->imagen=$newFileName;
                $image->save();
                $idImagenes[$cont]=$image->id;
                $cont++;

                
            }
            //borrar imgs-------------------------------
            foreach($book->images as $extras){
                $oldFile=public_path().'/storage/libros/'.$extras->imagen;
                if(file_exists($oldFile)){
                    unlink($oldFile);
                }
            }
            
            $book->images()->sync($idImagenes);
        }
        
        $book->save();
        $book->genres()->sync(request('genero'));
    
        $book->authors()->sync($idAutores);
        return redirect()->route('verLibros');
    }

    public function newBook(){
        $authors=Author::orderBy('nombre','desc')->get('nombre');
        $collections=Collection::orderBy('nombre','desc')->get();
        return view('gestor.libros-crear',['authors'=>$authors,'collections'=>$collections]);
    }
    public function storeBook(){
        $data=request()->validate([
            'titulo'=>'required|max:65535',
            'autor'=>'required',
            'sello'=>'required',
            'formato'=>'required',
            'estatus'=>'required',
            'ejemplares'=>'nullable|numeric',
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
            'archivoLibro'=>'mimes:pdf,epub',
            'imagenPortada'=>'required|image',
            'imagenTienda'=>'required|image',
            'imagenBanner'=>'required|image',
            'imagenExtra.*'=>'image'
        ]);
        // .......................................convertir a transacción...........................................................................
        $book=new Book();
        $book->isbn=request('isbn');
        $book->titulo=request('titulo');
        $book->numEdicion=request('edicion');
        if (request('preciofisico')){   $book->precioFisico=request('preciofisico'); }
        else{   $book->precioFisico=0;}
        if (request('preciodigital')){  $book->precioDigital=request('preciodigital');}
        else{   $book->precioDigital=0; }
        if (request('ofertafisico')){   $book->descuentoFisico=request('ofertafisico');}
        else{   $book->descuentoFisico=0;}
        if (request('ofertadigital')){  $book->descuentoDigital=request('ofertadigital');}
        else{   $book->descuentoDigital=0;}
        $book->sinopsis=request('sinopsis');
        if(request('ejemplares')){  $book->stockFisico=request('ejemplares');}
        else{   $book->stockFisico=0;}
        $book->stockDigital=request('estatus');
        
        //AQUÍ GUARDA EL ARCHIVO PDF
        if(request('archivoLibro')){
            $fileNameWithTheExtension = request('archivoLibro')->getClientOriginalName();
            $fileName = pathinfo( $fileNameWithTheExtension,PATHINFO_FILENAME);
            $extension = request('archivoLibro')->getClientOriginalExtension();
            $newFileName=$fileName.'_'.time().'.'.$extension;
            $path = request('archivoLibro')->storeAs('/public/descargas/',$newFileName);
            $book->linkDescarga=$newFileName;
        }
        else{
            $book->linkDescarga='sinarchivo';
        }

        //AQUÍ GUARDA LA IMAGEN DE PORTADA
        $fileNameWithTheExtension = request('imagenPortada')->getClientOriginalName();
        $fileName = pathinfo( $fileNameWithTheExtension,PATHINFO_FILENAME);
        $extension = request('imagenPortada')->getClientOriginalExtension();
        $newFileName=$fileName.'_'.time().'.'.$extension;
        $path = request('imagenPortada')->storeAs('/public/libros/',$newFileName);
        $book->portadaImagen=$newFileName;

        //AQUÍ GUARDA LA IMAGEN DE BANNER
        $fileNameWithTheExtension = request('imagenBanner')->getClientOriginalName();
        $fileName = pathinfo( $fileNameWithTheExtension,PATHINFO_FILENAME);
        $extension = request('imagenBanner')->getClientOriginalExtension();
        $newFileName=$fileName.'_'.time().'.'.$extension;
        $path = request('imagenBanner')->storeAs('/public/libros/',$newFileName);
        $book->bannerImagen=$newFileName;
    
        //AQUÍ GUARDA LA IMAGEN DE TIENDA
        $fileNameWithTheExtension = request('imagenTienda')->getClientOriginalName();
        $fileName = pathinfo( $fileNameWithTheExtension,PATHINFO_FILENAME);
        $extension = request('imagenTienda')->getClientOriginalExtension();
        $newFileName=$fileName.'_'.time().'.'.$extension;
        $path = request('imagenTienda')->storeAs('/public/libros/',$newFileName);
        $book->tiendaImagen=$newFileName;

        $book->fechaPublicacion=request('publicacion');
        $book->paginas=request('paginas');
        $book->sello_id=request('sello');
        if(request('coleccion')){
            $book->collection_id=request('coleccion');
        }

        //GUARDA LOS AUTORES DEL LIBRO
        
        $arrAutores = explode (",", request('autor'));
        $idAutores=[];
        $cont=0;
        foreach ($arrAutores as $arr) {
            $author=Author::where('nombre',$arr)->first();
            $idAutores[$cont]=$author->id;
            $cont++;
        }
        
        $idImagenes=[];
        $cont=0;
        if(request('imagenExtra')){
            foreach (request('imagenExtra') as $imagen) {
                //AQUÍ GUARDA LAS IMAGENES EXTRA
                $fileNameWithTheExtension = $imagen->getClientOriginalName();
                $fileName = pathinfo( $fileNameWithTheExtension,PATHINFO_FILENAME);
                $extension = $imagen->getClientOriginalExtension();
                $newFileName=$fileName.'_'.time().'.'.$extension;
                $path = $imagen->storeAs('/public/libros/',$newFileName);
                $image=new Image();
                $image->imagen=$newFileName;
                $image->save();
                $idImagenes[$cont]=$image->id;
                $cont++;
            }
        }

        //SE OBTIENEN TODOS LOS LIBROS NUEVOS
        $books = Book::where('nuevo', '=', '1')->orderBy('fechaPublicacion','asc')->get();

        //elimina los libros nuevos mas viejos en caso que haya mas de 8
        while(count($books) >= 9){
            $books = Book::where('nuevo', '=', '1')->orderBy('fechaPublicacion','asc')->get();

            //se elimina el libro nuevo mas viejo
            $bookND = Book::find($books[0]->id);
            $bookND->nuevo = 0;
            $bookND->save();
        }

        //AQUI SE GUARDA COMO NUEVO LIBRO
        $book->nuevo = 1;
       
        $book->save();
        $book->genres()->sync(request('genero'));
        $book->images()->sync($idImagenes);
        $book->authors()->sync($idAutores);

        return redirect()->route('verLibros');
    }

    public function deleteBook($id){
        $book=Book::findOrFail($id);

        $oldFile=public_path().'/public/descargas/'.$book->linkDescarga;
            if(file_exists($oldFile)){
                unlink($oldFile);
            }

        $oldFile=public_path().'/storage/libros/'.$book->portadaImagen;
            if(file_exists($oldFile)){
                unlink($oldFile);
            }

        $oldFile=public_path().'/storage/libros/'.$book->tiendaImagen;
            if(file_exists($oldFile)){
                unlink($oldFile);
            }

        $oldFile=public_path().'/storage/libros/'.$book->bannerImagen;
            if(file_exists($oldFile)){
                unlink($oldFile);
            }

        foreach($book->images as $extras){
            $oldFile=public_path().'/storage/libros/'.$extras->imagen;
            if(file_exists($oldFile)){
                unlink($oldFile);
            }
            $extras->delete();
        }

        $book->delete();

        return redirect()->route('verLibros');
    }
}

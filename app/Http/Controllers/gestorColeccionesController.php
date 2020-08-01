<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;

class gestorColeccionesController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){

        //Obtiene unicamente las colecciones que se encuentren relacionadas con al menos un libro y lo convierte en un arreglo de IDs
        //esto se hace porque usar paginate con select distinct causa problemas
        $collectionsIds = Collection::select('collections.id')
                                    ->join('books', 'books.collection_id', '=', 'collections.id')
                                    ->distinct()
                                    ->pluck('id')->toArray();
        //obtiene las colecciones
        $collections = Collection::whereIn('id', $collectionsIds)->orderBy('created_at','Desc')->paginate(8);

        return view('gestor.colecciones', ['collections'=>$collections, 'books'=>null]);
    }

    public function addCollection(){
        return view('gestor.colecciones.nuevaColeccion');
    }
    public function storeCollection(){
        $data=request()->validate([
            'nombre'=>'required|max:191',
            'descripcion'=>'required|max:65535'
        ]);
        
        try{
            DB::transaction(function()
            {
                $coleccion=new Collection();
                $coleccion->nombre=request('nombre');
                $coleccion->descripcion=request('descripcion');
                $coleccion->save();
            });
        }
        catch(QueryException $ex){
            return redirect()->back()->withErrors(['error' => 'ERROR: No se pudo guardar la colección!']);
        }
        return redirect()->route('verLibros');
    }

    public function editCollection($id){
        $coleccion=Collection::findOrFail($id);
        return view('gestor.colecciones.editarColeccion',['coleccion'=>$coleccion]);
    }
    public function updateCollection($id){
        $data=request()->validate([
            'nombre'=>'required|max:191',
            'descripcion'=>'required|max:65535'
        ]);
        $coleccion=Collection::findOrFail($id);
        $coleccion->nombre=request('nombre');
        $coleccion->descripcion=request('descripcion');
        $coleccion->save();
        return redirect()->route('verColecciones');
    }
    public function deleteCollection($id){
        $coleccion=Collection::findOrFail($id);
        $coleccion->delete();
        return redirect()->route('verColecciones');
    }
}

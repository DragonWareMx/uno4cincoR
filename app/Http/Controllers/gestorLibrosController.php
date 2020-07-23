<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;

class gestorLibrosController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }


    public function index(){
        if(request('clasificacion')=='uno4cinco'){
            $books=Book::where('sello_id',1)->paginate(15);
        }
        else if(request('clasificacion')=='145'){
            $books=Book::where('sello_id',2)->paginate(15);
        }
        return view('gestor.libros',['books'=>$books]);
    }
}

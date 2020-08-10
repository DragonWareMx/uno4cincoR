<?php

namespace App\Http\Controllers;

use App\Book;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class DescargasController extends Controller
{
    //
    public function descargar(Request $request){
        $link = $request->get(\Linkeys\UrlSigner\Models\Link::class);
        $libro=Book::findOrFail($link->data['id_libro']);
        return view('publicitaria.descargar',['libro'=>$libro]);
    }
}

@extends('layouts.menuGestor')

@section('importOwl')
    <link rel="stylesheet" type="text/css" href="/assets/css/gestorAutores.css">
    <link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Karla&display=swap" rel="stylesheet">
@endsection

@section('menu')
    Autores | 145
@endsection

@section('contenido')
<a href="/adminuno4cinco/autores-nuevo" class="a_agregarAutor" style="color:#29B390">Agregar autor</a>
<div class="div_contenedorgral">
    <div class="div_AutoresContainerG">
        @foreach ($autor145 as $autor)
        <div class="div_ItemAutorG">
            <div class="div_imagAutorG">
                <img src="{{asset('storage/autores/'.$autor->foto)}}">
                <div class="div_infoAutorG">
                    {{Str::limit($autor->nombre,24)}}
                </div>
                <div class="div_DatosAutorG">
                    <div class="div_librosAutorG">
                        Libros: 2
                    </div>
                    <div class="div_entradasAutorG" style="color:#29B390">
                        Entradas:4
                    </div>
                </div>
                <div class="btn_editarAutorG">
                    <i class="fas fa-pencil-alt" style="font-size: 14px"></i> &nbsp;Editar
                </div>
            </div> 
        </div>
        @endforeach
        
    </div>
    <div class="paginacion_css" style="margin-top:30px;">
        {{$autor145->links()}}
    </div>
</div>
    

@endsection
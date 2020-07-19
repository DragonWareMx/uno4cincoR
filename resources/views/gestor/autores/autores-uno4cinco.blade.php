@extends('layouts.menuGestor')

@section('importOwl')
    <link rel="stylesheet" type="text/css" href="/assets/css/gestorAutores.css">
    <link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Karla&display=swap" rel="stylesheet">
@endsection

@section('menu')
    Autores | uno4cinco
@endsection

@section('contenido')
<a href="/adminuno4cinco/autores-nuevo" class="a_agregarAutor">Agregar autor</a>
<div class="div_contenedorgral">
    <div class="div_AutoresContainerG">
        @foreach ($autoruno4cinco as $autor)
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
                    <div class="div_entradasAutorG">
                        Entradas: 4
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
        {{$autoruno4cinco->links()}}
    </div>
</div>


@endsection
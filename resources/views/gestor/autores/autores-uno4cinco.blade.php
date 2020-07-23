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
            @php
                $i=0;
                $o=0;
            @endphp
            @foreach ($autor->books as $book)
                @php
                    $i++;
                @endphp
            @endforeach
            @foreach ($blogs as $blog)
                @php
                    if($blog->author_id==$autor->id)
                        $o++;
                @endphp
            @endforeach
        <div class="div_ItemAutorG">
            <div class="div_imagAutorG">
                <img src="{{asset('storage/autores/'.$autor->foto)}}">
                <div class="div_infoAutorG txt-nombreAutorG" data-toggle="tooltip" data-placement="top" data-html="true" title="{{$autor->nombre}}">
                    {{Str::limit($autor->nombre,20)}}
                </div>
                <div class="div_DatosAutorG">
                    <div class="div_librosAutorG">
                        Libros:&nbsp;{{$i}}
                    </div>
                    <div class="div_entradasAutorG">
                        Entradas:&nbsp;{{$o}}
                    </div>
                </div>
                <div class="btn_editarAutorG" >
                    <a href="{{ route('autores-editar', ['id'=>$autor->id.',1'])}}"><i class="fas fa-pencil-alt" style="font-size: 14px"></i> &nbsp;Editar</a>
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
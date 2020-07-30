@extends('layouts.menuGestor')

@section('importOwl')
    <link rel="stylesheet" type="text/css" href="/assets/css/gestorAutores.css">
    <link rel="stylesheet" type="text/css" href="/assets/css/gestorBlogs.css">
    <link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Karla&display=swap" rel="stylesheet">
@endsection

@section('menu')
    Colecciones | Nueva colección
@endsection

@section('contenido')

@if($errors->any())
    <div class="alert alert-danger" role="alert">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
@endif

    <div class="div_containerAuthor">
        <div class="div_datosAuthor">
            <form action="{{ route('nuevaColeccion') }}" style="width:100%;" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="div_elementosAuthor">
                    <p class="txt_datosAuthor">Nombre de colección:</p>
                    <input name="nombre" class="input_datosAuthor" type="text" value="{{old('nombre')}}" required autofocus>
                </div>

                <div class="div_elementosAuthor" style="margin-bottom: 25px">
                    <p class="txt_datosAuthor">Descripción:</p>
                    <textarea class="textarea_biografia"type="text" name="descripcion" value="" required >{{old('descripcion')}}</textarea>
                </div>

                <div class="botones_blog_100">
                    <div class="botones_blog_derecha">
                        <a class="gestor_blog_cancelar" href="javascript:history.back(-1);">Cancelar</a>
                        <input class="gestor_blog_guardar" type="submit" value="Guardar">	
                    </div>
                </div>
            </form>
        </div>
    </div>
    <br>
    <br>
@endsection
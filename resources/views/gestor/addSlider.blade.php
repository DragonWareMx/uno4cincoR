@extends('layouts.menuGestor')

@section('importOwl')
    <link rel="stylesheet" href="{{ asset('assets/css/index.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/css/gestorSlider.css') }}" type="text/css">
    <link rel="stylesheet" type="text/css" href="/assets/css/gestorAutores.css">
    <script type="text/javascript" src='/assets/js/tags.js'></script>
    <link href="https://fonts.googleapis.com/css2?family=Karla&display=swap" rel="stylesheet">

@endsection

@section('menu')
    <a href="{{ route('verSliders') }}" class="txt-titulosGestor">Sliders</a> | Nuevo banner
@endsection


@section('contenido')
<div class="contenido_sliders">
        
    <div class="datos_slider">
       <form action="" style="width:100%;" method="POST" enctype="multipart/form-data">
       @csrf
       <div class="elementos_slider_100">
        <div class="elementos_slider_imagen">
            <p class="txt_datosAuthor">Imagen PC (horizontal):</p>
            <input id="imagen" class="img_datosAuthor" style="margin-top:0px" type="file" name="imagen" required>
        </div>
        </div>
        <div class="elementos_slider_100">
            <div class="elementos_slider_imagen">
                <p class="txt_datosAuthor">Imagen celular (vertical):</p>
                <input id="imagen" class="img_datosAuthor" style="margin-top:0px" type="file" name="imagen" required>
            </div>
        </div>

    <div class="botones_slider_100">
        <div class="botones_slider_derecha">
            <a class="gestor_slider_cancelar" href="{{ route('verSliders')}}">Cancelar</a>
            <input class="gestor_slider_guardar" type="submit" value="Guardar">	
        </div>
    </div>
           
       </form>
   </div>
</div>
    
@endsection
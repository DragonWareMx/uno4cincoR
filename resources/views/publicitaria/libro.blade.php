@extends('layouts.layoutPubli')

@section('header')

<title>{{$book->titulo}} | ElBooke</title>

<link rel="stylesheet" type="text/css" href="{{asset('/assets/css/style_SobreNosotros.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('/assets/css/libro.css')}}">
<link rel="stylesheet" type="text/css" href="/assets/css/style_Autores.css">
<link rel="stylesheet" type="text/css" href="/assets/css/blogs.css">

<link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Karla&display=swap" rel="stylesheet">

<link rel="stylesheet" href="{{asset('/css/owl.theme.default.min.css')}}">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.0/jquery.min.js"></script>

{{-- Carrusel --}}
<link rel="stylesheet" type="text/css" href="/assets/css/style_Autores.css">

<!-- Core CSS file -->
<link rel="stylesheet" href="{{ asset('/plugins/PhotoSwipe/dist/photoswipe.css') }}">

<!-- Skin CSS file (styling of UI - buttons, caption, etc.)
         In the folder of skin CSS file there are also:
         - .png and .svg icons sprite,
         - preloader.gif (for browsers that do not support CSS animations) -->
<link rel="stylesheet" href="{{ asset('/plugins/PhotoSwipe/dist/default-skin/default-skin.css') }}">

<!-- Core JS file -->
<script src="{{ asset('/plugins/PhotoSwipe/dist/photoswipe.min.js') }}"></script>

<!-- UI JS file -->
<script src="{{ asset('/plugins/PhotoSwipe/dist/photoswipe-ui-default.min.js') }}"></script>

{{-- Para facebook --}}
<meta property="fb:app_id" content="353673553502093" />
<meta property="og:title" content="ElBooke | {{$book->titulo}} " />
<meta property="og:type" content="article" />
<meta property="og:url" content="{{URL::current()}}" />
<meta property="og:description" content="Sinopsis: {{$book->sinopsis}}" />
<meta property="og:image" content="{{asset('storage/libros/'.$book->tiendaImagen)}}"/>

<style>
    .cj-titulo {
        font-family: 'Montserrat';
        font-style: normal;
        font-weight: bold;
        font-size: 18px;
        line-height: 28px;
        color: #2E2E2E;
        padding-left: 15px;
        margin-top: 20px;
        height: 41.6px;
    }

    .cj-info {
        font-family: 'Montserrat';
        font-style: normal;
        font-weight: 300;
        font-size: 14px;
        line-height: 12px;
        color: #2E2E2E;
        height: 41.6px;

        width: 100%;
    }

    .cj-info2 {
        font-family: 'Montserrat';
        font-style: normal;
        font-weight: 400;
        font-size: 14px;
        line-height: 20px;
        color: #2E2E2E;
        height: 41.6px;

        width: 100%;
    }


    .cj-button {
        width: 100%;
        background-color: #1FC6AC;

        font-family: 'Montserrat';
        font-style: normal;
        font-weight: bold;
        font-size: 10px;
        line-height: 19px;

        border: none;
        color: white;

        padding-top: 8px;
        padding-bottom: 8px;

        box-sizing: border-box;
        border-radius: 25px;
        outline: none;
        transition-duration: .1s, .1s;
        -webkit-transition-timing-function: ease-out, cubic-bezier(.82, .1, .14, 1.12);
        transition-timing-function: ease-out, cubic-bezier(.82, .1, .14, 1.12);
        -webkit-box-shadow: 0px 3px 6px 0px rgb(0 0 0 / 16%);
        -moz-box-shadow: 0px 3px 6px 0px rgba(0, 0, 0, 0.16);
        box-shadow: 0px 3px 6px 0px rgb(0 0 0 / 16%);
    }

    .cj-button-bolsa {
        width: 50%;
        margin: auto;
        margin-bottom: 30px;
        background-color: #1FC6AC;

        font-family: 'Montserrat';
        font-style: normal;
        font-weight: bold;
        font-size: 14px;
        line-height: 19px;

        border: none;
        color: white;

        padding-top: 8px;
        padding-bottom: 8px;

        box-sizing: border-box;
        border-radius: 25px;
        outline: none;
        transition-duration: .1s, .1s;
        -webkit-transition-timing-function: ease-out, cubic-bezier(.82, .1, .14, 1.12);
        transition-timing-function: ease-out, cubic-bezier(.82, .1, .14, 1.12);
        -webkit-box-shadow: 0px 3px 6px 0px rgb(0 0 0 / 16%);
        -moz-box-shadow: 0px 3px 6px 0px rgba(0, 0, 0, 0.16);
        box-shadow: 0px 3px 6px 0px rgb(0 0 0 / 16%);
        text-decoration: none !important;
    }

    .cj-button-bolsa:hover {
        text-decoration: none !important;
        color: white !important;
    }

    .cj-scroll {
        height: 450px !important;
        max-height: 450px !important;
        overflow-y: auto;
        text-align: justify;
        padding-right: 5px;
    }

    .cj-book-border {
        border: 0.5px solid #c5c5c5;
        box-sizing: border-box;
        border-radius: 30px;

        -webkit-box-shadow: 0px 3px 6px 0px rgba(0, 0, 0, 0.16);
        -moz-box-shadow: 0px 3px 6px 0px rgba(0, 0, 0, 0.16);
        box-shadow: 0px 3px 6px 0px rgba(0, 0, 0, 0.16);

        padding: 50px 20px 50px 20px;
        text-align: center;
    }

    .cj-book-price {
        margin: auto !important;
        width: fit-content !important;
    }

    .invisible {
        opacity: 0;
    }

    #wrapper {
        width: 300px;
        margin: auto;
        height: 300px;
        position: relative;
        color: #fff;
        text-shadow: rgba(0, 0, 0, 0.1) 2px 2px 0px;
    }

    #slider-wrap {
        width: 300px;
        height: 300px;
        position: relative;
        overflow: hidden;
    }

    #slider-wrap ul#slider {
        width: 100%;
        height: 100%;

        position: absolute;
        top: 0;
        left: 0;
    }

    #slider-wrap ul#slider li {
        float: left;
        position: relative;
        width: 300px;
        height: 300px;
    }

    #slider-wrap ul#slider li>div {
        position: absolute;
        /* top:-10px; */
        /* left:35px; */
    }

    #slider-wrap ul#slider li>div h3 {
        font-size: 36px;
        text-transform: uppercase;
    }

    #slider-wrap ul#slider li>div span {
        font-family: Neucha, Arial, sans serif;
        font-size: 21px;
    }

    #slider-wrap ul#slider li i {
        text-align: center;
        line-height: 400px;
        display: block;
        width: 100%;
        font-size: 90px;
    }


    /*btns*/
    .btns {
        position: absolute;
        width: 50px;
        height: 60px;
        top: 50%;
        margin-top: -25px;
        line-height: 57px;
        text-align: center;
        cursor: pointer;
        background: rgba(0, 0, 0, 0.1);
        z-index: 100;


        -webkit-user-select: none;
        -moz-user-select: none;
        -khtml-user-select: none;
        -ms-user-select: none;

        -webkit-transition: all 0.1s ease;
        -moz-transition: all 0.1s ease;
        -o-transition: all 0.1s ease;
        -ms-transition: all 0.1s ease;
        transition: all 0.1s ease;
    }

    .btns:hover {
        background: rgba(0, 0, 0, 0.3);
    }

    #next {
        right: -50px;
        border-radius: 7px 0px 0px 7px;
    }

    #previous {
        left: -50px;
        border-radius: 0px 7px 7px 7px;
    }

    #counter {
        top: 30px;
        right: 35px;
        width: auto;
        position: absolute;
    }

    #slider-wrap.active #next {
        right: 0px;
    }

    #slider-wrap.active #previous {
        left: 0px;
    }


    /*bar*/
    #pagination-wrap {
        min-width: 20px;
        margin-top: 270px;
        margin-left: auto;
        margin-right: auto;
        height: 15px;
        position: relative;
        text-align: center;
    }

    #pagination-wrap ul {
        width: 100%;
    }

    #pagination-wrap ul li {
        margin: 0 4px;
        display: inline-block;
        width: 5px;
        height: 5px;
        border-radius: 50%;
        background: #fff;
        opacity: 0.5;
        position: relative;
        top: 0;


    }

    #pagination-wrap ul li.active {
        width: 12px;
        height: 12px;
        top: 3px;
        opacity: 1;
        box-shadow: rgba(0, 0, 0, 0.1) 1px 1px 0px;
    }




    /*Header*/
    h1,
    h2 {
        text-shadow: none;
        text-align: center;
    }

    h1 {
        color: #666;
        text-transform: uppercase;
        font-size: 36px;
    }

    h2 {
        color: #7f8c8d;
        font-family: Neucha, Arial, sans serif;
        font-size: 18px;
        margin-bottom: 30px;
    }




    /*ANIMATION*/
    #slider-wrap ul,
    #pagination-wrap ul li {
        -webkit-transition: all 0.3s cubic-bezier(1, .01, .32, 1);
        -moz-transition: all 0.3s cubic-bezier(1, .01, .32, 1);
        -o-transition: all 0.3s cubic-bezier(1, .01, .32, 1);
        -ms-transition: all 0.3s cubic-bezier(1, .01, .32, 1);
        transition: all 0.3s cubic-bezier(1, .01, .32, 1);
    }

    .share-button{
        border: 1px solid #1FC6AC;
        color: #1FC6AC;
        border-radius: 25px;
        display: inline-block;
        position: absolute;
        overflow: hidden;
        width: 178px;
        height: 40px;
        top: 50%;
        left: 50%;
        text-transform: uppercase;
        font-size: 14px;
        transform: translate(-50%, -50%);
        font-family: 'Montserrat'
    }
    .share-button a{
        color: #1FC6AC;
        font-size: 12px;
        display: block;
        text-decoration: none;
        font-family: 'Montserrat';
        font-weight: bold;
        letter-spacing: 1px;
        line-height: 26px;
        padding: 7px 13px 7px 13px;
        text-transform: capitalize;
    }
    
    .share-button > a:hover,
    .share-button > a:hover:after,
    .share-button .icon-wrapper ul li a:hover i{
        color: #1FC6AC;
    }
    .share-button .icon-wrapper ul li:last-child a:hover i{
        color: back;
    }
    .share-button .icon-wrapper{
        position: absolute;
        left: -286px;
        top: 0;
        width: 286px;
    }

    .share-button .icon-wrapper > a{
        display: inline-block;
    }
    .share-button a.hidden{
        display: none;
    }
    .share-button.active .icon-wrapper{
        max-height: 40px;
    }
    .share-button .icon-wrapper ul{
        padding-left: 0;
        margin: 0;
        height: 40px;
    }
    .share-button .icon-wrapper ul:after{
        clear: both;   
    }
    .share-button .icon-wrapper ul li{
        float: left;
        display: inline-block;
    }
    .share-button .icon-wrapper ul li:last-child{
        float: right;
    }
    .share-button .icon-wrapper ul li a i{
        color: #1FC6AC;
        font-size: 14px;
    }
    .share-button .icon-wrapper ul li:last-child a{
        background-color: #1FC6AC;
    }
    .share-button .icon-wrapper ul li:last-child a i{
        color: #2d3847;
        position: relative;
        left: 1px;
    }
</style>
@endsection

@section('content')

<section class="section" id="about" style="width:100%; height:100%; background-color:white">

    <div class="container">
        {{-- INFORMACIÓN DEL LIBRO --}}
        <div class="row">
            {{-- IMAGENES --}}
            <div class="col" id="col-carrusel">
                <div class="libro-fotos">
                    {{-- <img id="imagen-seleccionada" src="{{asset('storage/libros/'.$book->tiendaImagen)}}"> --}}
                    {{-- <div id="imagen-seleccionada" class="mx-auto"
                        style="height: 400px; width: 400px; background: url('{{asset('storage/libros/'.$book->tiendaImagen)}}') no-repeat center center; background-size: cover; cursor: pointer;">
                    </div>
                    <div class="item"
                        style="width:400px; height:400px; background: url('{{asset('storage/libros/'.$book->tiendaImagen)}}') no-repeat center center; background-size: cover; cursor: pointer;"
                        onclick="clickImagen('{{asset('storage/libros/'.$book->tiendaImagen)}}'); setIndex(0)"></div>
                    --}}

                    <div id="wrapper">

                        <div id="slider-wrap">
                            <ul id="slider">
                                <li data-color="#1abc9c">
                                    <div class="imagen-seleccionada" class="mx-auto"
                                        style="height: 300px; width: 300px; background: url('{{asset('storage/libros/'.$book->tiendaImagen)}}') no-repeat center center; background-size: cover; cursor: pointer;">
                                    </div>
                                </li>

                                @foreach($book->images as $imagen)
                                <li data-color="#1abc9c">
                                    <div class="imagen-seleccionada" class="mx-auto"
                                        style="height: 300px; width: 300px; background: url('{{asset('storage/libros/'.$imagen->imagen)}}') no-repeat center center; background-size: cover; cursor: pointer;">
                                    </div>
                                </li>
                                @endforeach

                                {{-- <li data-color="#3498db">
                                    <div>
                                        <h3>Slide #2</h3>
                                        <span>Sub-title #2</span>
                                    </div>
                                    <i class="fa fa-gears"></i>
                                </li>

                                <li data-color="#9b59b6">
                                    <div>
                                        <h3>Slide #3</h3>
                                        <span>Sub-title #3</span>
                                    </div>
                                    <i class="fa fa-sliders"></i>
                                </li>

                                <li data-color="#34495e">
                                    <div>
                                        <h3>Slide #4</h3>
                                        <span>Sub-title #4</span>
                                    </div>
                                    <i class="fa fa-code"></i>
                                </li>

                                <li data-color="#e74c3c">
                                    <div>
                                        <h3>Slide #5</h3>
                                        <span>Sub-title #5</span>
                                    </div>
                                    <i class="fa fa-microphone-slash"></i>
                                </li> --}}


                            </ul>

                            <!--controls-->
                            <div class="btns" id="next"><i class="fa fa-arrow-right"></i></div>
                            <div class="btns" id="previous"><i class="fa fa-arrow-left"></i></div>
                            <div id="counter"></div>

                            <div id="pagination-wrap">
                                <ul>
                                </ul>
                            </div>
                            <!--controls-->

                        </div>

                    </div>
                    {{-- SLIDER
                    @if (count($book->images) > 0)
                    <div class="owl-carousel">
                        {{-- IMAGEN DE LA TIENDA
                        <div class="imagen-carrusel">
                            <img src="{{asset('storage/libros/'.$book->tiendaImagen)}}"
                                onclick="clickImagen('{{asset('storage/libros/'.$book->tiendaImagen)}}')">
                        </div>

                        {{-- IMAGEN DE LA PORTADA
                        <div class="imagen-carrusel">
                            <img src="{{asset('storage/libros/'.$book->portadaImagen)}}"
                                onclick="clickImagen('{{asset('storage/libros/'.$book->portadaImagen)}}')">
                        </div>

                        {{-- IMAGENES EXTRA
                        @foreach($book->images as $imagen)
                        <div class="imagen-carrusel">
                            <img src="{{asset('storage/libros/'.$imagen->imagen)}}"
                                onclick="clickImagen('{{asset('storage/libros/'.$imagen->imagen)}}')">
                        </div>
                        @endforeach
                    </div>
                    @endif --}}
                </div>

                {{-- CARRUSEL --}}
                <div class="row">

                </div>
                {{-- NOMBRE LIBRO --}}
                <div class="row">
                    <p class="cj-titulo">{{Str::limit($book->titulo,61)}}</p>
                </div>
                {{-- AUTOR --}}
                <div class="row mt-4" style="display:flex; align-items:center">
                    <div class="col" style="padding: 0px; padding-left:15px">
                        <p class="cj-info align-middle" style="line-height:20px">
                            <b style="font-weight: bold">Autor: </b> {{$book->authors[0]->nombre}}
                        </p>

                        {{-- @if (count($book->authors) > 1)
                        <p class="libro-info-res"><b>Autores: </b>
                            @else
                        <p class="libro-info-res"><b>Autor: </b>
                            @endif
                            @php
                            $contador = 1;
                            $cantAutores = count($book->authors);
                            @endphp
                            @foreach ($book->authors as $author)
                            @if ($contador == 1)
                            <a href="{{ route('autor', ['id' => $author->id]) }}"
                                class="sm-link sm-link3 sm-link_padding-bottom"><span
                                    class="sm-link__label">{{$author->nombre}}</span></a>
                            @elseif($contador == $cantAutores)
                            y <a href="{{ route('autor', ['id' => $author->id]) }}"
                                class="sm-link sm-link3 sm-link_padding-bottom"><span
                                    class="sm-link__label">{{$author->nombre}}</span></a>
                            @else
                            , <a href="{{ route('autor', ['id' => $author->id]) }}"
                                class="sm-link sm-link3 sm-link_padding-bottom"><span
                                    class="sm-link__label">{{$author->nombre}}</span></a>
                            @endif
                            @php
                            $contador++;
                            @endphp
                            @endforeach
                        </p> --}}
                    </div>
                    <div class="col">
                        <a href="{{$book->authors[0]->link}}" target="_blank">
                            <button class="shrink cj-button align-top">
                                Seguir al autor
                                <img class="ml-1" style="width: 18px; height: 18px"
                                    src="{{ asset('assets/fonts/plus.svg') }}" />
                            </button>
                        </a>
                    </div>
                </div>
            </div>

            {{-- BOTONES COMPRA CELULAR --}}
            <div class="col ld-inverso" id="col-carrusel">
                <div class="container-buttons">
                    <div class="button-purchase" id="agregarBolsaFisicoMobile">
                        <div class="inside-button">
                            <span class="text1">Libro físico:</span>
                            <span class="text2">
                                @if($book->precioFisico <= 0) Gratis @else {{-- Si no entonces se muestra el precio --}}
                                    @if($book->descuentoFisico > 0)
                                    ${{ number_format($book->precioFisico -
                                    $book->precioFisico*($book->descuentoFisico/100), 2 , ".", "," ) }}
                                    @else
                                    ${{ number_format($book->precioFisico, 2 , ".", "," ) }}
                                    @endif
                                    @endif
                            </span>
                        </div>
                    </div>
                    @if ($book->linkAmazon)
                    <a class="button-purchase" href="{{$book->linkAmazon}}" target="_blank">
                        <div class="inside-button">
                            <span class="text1">Libro Amazon:</span>
                            <span class="text2">
                                {{-- Si el precio es 0 se muestra Gratis--}}
                                @if($book->precioDigital <= 0) Gratis @else @if($book->descuentoDigital > 0)
                                    ${{ number_format($book->precioDigital -
                                    $book->precioDigital*($book->descuentoDigital/100), 2 , ".", "," ) }}
                                    @else
                                    ${{ number_format($book->precioDigital, 2 , ".", "," ) }}
                                    @endif
                                    @endif
                            </span>
                        </div>
                    </a>
                    @endif

                    @if ($book->linkGoogle)
                    <a class="button-purchase" href="{{$book->linkGoogle}}" target="_blank">
                        <div class="inside-button">
                            <span class="text1">Libro Google:</span>
                            <span class="text2">
                                {{-- Si el precio es 0 se muestra Gratis--}}
                                @if($book->precioDigital <= 0) Gratis @else @if($book->descuentoDigital > 0)
                                    ${{ number_format($book->precioDigital -
                                    $book->precioDigital*($book->descuentoDigital/100), 2 , ".", "," ) }}
                                    @else
                                    ${{ number_format($book->precioDigital, 2 , ".", "," ) }}
                                    @endif
                                    @endif
                            </span>
                        </div>
                    </a>
                    @endif

                    @if ($book->linkAudio)
                    <a class="button-purchase" href="{{$book->linkAudio}}" target="_blank">
                        <div class="inside-button">
                            <span class="text1">Audio libro:</span>
                            <span class="text2">
                                {{-- Si el precio es 0 se muestra Gratis--}}
                                @if($book->precioAudio <= 0) Gratis @else @if($book->descuentoAudio > 0)
                                    ${{ number_format($book->precioAudio -
                                    $book->precioAudio*($book->descuentoAudio/100), 2 , ".", "," ) }}
                                    @else
                                    ${{ number_format($book->precioAudio, 2 , ".", "," ) }}
                                    @endif
                                    @endif
                            </span>
                        </div>
                    </a>
                    @endif

                    @if ($book->linkDemo)
                    <a class="button-purchase" href="{{asset('storage/libros/'.$book->linkDemo)}}" target="_blank">
                        <div class="inside-button">
                            <span class="text1">Prueba el libro:</span>
                            <span class="text2">GRATIS</span>
                        </div>
                    </a>
                    @endif
                </div>
            </div>

            {{-- INFO --}}
            <div class="col-5" id="col-info">
                {{-- Sinopsis --}}
                <div class="row">
                    <p class="cj-info2 align-middle cj-scroll" style="white-space: pre-wrap; text-align: center;"> 
                        <b style="font-weight: bold">Sinopsis: </b> {{ $book->sinopsis }}
                    </p>
                </div>


                <div>
                    <div class="row">
                        <div class="col" style="padding: 0px">
                            <p class="cj-info2 align-middle">
                                {{-- <b style="font-weight: bold">Editorial: </b> {{ $book->sello->nombre }} --}}
                            </p>
                        </div>
                        <div class="col" style="padding: 0px">
                            <p class="cj-info2 align-middle">
                                <b style="font-weight: bold">Idioma: </b> Español
                            </p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col" style="padding: 0px">
                            <p class="cj-info2 align-middle">
                                <b style="font-weight: bold">Páginas: </b> {{ $book->paginas }}
                            </p>
                        </div>
                        <div class="col" style="padding: 0px">
                            <p class="cj-info2 align-middle">
                                <b style="font-weight: bold">Publicado: </b>
                                @php
                                $separa=explode("-",$book->fechaPublicacion);
                                $anio=$separa[0];
                                $mes=$separa[1];
                                $dia=$separa[2];
                                @endphp
                                {{$dia}}/{{$mes}}/{{$anio}}
                            </p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col" style="padding: 0px">
                            <p class="cj-info2 align-middle">
                                <b style="font-weight: bold">
                                    @if (count($book->genres) > 1)
                                    Géneros:
                                    @else
                                    Género:
                                    @endif
                                </b>
                                @php
                                $contador = 1;
                                $cantGeneros = count($book->genres);
                                @endphp
                                @foreach ($book->genres as $genre)
                                @if ($contador == 1)
                                {{$genre->nombre}}
                                @elseif($contador == $cantGeneros)
                                y {{$genre->nombre}}
                                @else
                                , {{$genre->nombre}}
                                @endif
                                @php
                                $contador++;
                                @endphp
                                @endforeach
                            </p>
                        </div>
                        <div class="col" style="padding: 0px">
                            <p class="cj-info2 align-middle">
                                <b style="font-weight: bold">Edad de lectura: </b>
                                18 y más
                            </p>
                        </div>
                    </div>
                </div>

                {{-- <div class="libro-info">

                    @if ($book->linkDemo)
                    <a href="{{asset('storage/libros/'.$book->linkDemo)}}" target="_blank"
                        class="sm-link sm-link3 sm-link_padding-bottom">
                        <p style="color:#83d7b5;">
                            Descarga el pdf promocional
                        </p>
                    </a>
                    @endif

                </div> --}}
            </div>

            {{-- PRECIOS --}}
            <div class="col ld-oculto" id="col-precios">
                <div class="cj-book-border">
                    @if ($book->linkDemo)
                    <div class="row cj-book-price">
                        <p class="cj-titulo">Prueba el libro: <span style="color: #1FC6AC">GRATIS</span></p>
                    </div>
                    <div class="row">
                        <a class="shrink cj-button-bolsa" href="{{asset('storage/libros/'.$book->linkDemo)}}"
                            target="_blank" style="text-decoration: none; color: white;">
                            Agregar a la bolsa
                        </a>
                    </div>
                    @endif

                    @if ($book->linkAmazon)
                    <div class="row cj-book-price">
                        <p class="cj-titulo">Libro Amazon:
                            <span style="color: #1FC6AC">
                                {{-- Si el precio es 0 se muestra Gratis--}}
                                @if($book->precioDigital <= 0) Gratis @else @if($book->descuentoDigital > 0)
                                    ${{ number_format($book->precioDigital -
                                    $book->precioDigital*($book->descuentoDigital/100), 2 , ".", "," ) }}
                                    @else
                                    ${{ number_format($book->precioDigital, 2 , ".", "," ) }}
                                    @endif
                                    @endif
                            </span>
                        </p>
                    </div>
                    <div class="row">
                        <a class="shrink cj-button-bolsa" href="{{$book->linkAmazon}}" target="_blank">
                            Agregar a la bolsa
                        </a>
                    </div>
                    @endif

                    @if ($book->linkGoogle)
                    <div class="row cj-book-price">
                        <p class="cj-titulo">Libro Google:
                            <span style="color: #1FC6AC">
                                {{-- Si el precio es 0 se muestra Gratis--}}
                                @if($book->precioDigital <= 0) Gratis @else @if($book->descuentoDigital > 0)
                                    ${{ number_format($book->precioDigital -
                                    $book->precioDigital*($book->descuentoDigital/100), 2 , ".", "," ) }}
                                    @else
                                    ${{ number_format($book->precioDigital, 2 , ".", "," ) }}
                                    @endif
                                    @endif
                            </span>
                        </p>
                    </div>
                    <div class="row">
                        <a class="shrink cj-button-bolsa" href="{{$book->linkGoogle}}" target="_blank">
                            Agregar a la bolsa
                        </a>
                    </div>
                    @endif

                    @if ($book->linkAudio)
                    <div class="row cj-book-price">
                        <p class="cj-titulo">Audio Libro:
                            <span style="color: #1FC6AC">
                                {{-- Si el precio es 0 se muestra Gratis--}}
                                @if($book->precioAudio <= 0) Gratis @else @if($book->descuentoAudio > 0)
                                    ${{ number_format($book->precioAudio -
                                    $book->precioAudio*($book->descuentoAudio/100), 2 , ".", "," ) }}
                                    @else
                                    ${{ number_format($book->precioAudio, 2 , ".", "," ) }}
                                    @endif
                                    @endif
                            </span>
                        </p>
                    </div>
                    <div class="row">
                        <a class="shrink cj-button-bolsa" href="{{$book->linkAudio}}" target="_blank">
                            Agregar a la bolsa
                        </a>
                    </div>
                    @endif

                    @if ($book->stockFisico > 0)
                    <div class="row cj-book-price">
                        <p class="cj-titulo">Libro Físico:
                            <span style="color: #1FC6AC">
                                {{-- Si el precio es 0 se muestra Gratis--}}
                                @if($book->precioFisico <= 0) Gratis @else {{-- Si no entonces se muestra el precio --}}
                                    @if($book->descuentoFisico > 0)
                                    ${{ number_format($book->precioFisico -
                                    $book->precioFisico*($book->descuentoFisico/100), 2 , ".", "," ) }}
                                    @else
                                    ${{ number_format($book->precioFisico, 2 , ".", "," ) }}
                                    @endif
                                    @endif
                            </span>
                        </p>
                    </div>
                    <div class="row">
                        <button class="shrink cj-button-bolsa" id="agregarBolsaFisico">
                            Agregar a la bolsa
                        </button>
                    </div>
                    @endif

                    {{-- EN CASO DE QUE EL LIBRO ESTÉ DISPONIBLE SE MUESTRA EL SIGUIENTE MENSAJE --}}
                    <div class="mensaje">
                        <p
                            style="color:#2E2E2E; font-size:13px; margin-bottom:17px; font-family:'Montserrat'; font-weight:light">
                            Pueden aplicarse gastos de envío
                        </p>
                        <a title="Stripe"><img src="{{asset('img/ico/stripe.png')}}" width="50%"></a>
                        <!-- PayPal Logo --><a title="PayPal"><img
                                src="https://www.paypalobjects.com/webstatic/mktg/Logo/pp-logo-100px.png" border="0"
                                alt="PayPal Logo"></a>
                    </div>
                </div>

                {{-- <div class="libro-comprar">
                    <div class="comprar">
                        {{-- FISICO
                        <div class="formato">
                            <p style="padding-top: 20px;">Formato Físico:</p>
                        </div>
                        <div class="precio">
                            {{-- Si el precio es 0 se muestra Gratis
                            @if($book->precioFisico <= 0) Gratis @else {{-- Si no entonces se muestra el precio
                                @if($book->descuentoFisico > 0)
                                <div class="oferta">
                                    ${{ number_format($book->precioFisico, 2 , ".", "," ) }}
                                </div>

                                ${{ number_format($book->precioFisico -
                                $book->precioFisico*($book->descuentoFisico/100), 2 , ".", "," ) }}
                                @else
                                ${{ number_format($book->precioFisico, 2 , ".", "," ) }}
                                @endif
                                @endif
                        </div>

                        {{-- AHORRO (EN CASO DE OFERTA) y que no sea gratis
                        @if ($book->descuentoFisico > 0 && $book->precioFisico > 0)
                        <div class="ahorro">
                            <p>Ahorras: ${{ number_format($book->precioFisico*($book->descuentoFisico/100), 2 , ".", ","
                                ) }}</p>
                        </div>
                        @endif

                        {{-- DISPONIBILIDAD
                        @if ($book->stockFisico > 0)
                        <div class="disponibilidad">
                            <p style="color: #29B390;">Disponible</p>
                        </div>
                        @else
                        <div class="disponibilidad">
                            <p style="color: #BA1F00;">No Disponible</p>
                        </div>
                        @endif

                        {{-- DIGITAL
                        {{-- SI EL PRECIO DEL FORMATO DIGITAL ES MAYOR A CERO SE MUESTRA
                        <div class="formato">
                            <p style="padding-top: 7px;">Formato Digital:</p>
                        </div>
                        <div class="precio">
                            @if($book->precioDigital <= 0) Gratis @else @if($book->descuentoDigital > 0)
                                <div class="oferta">
                                    ${{ number_format($book->precioDigital, 2 , ".", "," ) }}
                                </div>

                                ${{ number_format($book->precioDigital -
                                $book->precioDigital*($book->descuentoDigital/100), 2 , ".", "," ) }}
                                @else
                                ${{ number_format($book->precioDigital, 2 , ".", "," ) }}
                                @endif
                                @endif
                        </div>

                        {{-- AHORRO (EN CASO DE OFERTA) y que sea gratis
                        @if ($book->descuentoDigital > 0 && $book->precioDigital > 0)
                        <div class="ahorro">
                            <p>Ahorras: ${{ number_format($book->precioDigital*($book->descuentoDigital/100), 2 , ".",
                                "," ) }}</p>
                        </div>
                        @endif

                        {{-- DISPONIBILIDAD
                        @if ($book->stockDigital > 0)
                        <div class="disponibilidad">
                            <p style="color: #29B390;">Disponible</p>
                        </div>
                        @else
                        <div class="disponibilidad">
                            <p style="color: #BA1F00;">No Disponible</p>
                        </div>
                        @endif

                        @if($book->stockFisico > 0 || $book->stockDigital > 0)
                        {{-- EN CASO DE QUE EL LIBRO ESTÉ DISPONIBLE SE MUESTRA EL SIGUIENTE MENSAJE
                        <div class="mensaje">
                            <p>
                                Pueden aplicarse gastos de envío,
                            </p>
                            <a title="Stripe"><img src="{{asset('storage/stripe.png')}}" width="50%"></a>
                            <!-- PayPal Logo --><a title="PayPal"><img
                                    src="https://www.paypalobjects.com/webstatic/mktg/Logo/pp-logo-100px.png" border="0"
                                    alt="PayPal Logo"></a>
                        </div>

                        {{-- BOTONES DE COMPRA
                        <button class="carrito-button shrink" data-toggle="modal" data-target="#comprarFormato"
                            onclick="comprarCarrito()"><img src="{{asset('img/ico/carrito.png')}}"> Agregar al
                            carrito</button>
                        <button class="comprar-button shrink" data-toggle="modal" data-target="#comprarFormato"
                            onclick="comprarAhora()">Comprar ahora</button>
                        @endif
                    </div>
                </div> --}}
            </div>

            {{-- BOTON COMPARTIR CELULAR --}}
            <div class="col ld-inverso" id="col-carrusel">
                {{-- <div style="width: 100%; display: flex; justify-content: center">
                    <button class="ld-button share-button">Compartir este libro</button>
                </div> --}}
                
                <div class="share-button">
                    <a href="#">Compartir este libro</a>
                    <div class="icon-wrapper">
                        <ul>
                            <li><a class="twitter customer share" href="{{"https://twitter.com/share?url=".URL::current()."&amp"}}" title="Twitter share" target="_blank"><i class="fa fa-twitter"></i></a></li>
                            <li><a target="_blank" href="{{"https://www.facebook.com/sharer.php?u=".URL::current()}}" title="Facebook share" target="_blank" class="customer share"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="{{"mailto:?subject=".$book->titulo."-Booke&body=Comprar ".$book->titulo. "  ".URL::current()}}"><i class="fa fa-envelope"></i></a></li>
                            <li><a href="{{URL::current()}}" class="copy_text"><i class="fa fa-link"></i></a></li>
                            <li><a href="#" class="close-social-icons"><i class="fa fa-times"></i></a></li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>

        {{-- CARRUSEL DE LIBROS DE LOS AUTORES --}}
        @if(count($books) > 1)
        <hr class="hr-tienda ld-oculto">
        {{-- <div class="container"> --}}
            <div class="row ld-oculto">
                <div class="MultiCarousel" data-items="1,3,3,3" data-slide="1" id="MultiCarousel" data-interval="1000">
                    @if (count($book->authors) > 1)
                    <p class="mas-autor-libro">Más de estos autores</p>
                    @else
                    <p class="mas-autor-libro">Más de este autor</p>
                    @endif
                    <div class="MultiCarousel-inner">
                        @foreach ($books as $bookBanner)
                        @if($book->id != $bookBanner->id)
                        <div class="item"
                            onclick="window.location.href='{{ route('libro',['id' => $bookBanner->name ?? $bookBanner->id]) }}'">
                            <div class="pad15">
                                <div class="div_portadapad15">
                                    <img alt="{{$bookBanner->bannerImagen}}"
                                        src="{{asset('storage/libros/'.$bookBanner->tiendaImagen)}}">
                                </div>
                                <div class="div_infoCarrusel">
                                    <p class="txt-infoCarrusel"><b>Nombre:</b>&nbsp;
                                        <i>{{$bookBanner->titulo}}</i>
                                    </p>
                                    <p class="txt-infoCarrusel" style="margin-top: 4%"><b>Género:</b>&nbsp;

                                        <i>{{$bookBanner->genres[0]->nombre}}</i>
                                    </p>

                                </div>

                            </div>
                        </div>
                        @endif
                        @endforeach


                    </div>
                    <button class="btn  leftLst"><i class="fas fa-chevron-left" style="color:gray"></i></button>
                    <button class="btn  rightLst"><i class="fas fa-chevron-right" style="color:gray"></i></button>
                </div>
            </div>
            {{--
        </div> --}}
        @endif
        <br>
    </div>
</section>

{{-- MODAL DE COMPRA --}}
<div class="modal fade" id="comprarFormato" tabindex="-1" role="dialog" aria-labelledby="comprarFormatoTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle" style="width: 100%; text-align:center;">{{
                    $book->titulo }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h6 style="width: 100%; text-align:center; padding-bottom: 7px;">Elige el formato:</h6>
                <div style="display: table; width:100%;">
                    {{-- FORMATO FISICO --}}
                    <div class="formato-comprar">
                        <div class="formato-container shrink" style="height: 213.8px">
                            <div class="boton-formato" id="botonFisico" data-toggle="modal" data-target=@if ($book->
                                stockFisico > 0)
                                {!!"#comprarFormato"!!}
                                @endif>
                                <div class="formato">
                                    <p style="padding-top: 20px;">Formato Físico:</p>
                                </div>
                                {{-- PRECIO --}}
                                <div class="precio" id="precioFisico">
                                    {{-- Si el precio es 0 se muestra Gratis--}}
                                    @if($book->precioFisico <= 0) Gratis @else {{-- Si no entonces se muestra el precio
                                        --}} @if($book->descuentoFisico > 0)
                                        <div class="oferta">
                                            ${{ number_format($book->precioFisico, 2 , ".", "," ) }}
                                        </div>

                                        ${{ number_format($book->precioFisico -
                                        $book->precioFisico*($book->descuentoFisico/100), 2 , ".", "," ) }}
                                        @else
                                        ${{ number_format($book->precioFisico, 2 , ".", "," ) }}
                                        @endif
                                        @endif
                                </div>

                                {{-- AHORRO (EN CASO DE DESCUENTO Y QUE NO SEA GRATIS) --}}
                                <div class="ahorro" id="ahorroFisico">
                                    @if ($book->descuentoFisico > 0 && $book->precioFisico > 0)
                                    <p>Ahorras: ${{ number_format($book->precioFisico*($book->descuentoFisico/100), 2 ,
                                        ".", "," ) }}</p>
                                    @endif
                                </div>

                                {{-- DISPONIBILIDAD --}}
                                <div class="disponibilidad" id="disponibleFisico">
                                    @if ($book->stockFisico > 0)
                                    <p style="color: #29B390;">Disponible</p>
                                    @else
                                    <p style="color: #BA1F00;">No Disponible</p>
                                    @endif
                                </div>
                            </div>

                            {{-- CANTIDAD --}}
                            <div class="cantidad" style="padding-bottom: 20px; height: 71px;">
                                {{-- si hay libros disponibles se muestra la cantidad que puede pedir --}}
                                @if ($book->stockFisico > 0)
                                <p id="cantidad-p">Cantidad: </p>
                                {{-- se establece un minimo como cero --}}
                                @php
                                $min = 0;
                                @endphp
                                {{-- en caso que el producto se encuentre en el carrito se establece el minimo como la
                                cantidad que ya está en el carrito --}}
                                @if (session('cart'))
                                @foreach(session('cart') as $id => $details)
                                @if ($id == $book->id && $details['cantidadFisico'] > 0)
                                @php
                                $min = $details['cantidadFisico'];
                                @endphp
                                @endif
                                @endforeach
                                @endif
                                {{-- si el producto no se encontraba en el carrito entonces el minimo se establece como
                                1 --}}
                                @if ($min == 0)
                                @php
                                $min = 1;
                                @endphp
                                @endif
                                {{-- si hay mas de un libro en stock entonces se pone el minimo como cantidad --}}
                                @if ($book->stockFisico > 1)
                                <div role="button" tabindex="0" class="qty qty-minus botonCantidad" id="menosCarrito">-
                                </div>
                                <input type="numeric" id="cantidadFisico" value="{{ $min }}" />
                                <div role="button" tabindex="0" class="qty qty-plus botonCantidad" id="masCarrito">+
                                </div>
                                @else
                                {{-- si solo hay un libro disponible entonces solamente se podra seleccionar un libro
                                como maximo --}}
                                <input type="numeric" id="cantidadFisico" value="1" />
                                @endif
                                @endif
                            </div>
                        </div>
                    </div>

                    {{-- FORMATO DIGITAL --}}
                    <div class="formato-comprar" id="botonDigital" data-toggle="modal" data-target=@if ($book->
                        stockDigital > 0)
                        {!!"#comprarFormato"!!}
                        @endif>
                        <div class="formato-container shrink" style="height: 213.8px">
                            <div class="formato">
                                <p style="padding-top: 20px;">Formato Digital:</p>
                            </div>

                            {{-- PRECIO --}}
                            <div class="precio" id="precioDigital">
                                {{-- Si el precio es 0 se muestra Gratis--}}
                                @if($book->precioDigital <= 0) Gratis @else {{-- Si no entonces se muestra el precio
                                    --}} @if($book->descuentoDigital > 0)
                                    <div class="oferta">
                                        ${{ number_format($book->precioDigital, 2 , ".", "," ) }}
                                    </div>

                                    ${{ number_format($book->precioDigital -
                                    $book->precioDigital*($book->descuentoDigital/100), 2 , ".", "," ) }}
                                    @else
                                    ${{ number_format($book->precioDigital, 2 , ".", "," ) }}
                                    @endif
                                    @endif
                            </div>

                            {{-- AHORRO (EN CASO DE DESCUENTO Y QUE NO SEA GRATIS) --}}
                            <div class="ahorro" id="ahorroDigital">
                                @if ($book->descuentoDigital > 0 && $book->precioDigital > 0)
                                <p>Ahorras: ${{ number_format($book->precioDigital*($book->descuentoDigital/100), 2 ,
                                    ".", "," ) }}</p>
                                @endif
                            </div>

                            {{-- DISPONIBILIDAD --}}
                            <div class="disponibilidad" id="disponibleDigital">
                                @if ($book->stockDigital > 0)
                                <p style="color: #29B390;">Disponible</p>
                                @else
                                <p style="color: #BA1F00;">No Disponible</p>
                                @endif
                            </div>

                            {{-- LA CANTIDAD EN DIGITAL SIEMPRE SERÁ UNO --}}
                            <div class="cantidad" style="padding-bottom: 20px; height: 71px;" id="cantidadDigital">
                                @if ($book->stockDigital > 0)
                                <p id="cantidad-p">Cantidad: </p>
                                <p>1</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Root element of PhotoSwipe. Must have class pswp. -->
<div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">

    <!-- Background of PhotoSwipe.
        It's a separate element as animating opacity is faster than rgba(). -->
    <div class="pswp__bg"></div>

    <!-- Slides wrapper with overflow:hidden. -->
    <div class="pswp__scroll-wrap">

        <!-- Container that holds slides.
            PhotoSwipe keeps only 3 of them in the DOM to save memory.
            Don't modify these 3 pswp__item elements, data is added later on. -->
        <div class="pswp__container">
            <div class="pswp__item"></div>
            <div class="pswp__item"></div>
            <div class="pswp__item"></div>
        </div>

        <!-- Default (PhotoSwipeUI_Default) interface on top of sliding area. Can be changed. -->
        <div class="pswp__ui pswp__ui--hidden">

            <div class="pswp__top-bar">

                <!--  Controls are self-explanatory. Order can be changed. -->

                <div class="pswp__counter"></div>

                <button class="pswp__button pswp__button--close" title="Close (Esc)"></button>

                <button class="pswp__button pswp__button--share" title="Share"></button>

                <button class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button>

                <button class="pswp__button pswp__button--zoom" title="Zoom in/out"></button>

                <!-- Preloader demo https://codepen.io/dimsemenov/pen/yyBWoR -->
                <!-- element will get class pswp__preloader--active when preloader is running -->
                <div class="pswp__preloader">
                    <div class="pswp__preloader__icn">
                        <div class="pswp__preloader__cut">
                            <div class="pswp__preloader__donut"></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
                <div class="pswp__share-tooltip"></div>
            </div>

            <button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)">
            </button>

            <button class="pswp__button pswp__button--arrow--right" title="Next (arrow right)">
            </button>

            <div class="pswp__caption">
                <div class="pswp__caption__center"></div>
            </div>

        </div>

    </div>

</div>

<script>
    var pswpElement = document.querySelectorAll('.pswp')[0];
    var index = 0;
    function setIndex(i){
        index = i;
    }
    // build items array
    var openPhotoSwipe = function() {
        var items = [
            {
                src: '{{asset('storage/libros/'.$book->tiendaImagen)}}',
                w: 0,
                h: 0
            },
            @foreach($book->images as $imagen)
                {
                    src: '{{asset('storage/libros/'.$imagen->imagen)}}',
                    w: 0,
                    h: 0
                },
            @endforeach
            // foreach ($propiedad->photos as $photo)
            // {
            //     src: '{asset($photo->path)}}',
            //     w: 0,
            //     h: 0
            // },
            // endforeach
        ];
        // define options (if needed)
        var options = {
            // optionName: 'option value'
            // for example:
            index: index // start at first slide
        };
        // Initializes and opens PhotoSwipe
        var gallery = new PhotoSwipe( pswpElement, PhotoSwipeUI_Default, items, options);
        gallery.listen('gettingData', function(index, item) {
            if (item.w < 1 || item.h < 1) { // unknown size
                var img = new Image();
                img.onload = function() { // will get size after load
                    item.w = this.width; // set image width
                    item.h = this.height; // set image height
                    gallery.invalidateCurrItems(); // reinit Items
                    gallery.updateSize(true); // reinit Items
                }
                img.src = item.src; // let's download image
            }
        });
        gallery.init();
    };
    // document.getElementById('imagen-seleccionada').onclick = openPhotoSwipe;
    // document.getElementsByClassName('imagen-seleccionada').onclick = openPhotoSwipe;
    var anchors = document.getElementsByClassName('imagen-seleccionada');
        for(var i = 0; i < anchors.length; i++) {
            var anchor = anchors[i];
            anchor.onclick = openPhotoSwipe;
        }
</script>

{{-- ESTE SCRIPT CONTROLA EL ZOOM DE LA IMAGEN Y EL LEER MAS --}}
<script>
    //pre es el elemento donde se muestra la previsualizacion de la imagen seleccionada
    //"imagen-seleccionada" es el visualizador de la imagen
    // var pre = document.getElementById("imagen-seleccionada");
    // //imagen es la imagen que se ha seleccionado
    // var imagen = pre.src;

    //Controla el boton de leer mas
    function leerMas() {
        var dots1 = document.getElementById("dots1");
        var dots2 = document.getElementById("dots2");
        var moreText = document.getElementById("more");
        var btnText = document.getElementById("myBtn");

        if (dots1.style.display === "none") {
            dots1.style.display = "inline";
            dots2.style.display = "inline";
            btnText.innerHTML = "Leer más";
            moreText.style.display = "none";
        } else {
            dots1.style.display = "none";
            dots2.style.display = "none";
            btnText.innerHTML = "Leer menos";
            moreText.style.display = "inline";
        }
    }

    //controla cuando se selecciona una imagen
    // function clickImagen(nuevaImagen){
    //     //hace que se muestre la nueva imagen en el visualizador
    //     pre.src = nuevaImagen;
    //     //obtiene la imagen para el zoom
    //     imagen = nuevaImagen;
    // }
</script>

{{-- ESTE SCRIPT CONTROLA LA ANIMACION DE COMPRA Y EL CARRITO --}}
<script>
    var animacion;
    var animacion2;
    var comraA = false;

    function comprarAhora(){
        comraA = true;
    }

    function comprarCarrito(){
        comraA = false;
    }

    $(document).ready(function(){

        $('.owl-carousel').owlCarousel({
            loop:true,
            margin:2.5,
            nav:true,
            items:3,
            navText : ['<i class="fa fa-angle-left fa-2x" aria-hidden="true"></i>','<i class="fa fa-angle-right fa-2x" aria-hidden="true"></i>']
        })
    });

    $(document).ready(function () {
    var itemsMainDiv = ('.MultiCarousel');
    var itemsDiv = ('.MultiCarousel-inner');
    var itemWidth = "";

    $('.leftLst, .rightLst').click(function () {
        var condition = $(this).hasClass("leftLst");
        if (condition)
            click(0, this);
        else
            click(1, this)
    });

    ResCarouselSize();




    $(window).resize(function () {
        ResCarouselSize();
    });

    //this function define the size of the items
    function ResCarouselSize() {
        var incno = 0;
        var dataItems = ("data-items");
        var itemClass = ('.item');
        var id = 0;
        var btnParentSb = '';
        var itemsSplit = '';
        var sampwidth = $(itemsMainDiv).width();
        var bodyWidth = $('body').width();
        $(itemsDiv).each(function () {
            id = id + 1;
            var itemNumbers = $(this).find(itemClass).length;
            btnParentSb = $(this).parent().attr(dataItems);
            itemsSplit = btnParentSb.split(',');
            $(this).parent().attr("id", "MultiCarousel" + id);


            if (bodyWidth >= 1200) {
                incno = itemsSplit[3];
                itemWidth = sampwidth / incno;
            }
            else if (bodyWidth >= 992) {
                incno = itemsSplit[2];
                itemWidth = sampwidth / incno;
            }
            else if (bodyWidth >= 768) {
                incno = itemsSplit[1];
                itemWidth = sampwidth / incno;
            }
            else {
                incno = itemsSplit[0];
                itemWidth = sampwidth / incno;
            }
            $(this).css({ 'transform': 'translateX(0px)', 'width': itemWidth * itemNumbers });
            $(this).find(itemClass).each(function () {
                $(this).outerWidth(itemWidth);
            });

            $(".leftLst").addClass("over");
            $(".rightLst").removeClass("over");

        });
    }


    //this function used to move the items
    function ResCarousel(e, el, s) {
        var leftBtn = ('.leftLst');
        var rightBtn = ('.rightLst');
        var translateXval = '';
        var divStyle = $(el + ' ' + itemsDiv).css('transform');
        var values = divStyle.match(/-?[\d\.]+/g);
        var xds = Math.abs(values[4]);
        if (e == 0) {
            translateXval = parseInt(xds) - parseInt(itemWidth * s);
            $(el + ' ' + rightBtn).removeClass("over");

            if (translateXval <= itemWidth / 2) {
                translateXval = 0;
                $(el + ' ' + leftBtn).addClass("over");
            }
        }
        else if (e == 1) {
            var itemsCondition = $(el).find(itemsDiv).width() - $(el).width();
            translateXval = parseInt(xds) + parseInt(itemWidth * s);
            $(el + ' ' + leftBtn).removeClass("over");

            if (translateXval >= itemsCondition - itemWidth / 2) {
                translateXval = itemsCondition;
                $(el + ' ' + rightBtn).addClass("over");
            }
        }
        $(el + ' ' + itemsDiv).css('transform', 'translateX(' + -translateXval + 'px)');
    }

    //It is used to get some elements from btn
    function click(ell, ee) {
        var Parent = "#" + $(ee).parent().attr("id");
        var slide = $(Parent).attr("data-slide");
        ResCarousel(ell, Parent, slide);
    }

    });

    var seleccionado = {{ $book->id }};
    //cada vez que se recarga la página obtenemos el carrito
    var carrito = @json(session()->get('cart'));
    var tooltipTimeout;

    //CANTIDAD, BOTON MENOS
    $('#menosCarrito').click(function(){
        //se obtiene el numero del input y se hace la resta
        var number = document.getElementById("cantidadFisico").value;

        var libro = @json($book);
        var max = libro['stockFisico'];

        number--;

        //no se deja que la cantidad sea menor a 0
        if(number < 1){
            number = 1;
        }

        //no se deja que la cantidad sea menor a 0
        if(number > max){
            number = max;
        }

        document.getElementById("cantidadFisico").value = number;
    });

    //CANTIDAD, BOTON MAS
    $('#masCarrito').click(function(){
        var libro = @json($book);
        var max = libro['stockFisico'];

        //se obtiene el numero del input y se hace la resta
        var number = document.getElementById("cantidadFisico").value;

        number++;

        //no se deja que la cantidad sea menor a 0
        if(number > max){
            number = max;
        }

        //no se deja que la cantidad sea menor a 0
        if(number < 1){
            number = 1;
        }

        document.getElementById("cantidadFisico").value = number;
    });

    //CANTIDAD, INPUT ENTER
    $("#cantidadFisico").keypress(function(event) {
        // Only ASCII charactar in that range allowed
        var ASCIICode = (event.which) ? event.which : event.keyCode
        if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57))
            return false;

        if (event.keyCode === 13) {
            var libro = @json($book);
            var max = libro['stockFisico'];

            //se obtiene el numero del input
            var number = document.getElementById("cantidadFisico").value;

            if(number > max){
                number = max;
            }
            else if(number < 1){
                number = 1;
            }

            document.getElementById("cantidadFisico").value = number;
        }
    });


    //CUANDO SE SELECCIONA EL FORMATO SE GUARDA EN LA COOKIE
    $("#botonFisico").click(function (e) {
        e.preventDefault();

        //SE OBTIENE LA CANTIDAD
        var cantidad = $("#cantidadFisico").val();

        var libro = @json($book);
        var max = libro['stockFisico'];

        if(cantidad > max)
            cantidad = max;

        //verificar que la cantidad sea numerica
        if(isNaN(cantidad)){
            return;
        }

        if(cantidad > 0){
            var x = window.matchMedia("(max-width: 991px)");
            $.ajax({
                url: '/agregar-a-carrito/'+seleccionado+'/'+cantidad+'/fisico',
                method: "get",
                success: function (response) {
                    if(carrito){
                        if(carrito[seleccionado]){
                            if(carrito[seleccionado]['cantidadFisico'] > 0){
                                if(carrito[seleccionado]['cantidadFisico'] != cantidad)
                                    showTooltip("Producto actualizado");
                                else
                                    showTooltip("Producto ya en el carrito");
                            }
                            else{
                                showTooltip("Producto agregado");
                            }
                            carrito[seleccionado]['cantidadFisico'] = cantidad;
                        }
                        else{
                            carrito[seleccionado] = {"cantidadFisico": cantidad, "cantidadDigital": 0};
                            showTooltip("Producto agregado");
                        }
                    }
                    else{
                        var jsonSt = '{"'+seleccionado+'": {"cantidadFisico": "'+cantidad+'","cantidadDigital": "0"}}';
                        carrito = JSON.parse(jsonSt);
                        showTooltip("Producto agregado");
                    }
                    carritoCant(x);

                    if(comraA)
                        window.location.replace('{{ route('carrito') }}');
                    return;
                }
            });
        }
    });

    $("#botonDigital").click(function (e) {
        e.preventDefault();

        var libro = @json($book);
        var cantidad = libro['stockDigital'];

        //verificar que la cantidad sea numerica
        if(isNaN(cantidad)){
            return;
        }

        if(cantidad > 0){
            var x = window.matchMedia("(max-width: 991px)");
            $.ajax({
                url: '/agregar-a-carrito/'+seleccionado+'/1/digital',
                method: "get",
                success: function (response) {
                    if(carrito){
                        if(carrito[seleccionado]){
                            if(carrito[seleccionado]['cantidadDigital'] > 0){
                                if(carrito[seleccionado]['cantidadDigital'] != cantidad)
                                    showTooltip("Producto actualizado");
                                else
                                    showTooltip("Producto ya en el carrito");
                            }
                            else{
                                showTooltip("Producto agregado");
                            }
                            carrito[seleccionado]['cantidadDigital'] = cantidad;
                        }
                        else{
                            carrito[seleccionado] = {"cantidadFisico": 0, "cantidadDigital": cantidad};
                            showTooltip("Producto agregado");
                        }
                    }
                    else{
                        var jsonSt = '{"'+seleccionado+'": {"cantidadFisico": "0","cantidadDigital": "'+cantidad+'"}}';
                        carrito = JSON.parse(jsonSt);
                        showTooltip("Producto agregado");
                    }
                    carritoCant(x);

                    if(comraA)
                        window.location.replace('{{ route('carrito') }}');

                    return;
                },
            });
        }
    });

    $("#agregarBolsaDigital").click(function (e) {
        e.preventDefault();

        var libro = @json($book);
        var cantidad = libro['stockDigital'];

        //verificar que la cantidad sea numerica
        if(isNaN(cantidad)){
            return;
        }

        if(cantidad > 0){
            var x = window.matchMedia("(max-width: 991px)");
            $.ajax({
                url: '/agregar-a-carrito/'+seleccionado+'/1/digital',
                method: "get",
                success: function (response) {
                    if(carrito){
                        if(carrito[seleccionado]){
                            if(carrito[seleccionado]['cantidadDigital'] > 0){
                                if(carrito[seleccionado]['cantidadDigital'] != cantidad)
                                    showTooltip("Producto actualizado");
                                else
                                    showTooltip("Producto ya en el carrito");
                            }
                            else{
                                showTooltip("Producto agregado");
                            }
                            carrito[seleccionado]['cantidadDigital'] = cantidad;
                        }
                        else{
                            carrito[seleccionado] = {"cantidadFisico": 0, "cantidadDigital": cantidad};
                            showTooltip("Producto agregado");
                        }
                    }
                    else{
                        var jsonSt = '{"'+seleccionado+'": {"cantidadFisico": "0","cantidadDigital": "'+cantidad+'"}}';
                        carrito = JSON.parse(jsonSt);
                        showTooltip("Producto agregado");
                    }
                    carritoCant(x);

                    if(comraA)
                        window.location.replace('{{ route('carrito') }}');

                    return;
                },
            });
        }
    });

    $("#agregarBolsaFisico").click(function (e) {
        e.preventDefault();

        var cantidad;
        //SE OBTIENE LA CANTIDAD
        if(carrito && carrito[seleccionado]  && parseInt(carrito[seleccionado]['cantidadFisico']) > 0){
            cantidad = parseInt(carrito[seleccionado]['cantidadFisico']) * 1 + 1;
        }
        else
            cantidad = 1;



        var libro = @json($book);
        var max = libro['stockFisico'];

        if(cantidad > max)
            cantidad = max;

        //verificar que la cantidad sea numerica
        if(isNaN(cantidad)){
            return;
        }

        if(cantidad > 0){
            var x = window.matchMedia("(max-width: 991px)");
            $.ajax({
                url: '/agregar-a-carrito/'+seleccionado+'/'+cantidad+'/fisico',
                method: "get",
                success: function (response) {
                    if(carrito){
                        if(carrito[seleccionado]){
                            if(carrito[seleccionado]['cantidadFisico'] > 0){
                                showTooltip("Producto actualizado");
                                carrito[seleccionado]['cantidadFisico'] = cantidad;
                            }
                            else{
                                showTooltip("Producto agregado");
                                carrito[seleccionado]['cantidadFisico'] = cantidad;
                            }
                        }
                        else{
                            carrito[seleccionado] = {"cantidadFisico": cantidad, "cantidadDigital": 0};
                            showTooltip("Producto agregado");
                        }
                    }
                    else{
                        var jsonSt = '{"'+seleccionado+'": {"cantidadFisico": "'+cantidad+'","cantidadDigital": "0"}}';
                        carrito = JSON.parse(jsonSt);
                        showTooltip("Producto agregado");
                    }
                    carritoCant(x);

                    if(comraA)
                        window.location.replace('{{ route('carrito') }}');
                    return;
                }
            });
        }
    });

    $("#agregarBolsaFisicoMobile").click(function (e) {
        e.preventDefault();

        var cantidad;
        //SE OBTIENE LA CANTIDAD
        if(carrito && carrito[seleccionado]  && parseInt(carrito[seleccionado]['cantidadFisico']) > 0){
            cantidad = parseInt(carrito[seleccionado]['cantidadFisico']) * 1 + 1;
        }
        else
            cantidad = 1;



        var libro = @json($book);
        var max = libro['stockFisico'];

        if(cantidad > max)
            cantidad = max;

        //verificar que la cantidad sea numerica
        if(isNaN(cantidad)){
            return;
        }

        if(cantidad > 0){
            var x = window.matchMedia("(max-width: 991px)");
            $.ajax({
                url: '/agregar-a-carrito/'+seleccionado+'/'+cantidad+'/fisico',
                method: "get",
                success: function (response) {
                    if(carrito){
                        if(carrito[seleccionado]){
                            if(carrito[seleccionado]['cantidadFisico'] > 0){
                                showTooltip("Producto actualizado");
                                carrito[seleccionado]['cantidadFisico'] = cantidad;
                            }
                            else{
                                showTooltip("Producto agregado");
                                carrito[seleccionado]['cantidadFisico'] = cantidad;
                            }
                        }
                        else{
                            carrito[seleccionado] = {"cantidadFisico": cantidad, "cantidadDigital": 0};
                            showTooltip("Producto agregado");
                        }
                    }
                    else{
                        var jsonSt = '{"'+seleccionado+'": {"cantidadFisico": "'+cantidad+'","cantidadDigital": "0"}}';
                        carrito = JSON.parse(jsonSt);
                        showTooltip("Producto agregado");
                    }
                    carritoCant(x);

                    if(comraA)
                        window.location.replace('{{ route('carrito') }}');
                    return;
                }
            });
        }
    });

    function carritoCant(x1) {
        $(".cargar-info").load(" .cargar-info");
        $(".cargar-info2").load(" .cargar-info2");
        if (x1.matches) { // If media query matches
            $(".contador-carrito-value2").load(" .contador-carrito-value2");
        } else {
            $(".contador-carrito-value").load(" .contador-carrito-value");
        }
    }

    var x1 = window.matchMedia("(max-width: 991px)");
    carritoCant(x1); // Call listener function at run time
    x1.addListener(carritoCant); // Attach listener function on state changes

    function showTooltip(mensaje)
    {
        var tooltipC = document.getElementById('tooltip-carrito');
        var tooltipC2 = document.getElementById('tooltip-carrito2');

        //verifica que no exista ya los tooltips
        if(tooltipC && tooltipC2)
        {
            //si existen se elimina la animacion y los elementos
            clearTimeout(animacion);
            clearTimeout(animacion2);
            $("#tooltip-carrito").fadeOut().remove();
            $("#tooltip-carrito2").fadeOut().remove();
        }

        var tooltip = $("<div id='tooltip-carrito2' class='tooltip-carrito'>"+mensaje+"</div>");
        var tooltip2 = $("<div id='tooltip-carrito' class='tooltip-carrito'>"+mensaje+"</div>");
        tooltip.appendTo($(".menu-carrito"));
        tooltip2.appendTo($(".carritoli"));

        tooltipC = document.getElementById('tooltip-carrito');
        tooltipC2 = document.getElementById('tooltip-carrito2');
        var height = tooltipC.clientHeight;
        var width = tooltipC.clientWidth;

        //hint.style.opacity = '1';
        tooltipC.style.top = "45px";
        tooltipC2.style.top = "60px";

        animacion = setTimeout(hideTooltip, 2000);
    }

    function hideTooltip()
    {
        var tooltipC = document.getElementById('tooltip-carrito');
        var tooltipC2 = document.getElementById('tooltip-carrito2');
        var height = tooltipC.clientHeight;
        var width = tooltipC.clientWidth;

        //hint.style.opacity = '1';
        tooltipC.style.top = "-80px";
        tooltipC2.style.top = "-80px";
        animacion2 = setTimeout(function () {
            $("#tooltip-carrito").fadeOut().remove();
            $("#tooltip-carrito2").fadeOut().remove();
        }, 500);
    }
</script>

<script>
    //current position
var pos = 0;
//number of slides
var totalSlides = $('#slider-wrap ul li').length;
//get the slide width
var sliderWidth = $('#slider-wrap').width();


$(document).ready(function(){


	/*****************
	 BUILD THE SLIDER
	*****************/
	//set width to be 'x' times the number of slides
	$('#slider-wrap ul#slider').width(sliderWidth*totalSlides);

    //next slide
	$('#next').click(function(){
		slideRight();
	});

	//previous slide
	$('#previous').click(function(){
		slideLeft();
	});



	/*************************
	 //*> OPTIONAL SETTINGS
	************************/
	//automatic slider
	var autoSlider = setInterval(slideRight, 3000);

	//for each slide
	$.each($('#slider-wrap ul li'), function() {
	   //set its color
	   var c = $(this).attr("data-color");
	   $(this).css("background",c);

	   //create a pagination
	   var li = document.createElement('li');
	   $('#pagination-wrap ul').append(li);
	});

	//counter
	countSlides();

	//pagination
	pagination();

	//hide/show controls/btns when hover
	//pause automatic slide when hover
	$('#slider-wrap').hover(
	  function(){ $(this).addClass('active'); clearInterval(autoSlider); },
	  function(){ $(this).removeClass('active'); autoSlider = setInterval(slideRight, 10000); }
	);



});//DOCUMENT READY



/***********
 SLIDE LEFT
************/
function slideLeft(){
	pos--;
	if(pos==-1){ pos = totalSlides-1; }
    setIndex(pos)
	$('#slider-wrap ul#slider').css('left', -(sliderWidth*pos));

	//*> optional
	countSlides();
	pagination();
}


/************
 SLIDE RIGHT
*************/
function slideRight(){
	pos++;
	if(pos==totalSlides){ pos = 0; }
    setIndex(pos)
	$('#slider-wrap ul#slider').css('left', -(sliderWidth*pos));

	//*> optional
	countSlides();
	pagination();
}




/************************
 //*> OPTIONAL SETTINGS
************************/
function countSlides(){
	$('#counter').html(pos+1 + ' / ' + totalSlides);
}

function pagination(){
	$('#pagination-wrap ul li').removeClass('active');
	$('#pagination-wrap ul li:eq('+pos+')').addClass('active');
}


</script>

{{-- <script>
    const shareButton = document.querySelector('.share-button');

    shareButton.addEventListener('click', event => {
    var isMobile = false; //initiate as false
    // device detection
    if(/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|ipad|iris|kindle|Android|Silk|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i.test(navigator.userAgent) 
        || /1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(navigator.userAgent.substr(0,4))) { 
        isMobile = true;
    }
    if (isMobile && navigator.share) {
        navigator.share({
            title: 'Booke | Libro' ,
            url: window.url
            }).then(() => {
            console.log('Gracias por compartir!');
            })
            .catch(console.error);
        }
    });
</script> --}}

<script>
    postShareButtonClick = $(function (){
    var buttonWrapper = $(".share-button"),
        button = $(".share-button > a"),
        icons = $(".share-button > .icon-wrapper"),
        close = $(".close-social-icons");
    
    function init(){
        button.on("click", toggle);
        close.on("click", closeIcons);
    }
    
    function toggle(e){
        if (buttonWrapper.hasClass("active")){
            closeIcons();
        } else{
            openIcons();
        }
        e.preventDefault();
    }
    
    function openIcons(){
        buttonWrapper.addClass("active");
        button.addClass("hidden");
        buttonWrapper.animate({width: "286"}, 500);
        icons.animate({left: "0"}, 500);
    }
    
    function closeIcons(){
        buttonWrapper.removeClass("active");
		button.removeClass("hidden");
        icons.animate({left: "-286"}, 0);
        buttonWrapper.animate({width: "178"}, 0);
    }

    $('.copy_text').click(function (e) {
        e.preventDefault();
        var copyText = $(this).attr('href');

        document.addEventListener('copy', function(e) {
            e.clipboardData.setData('text/plain', copyText);
            e.preventDefault();
        }, true);

        document.execCommand('copy');  
    });
    
    init();
});
</script>

<script>
    (function($){
  
  /**
   * jQuery function to prevent default anchor event and take the href * and the title to make a share popup
   *
   * @param  {[object]} e           [Mouse event]
   * @param  {[integer]} intWidth   [Popup width defalut 500]
   * @param  {[integer]} intHeight  [Popup height defalut 400]
   * @param  {[boolean]} blnResize  [Is popup resizeabel default true]
   */
  $.fn.customerPopup = function (e, intWidth, intHeight, blnResize) {
    
    // Prevent default anchor event
    e.preventDefault();
    
    // Set values for window
    intWidth = intWidth || '500';
    intHeight = intHeight || '400';
    strResize = (blnResize ? 'yes' : 'no');

    // Set title and open popup with focus on it
    var strTitle = ((typeof this.attr('title') !== 'undefined') ? this.attr('title') : 'Social Share'),
        strParam = 'width=' + intWidth + ',height=' + intHeight + ',resizable=' + strResize,            
        objWindow = window.open(this.attr('href'), strTitle, strParam).focus();
  }
  
  /* ================================================== */
  
  $(document).ready(function ($) {
    $('.customer.share').on("click", function(e) {
      $(this).customerPopup(e);
    });
  });
    
}(jQuery));
</script>

@endsection
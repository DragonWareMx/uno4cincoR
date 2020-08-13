@extends('layouts.layoutPubli')

@section('header')
<title>Inicio | Editorial uno4cinco</title>
<!--hoja de estilos-->
<link rel="stylesheet" href="{{ asset('assets/css/index.css') }}" type="text/css">
<!--BOOTSTRAP-->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="assetsTimer/fonts/fontawesome/font-awesome.min.css">

		<!-- Vendors-->
		<link rel="stylesheet" type="text/css" href="assetsTimer/vendors/bootstrap/grid.css">
		<link rel="stylesheet" type="text/css" href="assetsTimer/vendors/YTPlayer/css/jquery.mb.YTPlayer.min.css">
		<link rel="stylesheet" type="text/css" href="assetsTimer/vendors/vegas/vegas.min.css">
        <!-- App & fonts-->
        <link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Karla&display=swap" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Work+Sans:300,400,500,700">
		<link rel="stylesheet" type="text/css" id="app-stylesheet" href="assetsTimer/css/main.css"><!--[if lt IE 9]-->
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
@endsection

@section('content')
<!-- ***** Welcome Area Start ***** -->
<div class="page-wrap" id="root">
    <!-- Content-->
    <!-- hero -->
    <div class="" style="background-color: #83D7B5; width:100%;"> 
        <div class="container">
            <div class="hero__wrapper">
                    <div class="row" style="">
                        <div class="col-lg-10 col-xs-offset-0 col-sm-offset-0 col-md-offset-0 col-lg-offset-1 "  >
                            <div class="hero__title_inner" ><img src="{{ asset('img/logos/logo.png') }}" alt="" srcset="">
                                <br>
                                <br>
                                <h4 id="viledruid" class="hero__text" style="color: #1D2120; font-family:Karla;">para todas, arte.</h4>
                                <br>
                                <div class="mesita_escondida" style=""> <img src="{{ asset('img/logos/escritorio.png') }}" style="width:100%"></div> 
                                <h4 id="viledruid" class="hero__text" style="color:white; font-family:Karla">Pronto estaremos contigo</h4>
                                <div id="clocki" class="countdown__module hide" data-date="2020/8/13" style="">
                                    <p><span>%D</span> Días</p>
                                    <p><span>%H</span> Horas</p>
                                    <p><span>%M</span> Minutos</p>
                                </div><!-- End / countdown__module hide undefined -->         
                            </div>
                              
                        </div>
                    </div>

            </div>
        </div>
        <div class="mesita" style=""> <img src="{{ asset('img/logos/escritorio.png') }}" style="width:100%"></div> 
    </div><!-- End / hero -->
    
    <!--comienza div de banners y sliders-->
    <div id="div_contenido" class="md-content" style="">
        <div class="title_index" style="">
            <h2 class="text_title" style="">LIBROS</h2>
        </div>
        
        <!--slider LIBROS-->
        <div id="carruselLibros" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                @php
                    $i=0; 
                @endphp
                @foreach ($bannerLibros as $banner)
                    @if ($i==0)
                        <div class="carousel-item active" >
                            <a href="{{ route('libro', ['id' => $banner->book->id])}}"><div class="img_carrusel" style="background: url('{{asset('storage/banners/'.$banner->imagenPC)}}');
                                background-size: 100% 100%;
                                -moz-background-size: 100% 100%;
                                -o-background-size: 100% 100%;
                                -webkit-background-size: 100% 100%;">
                            </div>
                            </a>
                            <!--div pestaña detalles libro-->
                            <div class="details_libro" style="overflow:scroll">
                                <img id="portada_libro" src="{{asset('storage/libros/'.$banner->book->bannerImagen)}}" alt="" srcset="" style="width:140px; height:138px; margin-left:10px; margin-right:10px">
                                <div id="details_content1" class="details_content" style="">
                                    <p id="titulo_txt" class="details_txt" style="">Título: 
                                        <span class="details_data" style="" name="details_title_libro">{{$banner->book->titulo}}</span>
                                    </p> 
                                    <p id="autor_txt" class="details_txt" style="">Autor:
                                    <span class="details_data" style="" name="details_autor_libro">{{$banner->book->authors[0]->nombre}}</span>
                                    </p>
                                    <p id="sello_txt" class="details_txt" style="">Sello:
                                    <span class="details_data" style="" name="details_sello_libro">{{$banner->book->sello->nombre}}</span>
                                    </p>  
                                </div>
                                <div id="details_content2" class="details_content" style="">
                                    <p id="genero_txt" class="details_txt" >Género:
                                    <span class="details_data" style="" name="details_genero_libro">{{$banner->book->genres[0]->nombre}}</span>
                                    </p>
                                    <p id="tipo_txt" class="details_txt">Tipo:
                                        <span class="details_data" style="" name="details_tipo_libro">
                                            @if ($banner->book->stockFisico>0)
                                                Físico/Digital
                                            @else
                                                Digital
                                            @endif
                                        </span>
                                    </p>
                                    <p id="precio_txt" class="details_txt">Precio:
                                        <span class="details_data" style="" name="details_precio_libro">
                                            @if ($banner->book->stockFisico>0)
                                                @if($banner->book->descuentoFisico>0 && $banner->book->descuentoDigital>0)
                                                    ${{$banner->book->precioFisico}} Descuento: %{{$banner->book->descuentoFisico}} / ${{$banner->book->precioDigital}} Descuento:  %{{$banner->book->descuentoDigital}}
                                                @endif
                                                @if($banner->book->descuentoFisico>0 && $banner->book->descuentoDigital==0)
                                                    ${{$banner->book->precioFisico}} Descuento: %{{$banner->book->descuentoFisico}} / ${{$banner->book->precioDigital}}
                                                @endif
                                                @if($banner->book->descuentoFisico>=0 && $banner->book->descuentoDigital>0)
                                                    ${{$banner->book->precioFisico}} / ${{$banner->book->precioDigital}}  Descuento: %{{$banner->book->descuentoDigital}}
                                                @endif
                                                @if($banner->book->descuentoFisico==0 && $banner->book->descuentoDigital==0)
                                                    ${{$banner->book->precioFisico}} / ${{$banner->book->precioDigital}}
                                                @endif
                                            @else
                                                @if($banner->book->descuentoDigital>0)
                                                   ${{$banner->book->precioDigital}} Descuento:  %{{$banner->book->descuentoDigital}}
                                                @endif
                                                @if($banner->book->descuentoDigital==0)
                                                   ${{$banner->book->precioDigital}}
                                                @endif
                                            @endif
                                        </span>
                                    </p>
                                </div>
                                <div class="btn_details" >
                                    <a href="{{ route('libro', ['id' => $banner->book->id])}}"><p class="btn_txt" style="">Comprar</p></a>
                                </div>
                            </div> 
                            <!--pestaña click-->
                            <div class="pestana_details" style= "display:flex; justify-content:center" name="details_libro">
                                <img src="{{ asset('img/ico/menu.png') }}" style="width:30%;">
                                <p class="pestana_txt" style="text-align: center; font-family: Abril Fatface; color:white">
                                </p>    
                            </div>
                        </div>
                    @else
                        <div class="carousel-item " >
                            <a href="{{ route('libro', ['id' => $banner->book->id])}}">
                            <div class="img_carrusel" style="background: url('{{asset('storage/banners/'.$banner->imagenPC)}}');
                                background-size: 100% 100%;
                                -moz-background-size: 100% 100%;
                                -o-background-size: 100% 100%;
                                -webkit-background-size: 100% 100%;">
                            </div>
                            </a>
                            <!--div pestaña detalles libro-->
                            <div class="details_libro" style="overflow:scroll">
                                <img id="portada_libro" src="{{asset('storage/libros/'.$banner->book->bannerImagen)}}" alt="" srcset="" style="width:140px; height:138px; margin-left:10px; margin-right:10px">
                                <div id="details_content1" class="details_content" style="">
                                    <p id="titulo_txt" class="details_txt" style="">Título: 
                                        <span class="details_data" style="" name="details_title_libro">{{$banner->book->titulo}}</span>
                                    </p> 
                                    <p id="autor_txt" class="details_txt" style="">Autor:
                                    <span class="details_data" style="" name="details_autor_libro">{{$banner->book->authors[0]->nombre}}</span>
                                    </p>
                                    <p id="sello_txt" class="details_txt" style="">Sello:
                                    <span class="details_data" style="" name="details_sello_libro">{{$banner->book->sello->nombre}}</span>
                                    </p>  
                                </div>
                                <div id="details_content2" class="details_content" style="">
                                    <p id="genero_txt" class="details_txt" >Género:
                                    <span class="details_data" style="" name="details_genero_libro">{{$banner->book->genres[0]->nombre}}</span>
                                    </p>
                                    <p id="tipo_txt" class="details_txt">Tipo:
                                        <span class="details_data" style="" name="details_tipo_libro">
                                            @if ($banner->book->stockFisico>0)
                                                Físico/Digital
                                            @else
                                                Digital
                                            @endif
                                        </span>
                                    </p>
                                    <p id="precio_txt" class="details_txt">Precio:
                                        <span class="details_data" style="" name="details_precio_libro">
                                            @if ($banner->book->stockFisico>0)
                                                @if($banner->book->descuentoFisico>0 && $banner->book->descuentoDigital>0)
                                                    ${{$banner->book->precioFisico}} Descuento: %{{$banner->book->descuentoFisico}} / ${{$banner->book->precioDigital}} Descuento:  %{{$banner->book->descuentoDigital}}
                                                @endif
                                                @if($banner->book->descuentoFisico>0 && $banner->book->descuentoDigital==0)
                                                    ${{$banner->book->precioFisico}} Descuento: %{{$banner->book->descuentoFisico}} / ${{$banner->book->precioDigital}}
                                                @endif
                                                @if($banner->book->descuentoFisico>=0 && $banner->book->descuentoDigital>0)
                                                    ${{$banner->book->precioFisico}} / ${{$banner->book->precioDigital}}  Descuento: %{{$banner->book->descuentoDigital}}
                                                @endif
                                                @if($banner->book->descuentoFisico==0 && $banner->book->descuentoDigital==0)
                                                    ${{$banner->book->precioFisico}} / ${{$banner->book->precioDigital}}
                                                @endif
                                            @else
                                                @if($banner->book->descuentoDigital>0)
                                                   ${{$banner->book->precioDigital}} Descuento:  %{{$banner->book->descuentoDigital}}
                                                @endif
                                                @if($banner->book->descuentoDigital==0)
                                                   ${{$banner->book->precioDigital}}
                                                @endif
                                            @endif
                                        </span>
                                    </p>
                                </div>
                                <div class="btn_details" >
                                    <a href="{{ route('libro', ['id' => $banner->book->id])}}"><p class="btn_txt" style="">Comprar</p></a>
                                </div>
                            </div> 
                            <!--pestaña click-->
                            <div class="pestana_details" style= "display:flex; justify-content:center" name="details_libro">
                                <img src="{{ asset('img/ico/menu.png') }}" style="width:30%;">
                                <p class="pestana_txt" style="text-align: center; font-family: Abril Fatface; color:white">
                                </p>    
                            </div>
                        </div>  
                    @endif
                    @php
                        $i++;
                    @endphp
                @endforeach
                <a class="carousel-control-prev flechasPosicion" data-target="#carruselLibros" data-slide="prev" style="cursor: pointer; cursor:hand;">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next flechasPosicion" data-target="#carruselLibros" data-slide="next" style="cursor: pointer; cursor:hand;">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
        {{-- Fin slider libros --}}

        {{--INICIA SLIDER ESCONDIDO LIBROS--}}
        <div id="carruselLibrosHide" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                @php
                    $i=0; 
                @endphp
                @foreach ($bannerLibros as $banner)
                    @if ($i==0)
                        <div class="carousel-item active" >
                            <a href="{{ route('libro', ['id' => $banner->book->id])}}">
                            <div class="img_carrusel" style="background: url('{{asset('storage/banners/'.$banner->imagenCell)}}');
                                background-size: 100% 100%;
                                -moz-background-size: 100% 100%;
                                -o-background-size: 100% 100%;
                                -webkit-background-size: 100% 100%;">
                            </div>
                            </a>
                            <!--div pestaña detalles libro-->
                            <div class="details_libro" style="overflow:scroll">
                                <img id="portada_libro" src="{{asset('storage/libros/'.$banner->book->bannerImagen)}}" alt="" srcset="" style="width:140px; height:138px; margin-left:10px; margin-right:10px">
                                <div id="details_content1" class="details_content" style="">
                                    <p id="titulo_txt" class="details_txt" style="">Título: 
                                        <span class="details_data" style="" name="details_title_libro">{{$banner->book->titulo}}</span>
                                    </p> 
                                    <p id="autor_txt" class="details_txt" style="">Autor:
                                    <span class="details_data" style="" name="details_autor_libro">{{$banner->book->authors[0]->nombre}}</span>
                                    </p>
                                    <p id="sello_txt" class="details_txt" style="">Sello:
                                    <span class="details_data" style="" name="details_sello_libro">{{$banner->book->sello->nombre}}</span>
                                    </p>  
                                </div>
                                <div id="details_content2" class="details_content" style="">
                                    <p id="genero_txt" class="details_txt" >Género:
                                    <span class="details_data" style="" name="details_genero_libro">{{$banner->book->genres[0]->nombre}}</span>
                                    </p>
                                    <p id="tipo_txt" class="details_txt">Tipo:
                                        <span class="details_data" style="" name="details_tipo_libro">
                                            @if ($banner->book->stockFisico>0)
                                                Físico/Digital
                                            @else
                                                Digital
                                            @endif
                                        </span>
                                    </p>
                                    <p id="precio_txt" class="details_txt">Precio:
                                        <span class="details_data" style="" name="details_precio_libro">
                                            @if ($banner->book->stockFisico>0)
                                                @if($banner->book->descuentoFisico>0 && $banner->book->descuentoDigital>0)
                                                    ${{$banner->book->precioFisico}} Descuento: %{{$banner->book->descuentoFisico}} / ${{$banner->book->precioDigital}} Descuento:  %{{$banner->book->descuentoDigital}}
                                                @endif
                                                @if($banner->book->descuentoFisico>0 && $banner->book->descuentoDigital==0)
                                                    ${{$banner->book->precioFisico}} Descuento: %{{$banner->book->descuentoFisico}} / ${{$banner->book->precioDigital}}
                                                @endif
                                                @if($banner->book->descuentoFisico>=0 && $banner->book->descuentoDigital>0)
                                                    ${{$banner->book->precioFisico}} / ${{$banner->book->precioDigital}}  Descuento: %{{$banner->book->descuentoDigital}}
                                                @endif
                                                @if($banner->book->descuentoFisico==0 && $banner->book->descuentoDigital==0)
                                                    ${{$banner->book->precioFisico}} / ${{$banner->book->precioDigital}}
                                                @endif
                                            @else
                                                @if($banner->book->descuentoDigital>0)
                                                   ${{$banner->book->precioDigital}} Descuento:  %{{$banner->book->descuentoDigital}}
                                                @endif
                                                @if($banner->book->descuentoDigital==0)
                                                   ${{$banner->book->precioDigital}}
                                                @endif
                                            @endif
                                        </span>
                                    </p>
                                </div>
                                <div class="btn_details" >
                                    <a href="{{ route('libro', ['id' => $banner->book->id])}}"><p class="btn_txt" style="">Comprar</p></a>
                                </div>
                            </div> 
                            <!--pestaña click-->
                            <div class="pestana_details" style= "display:flex; justify-content:center" name="details_libro">
                                <img src="{{ asset('img/ico/menu.png') }}" style="width:30%;">
                                <p class="pestana_txt" style="text-align: center; font-family: Abril Fatface; color:white">
                                </p>    
                            </div>
                        </div>
                    @else
                        <div class="carousel-item " >
                            <a href="{{ route('libro', ['id' => $banner->book->id])}}">
                            <div class="img_carrusel" style="background: url('{{asset('storage/banners/'.$banner->imagenCell)}}');
                                background-size: 100% 100%;
                                -moz-background-size: 100% 100%;
                                -o-background-size: 100% 100%;
                                -webkit-background-size: 100% 100%;">
                            </div>
                            </a>
                            <!--div pestaña detalles libro-->
                            <div class="details_libro" style="overflow:scroll">
                                <img id="portada_libro" src="{{asset('storage/libros/'.$banner->book->bannerImagen)}}" alt="" srcset="" style="width:140px; height:138px; margin-left:10px; margin-right:10px">
                                <div id="details_content1" class="details_content" style="">
                                    <p id="titulo_txt" class="details_txt" style="">Título: 
                                        <span class="details_data" style="" name="details_title_libro">{{$banner->book->titulo}}</span>
                                    </p> 
                                    <p id="autor_txt" class="details_txt" style="">Autor:
                                    <span class="details_data" style="" name="details_autor_libro">{{$banner->book->authors[0]->nombre}}</span>
                                    </p>
                                    <p id="sello_txt" class="details_txt" style="">Sello:
                                    <span class="details_data" style="" name="details_sello_libro">{{$banner->book->sello->nombre}}</span>
                                    </p>  
                                </div>
                                <div id="details_content2" class="details_content" style="">
                                    <p id="genero_txt" class="details_txt" >Género:
                                    <span class="details_data" style="" name="details_genero_libro">{{$banner->book->genres[0]->nombre}}</span>
                                    </p>
                                    <p id="tipo_txt" class="details_txt">Tipo:
                                        <span class="details_data" style="" name="details_tipo_libro">
                                            @if ($banner->book->stockFisico>0)
                                                Físico/Digital
                                            @else
                                                Digital
                                            @endif
                                        </span>
                                    </p>
                                    <p id="precio_txt" class="details_txt">Precio:
                                        <span class="details_data" style="" name="details_precio_libro">
                                            @if ($banner->book->stockFisico>0)
                                                @if($banner->book->descuentoFisico>0 && $banner->book->descuentoDigital>0)
                                                    ${{$banner->book->precioFisico}} Descuento: %{{$banner->book->descuentoFisico}} / ${{$banner->book->precioDigital}} Descuento:  %{{$banner->book->descuentoDigital}}
                                                @endif
                                                @if($banner->book->descuentoFisico>0 && $banner->book->descuentoDigital==0)
                                                    ${{$banner->book->precioFisico}} Descuento: %{{$banner->book->descuentoFisico}} / ${{$banner->book->precioDigital}}
                                                @endif
                                                @if($banner->book->descuentoFisico>=0 && $banner->book->descuentoDigital>0)
                                                    ${{$banner->book->precioFisico}} / ${{$banner->book->precioDigital}}  Descuento: %{{$banner->book->descuentoDigital}}
                                                @endif
                                                @if($banner->book->descuentoFisico==0 && $banner->book->descuentoDigital==0)
                                                    ${{$banner->book->precioFisico}} / ${{$banner->book->precioDigital}}
                                                @endif
                                            @else
                                                @if($banner->book->descuentoDigital>0)
                                                   ${{$banner->book->precioDigital}} Descuento:  %{{$banner->book->descuentoDigital}}
                                                @endif
                                                @if($banner->book->descuentoDigital==0)
                                                   ${{$banner->book->precioDigital}}
                                                @endif
                                            @endif
                                        </span>
                                    </p>
                                </div>
                                <div class="btn_details" >
                                    <a href="{{ route('libro', ['id' => $banner->book->id])}}"><p class="btn_txt" style="">Comprar</p></a>
                                </div>
                            </div> 
                            <!--pestaña click-->
                            <div class="pestana_details" style= "display:flex; justify-content:center" name="details_libro">
                                <img src="{{ asset('img/ico/menu.png') }}" style="width:30%;">
                                <p class="pestana_txt" style="text-align: center; font-family: Abril Fatface; color:white">
                                </p>    
                            </div>
                        </div>  
                    @endif
                    @php
                        $i++;
                    @endphp
                @endforeach
                <a class="carousel-control-prev flechasPosicion" data-target="#carruselLibrosHide" data-slide="prev" style="cursor: pointer; cursor:hand;">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next flechasPosicion" data-target="#carruselLibrosHide" data-slide="next" style="cursor: pointer; cursor:hand;">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
        {{-- Fin slider ESCONDIDO libros --}}


        <div class="title_index" style="">
            <h2 class="text_title" style="">AUTORES</h2>
        </div>
        <!--SLIDER AUTORES-->
        <div id="carruselAutores" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                @php
                    $i=0; 
                @endphp
                @foreach ($bannerAutores as $banner)
                    @if ($i==0)
                        <div class="carousel-item active" >
                            <a href="{{ route('autor', ['id' => $banner->author->id])}}">
                            <div class="img_carrusel" style="background: url('{{asset('storage/banners/'.$banner->imagenPC)}}');
                                background-size: 100% 100%;
                                -moz-background-size: 100% 100%;
                                -o-background-size: 100% 100%;
                                -webkit-background-size: 100% 100%;">
                            </div>
                            </a>
                            <!--div pestaña detalles autor-->
                            <div class="details_autor" style="overflow-x:scroll">
                                @php
                                    $i=0;   
                                @endphp
                                @foreach ($banner->author->books as $book)
                                    <div class="detailsAutor_content" style="overflow-y:scroll">
                                        <img id="portada_libro_autor" class="img_libro_aut" src="{{ asset('storage/libros/'.$book->bannerImagen) }}" alt="" srcset="" style="">
                                        <div id="details_content3" class=detailsAutor_txt>
                                            <p class="details_txt" >Título:
                                                <span class="details_data" style="" name="details_title_autor">{{$book->titulo}}</span>
                                            </p>
                                            <p class="details_txt" >Género:
                                                <span class="details_data" style="" name="details_genre_autor">{{$book->genres[0]->nombre}}</span>
                                            </p>
                                            <p class="details_txt" >Tipo:
                                                <span class="details_data" style="" name="details_precio_autor">
                                                    @if ($book->stockFisico>0)
                                                        Físico/Digital
                                                    @else
                                                        Digital
                                                    @endif                                                    
                                                </span>
                                            </p>
                                            
                                        </div>
                                        <div class="btn_details_autor" >
                                            <a href="{{ route('libro', ['id' => $book->id])}}"><p class="btn_txt2" style="">Comprar</p></a>
                                        </div> 
                                    </div>
                                    @if($i==2)
                                        @break;
                                    @endif
                                    @php
                                        $i++;   
                                    @endphp                                    
                                @endforeach
                            </div> 
                            <!--pestaña click-->
                            <div class="pestana_details_autor" style= "display:flex; justify-content:center" name="details_autor">
                                <img src="{{ asset('img/ico/menu.png') }}" style="width:30%;">
                           </div>
                        </div>
                    @else
                        <div class="carousel-item" >
                            <a href="{{ route('autor', ['id' => $banner->author->id])}}">
                            <div class="img_carrusel" style="background: url('{{asset('storage/banners/'.$banner->imagenPC)}}');
                                background-size: 100% 100%;
                                -moz-background-size: 100% 100%;
                                -o-background-size: 100% 100%;
                                -webkit-background-size: 100% 100%;">
                            </div>
                            </a>
                            <!--div pestaña detalles autor-->
                            <div class="details_autor" style="overflow-x:scroll">
                                @php
                                    $i=0;   
                                @endphp
                                @foreach ($banner->author->books as $book)
                                    <div class="detailsAutor_content" style="overflow-y:scroll">
                                        <img id="portada_libro_autor" class="img_libro_aut" src="{{ asset('storage/libros/'.$book->bannerImagen) }}" alt="" srcset="" style="">
                                        <div id="details_content3" class=detailsAutor_txt>
                                            <p class="details_txt" >Título:
                                                <span class="details_data" style="" name="details_title_autor">{{$book->titulo}}</span>
                                            </p>
                                            <p class="details_txt" >Género:
                                                <span class="details_data" style="" name="details_genre_autor">{{$book->genres[0]->nombre}}</span>
                                            </p>
                                            <p class="details_txt" >Tipo:
                                                <span class="details_data" style="" name="details_precio_autor">
                                                    @if ($book->stockFisico>0)
                                                        Físico/Digital
                                                    @else
                                                        Digital
                                                    @endif                                                    
                                                </span>
                                            </p>
                                        </div>
                                        <div class="btn_details_autor" >
                                            <a href="{{ route('libro', ['id' => $book->id])}}"><p class="btn_txt2" style="">Comprar</p></a>
                                        </div> 
                                    </div>
                                    @if($i==2)
                                        @break;
                                    @endif
                                    @php
                                        $i++;   
                                    @endphp                                    
                                @endforeach
                            </div> 
                            <!--pestaña click-->
                            <div class="pestana_details_autor" style= "display:flex; justify-content:center" name="details_autor">
                                <img src="{{ asset('img/ico/menu.png') }}" style="width:30%;">
                            </div>
                        </div>      
                    @endif
                    @php
                        $i++;
                    @endphp
                @endforeach
                <a class="carousel-control-prev flechasPosicion" data-target="#carruselAutores" data-slide="prev" style="cursor: pointer; cursor:hand;">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next flechasPosicion" data-target="#carruselAutores" data-slide="next" style="cursor: pointer; cursor:hand;">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>

        {{--COMIENZA CARRUSEL ESCONDIDO DE AUTORES--}}
        
        <div id="carruselAutoresHide" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                @php
                    $i=0; 
                @endphp
                @foreach ($bannerAutores as $banner)
                    @if ($i==0)
                        <div class="carousel-item active" >
                            <a href="{{ route('autor', ['id' => $banner->author->id])}}">
                            <div class="img_carrusel" style="background: url('{{asset('storage/banners/'.$banner->imagenCell)}}');
                                background-size: 100% 100%;
                                -moz-background-size: 100% 100%;
                                -o-background-size: 100% 100%;
                                -webkit-background-size: 100% 100%;">
                            </div>
                            </a>
                            <!--div pestaña detalles autor-->
                            <div class="details_autor" style="overflow-x:scroll">
                                @php
                                    $i=0;   
                                @endphp
                                @foreach ($banner->author->books as $book)
                                    <div class="detailsAutor_content" style="overflow-y:scroll">
                                        <img id="portada_libro_autor" class="img_libro_aut" src="{{ asset('storage/libros/'.$book->bannerImagen) }}" alt="" srcset="" style="">
                                        <div id="details_content3" class=detailsAutor_txt>
                                            <p class="details_txt" >Título:
                                                <span class="details_data" style="" name="details_title_autor">{{$book->titulo}}</span>
                                            </p>
                                            <p class="details_txt" >Género:
                                                <span class="details_data" style="" name="details_genre_autor">{{$book->genres[0]->nombre}}</span>
                                            </p>
                                            <p class="details_txt" >Tipo:
                                                <span class="details_data" style="" name="details_precio_autor">
                                                    @if ($book->stockFisico>0)
                                                        Físico/Digital
                                                    @else
                                                        Digital
                                                    @endif                                                    
                                                </span>
                                            </p>
                                            
                                        </div>
                                        <div class="btn_details_autor" >
                                            <a href="{{ route('libro', ['id' => $book->id])}}"><p class="btn_txt2" style="">Comprar</p></a>
                                        </div> 
                                    </div>
                                    @if($i==2)
                                        @break;
                                    @endif
                                    @php
                                        $i++;   
                                    @endphp                                    
                                @endforeach
                            </div> 
                            <!--pestaña click-->
                            <div class="pestana_details_autor" style= "display:flex; justify-content:center" name="details_autor">
                                <img src="{{ asset('img/ico/menu.png') }}" style="width:30%;">
                           </div>
                        </div>
                    @else
                        <div class="carousel-item" >
                            <a href="{{ route('autor', ['id' => $banner->author->id])}}">
                            <div class="img_carrusel" style="background: url('{{asset('storage/banners/'.$banner->imagenCell)}}');
                                background-size: 100% 100%;
                                -moz-background-size: 100% 100%;
                                -o-background-size: 100% 100%;
                                -webkit-background-size: 100% 100%;">
                            </div>
                            </a>
                            <!--div pestaña detalles autor-->
                            <div class="details_autor" style="overflow-x:scroll">
                                @php
                                    $i=0;   
                                @endphp
                                @foreach ($banner->author->books as $book)
                                    <div class="detailsAutor_content" style="overflow-y:scroll">
                                        <img id="portada_libro_autor" class="img_libro_aut" src="{{ asset('storage/libros/'.$book->bannerImagen) }}" alt="" srcset="" style="">
                                        <div id="details_content3" class=detailsAutor_txt>
                                            <p class="details_txt" >Título:
                                                <span class="details_data" style="" name="details_title_autor">{{$book->titulo}}</span>
                                            </p>
                                            <p class="details_txt" >Género:
                                                <span class="details_data" style="" name="details_genre_autor">{{$book->genres[0]->nombre}}</span>
                                            </p>
                                            <p class="details_txt" >Tipo:
                                                <span class="details_data" style="" name="details_precio_autor">
                                                    @if ($book->stockFisico>0)
                                                        Físico/Digital
                                                    @else
                                                        Digital
                                                    @endif                                                    
                                                </span>
                                            </p>
                                        </div>
                                        <div class="btn_details_autor" >
                                            <a href="{{ route('libro', ['id' => $book->id])}}"><p class="btn_txt2" style="">Comprar</p></a>
                                        </div> 
                                    </div>
                                    @if($i==2)
                                        @break;
                                    @endif
                                    @php
                                        $i++;   
                                    @endphp                                    
                                @endforeach
                            </div> 
                            <!--pestaña click-->
                            <div class="pestana_details_autor" style= "display:flex; justify-content:center" name="details_autor">
                                <img src="{{ asset('img/ico/menu.png') }}" style="width:30%;">
                            </div>
                        </div>      
                    @endif
                    @php
                        $i++;
                    @endphp
                @endforeach
                <a class="carousel-control-prev flechasPosicion" data-target="#carruselAutoresHide" data-slide="prev" style="cursor: pointer; cursor:hand;">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next flechasPosicion" data-target="#carruselAutoresHide" data-slide="next" style="cursor: pointer; cursor:hand;">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
        {{--FIN de carrusel ESCONDIDO AUTORES--}}

        
        @if (sizeOf($bannerBlogs)!=0)
            <div class="title_index" style="">
                <h2 class="text_title" style="">BLOGS</h2>
            </div>

            {{-- Slider de Blogs --}}
            <div id="carruselBlogs" class="carousel slide" data-ride="carousel" style="margin-bottom: 30px">
                <div class="carousel-inner">
                    @php
                        $i=0; 
                    @endphp
                    @foreach ($bannerBlogs as $banner)
                        @if ($i==0)
                            <div class="carousel-item active" >
                                
                                <div class="img_carrusel banner_blogs" style="background: url('{{asset('storage/blogs/'.$banner->imagen)}}') center center no-repeat;
                                    background-size: cover;
                                    -moz-background-size: cover;
                                    -o-background-size: cover;
                                    -webkit-background-size: cover;">

                                    <div class="banner_blog_fecha">
                                        {{$banner->fecha}}
                                    </div>
                                    <div class="banner_blog_titulo">
                                        {{$banner->titulo}}
                                    </div>
                                    {{-- Este de abajo lo metí en dos divs para centrarlo, ya tengo sueño perdón :C --}}
                                    <div class="div_width_100">
                                        <div class="banner_blog_contenido">
                                            {{Str::limit($banner->contenido,350)}}
                                        </div>
                                    </div>
                                    <a href="{{ route('blog', ['id' => $banner->id])}}">
                                    <div class="div_width_100">
                                    
                                        <div class="banner_blog_boton">
                                            <div>Seguir leyendo &nbsp;<i class="fas fa-long-arrow-alt-right"></i></div>
                                        </div>
                                        
                                    </div>
                                    </a>
                                </div>
                                <!--div pestaña detalles blog-->
                                <div class="details_blog" style="overflow-x:scroll">
                                    @foreach ($banner->tags as $tag)
                                    <span class="details_tags" style="color:white;" name="details_title_blog">#{{$tag->nombre}}&nbsp;</span>
                                    @endforeach     
                                </div> 
                                <!--pestaña click-->
                                <div class="pestana_details_blog" style= "display:flex; justify-content:center" name="details_blog">
                                    <img src="{{ asset('img/ico/menu.png') }}" style="width:30%;">
                            </div>
                            </div>
                        @else
                            <div class="carousel-item" >
                                <div class="img_carrusel banner_blogs" style="background: url('{{asset('storage/banners/'.$banner->imagen)}}') center center no-repeat;
                                    background-size: cover;
                                    -moz-background-size: cover;
                                    -o-background-size: cover;
                                    -webkit-background-size: cover;">

                                    <div class="banner_blog_fecha">
                                        {{$banner->fecha}}
                                    </div>
                                    <div class="banner_blog_titulo">
                                        {{$banner->titulo}}
                                    </div>
                                    {{-- Este de abajo lo metí en dos divs para centrarlo, ya tengo sueño perdón :C --}}
                                    <div class="div_width_100">
                                        <div class="banner_blog_contenido">
                                            {{Str::limit($banner->contenido,350)}}
                                        </div>
                                    </div>
                                    <a href="{{ route('blog', ['id' => $banner->id])}}">
                                    <div class="div_width_100">
                                        <div class="banner_blog_boton">
                                            <div>Seguir leyendo &nbsp;<i class="fas fa-long-arrow-alt-right"></i></div>
                                        </div>
                                    </div>
                                    </a>
                                </div>
                                <!--div pestaña detalles blog-->
                                <div class="details_blog" style="overflow-x:scroll">
                                    @foreach ($banner->tags as $tag)
                                    <span class="details_tags" style="color:white;" name="details_title_blog">#{{$tag->nombre}}&nbsp;</span>
                                    @endforeach     
                                </div> 
                                <!--pestaña click-->
                                <div class="pestana_details_blog" style= "display:flex; justify-content:center" name="details_blog">
                                    <img src="{{ asset('img/ico/menu.png') }}" style="width:30%;">
                            </div>
                            </div>      
                        @endif
                        @php
                            $i++;
                        @endphp
                    @endforeach
                    <a class="carousel-control-prev flechasPosicion" data-target="#carruselBlogs" data-slide="prev" style="cursor: pointer; cursor:hand;">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next flechasPosicion" data-target="#carruselBlogs" data-slide="next" style="cursor: pointer; cursor:hand;">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>  
        @endif

    </div>


    <!--script para mostrar pestañas de detalles-->
    <script type="text/javascript">
        var clickLibro=false;
        var clickAutor=false;
        var clickBlog=false;
        $(document).ready(function() {
        
        

            $('[name=details_libro]').on('click', function () {
                if(clickLibro){  
                    clickLibro=false;
                    $('.details_libro').hide();
                    $('.cajaBannerLibros').css({'margin-bottom':'75px', 'height':''});
                    $('.cajaBannerLibrosHide').css({'margin-bottom':'75px', 'height':''});
                }   
                else{
                
                    clickLibro=true;
                    $('.cajaBannerLibros').css({'margin-bottom':'250px','height':''});
                    $('.cajaBannerLibrosHide').css({'margin-bottom':'250px','height':''});
                    $('.details_libro').css({ "display": "flex", "flex-direction": "row" });
                    $('.details_libro').show(); 
                }
                    
                           
            });

            $('[name=details_autor]').on('click', function () {
                
                if(clickAutor){  
                    clickAutor=false;
                    $('.details_autor').hide();
                    $('.cajaBannerAutores').css({'margin-bottom':'75px', 'height':''});
                    $('.cajaBannerAutoresHide').css({'margin-bottom':'75px', 'height':''});
                }   
                else{
                   
                    clickAutor=true;
                    $('.cajaBannerAutores').css({'margin-bottom':'250px','height':''});
                    $('.cajaBannerAutoresHide').css({'margin-bottom':'250px','height':''});
                    $('.details_autor').css({ "display": "flex", "flex-direction": "row", "justify-content":"center",});
                    $('.details_autor').show();
                    
                }      
            });

            $('[name=details_blog]').on('click', function () {
                
                if(clickBlog){  
                    clickBlog=false;
                    $('.details_blog').hide();
                    $('.cajaBannerBlog').css({'margin-bottom':'75px', 'height':''});
                    $('.cajaBannerBlog').css({'margin-bottom':'75px', 'height':''});
                }   
                else{
                   
                    clickBlog=true;
                    $('.cajaBannerBlog').css({'margin-bottom':'250px','height':''});
                    $('.cajaBannerBlog').css({'margin-bottom':'250px','height':''});
                    $('.details_blog').css({ "display": "flex", "flex-direction": "row", "justify-content":"space-around","align-items":"center"});
                    $('.details_blog').show();
                    
                }      
            });
        });
    </script>


</div>
<!-- End / Content-->
<!-- Vendors-->
<script type="text/javascript" src="assetsTimer/vendors/jquery/jquery.min.js"></script>
<script type="text/javascript" src="assetsTimer/vendors/jquery.countdown/jquery.countdown.min.js"></script>
<script type="text/javascript" src="assetsTimer/vendors/flat-surface-shader/fss.min.js"></script>
<script type="text/javascript" src="assetsTimer/vendors/particles.js/particles.js"></script>
<script type="text/javascript" src="assetsTimer/vendors/waterpipe/waterpipe.js"></script>
<script type="text/javascript" src="assetsTimer/vendors/quietflow/quietflow.min.js"></script>
<script type="text/javascript" src="assetsTimer/vendors/YTPlayer/jquery.mb.YTPlayer.min.js"></script>
<script type="text/javascript" src="assetsTimer/vendors/vegas/vegas.min.js"></script>
<!-- App-->
<script type="text/javascript" src="assetsTimer/js/main.js"></script>
@endsection
@extends('layouts.layoutPubli')

@section('header')

    <title>Libro | Editorial uno4cinco</title>

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

    <style>
        .cj-titulo{
            font-family: 'Montserrat';
            font-style: normal;
            font-weight: bold;
            font-size: 18px;
            line-height: 23px;
            color: #2E2E2E;

            height: 41.6px;
        }

        .cj-info{
            font-family: 'Montserrat';
            font-style: normal;
            font-weight: 300;
            font-size: 14px;
            line-height: 12px;
            color: #2E2E2E;
            height: 41.6px;

            width: 100%;
        }

        .cj-info2{
            font-family: 'Montserrat';
            font-style: normal;
            font-weight: 400;
            font-size: 14px;
            line-height: 18px;
            color: #2E2E2E;
            height: 41.6px;

            width: 100%;
        }


        .cj-button{
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
            -moz-box-shadow: 0px 3px 6px 0px rgba(0,0,0,0.16);
            box-shadow: 0px 3px 6px 0px rgb(0 0 0 / 16%);
        }

        .cj-button-bolsa{
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
            -moz-box-shadow: 0px 3px 6px 0px rgba(0,0,0,0.16);
            box-shadow: 0px 3px 6px 0px rgb(0 0 0 / 16%);
        }

        .cj-scroll{
            height: 470px !important;
        }

        .cj-book-border{
            border-color: #707070;
            border-radius: 62px;
            border: 1px;
            box-shadow: 0px 3px 6px #888888;

            padding: 50px 20px 50px 20px;
            text-align: center;
        }

        .cj-book-price{
            margin: auto !important;
            width: fit-content !important;
        }
    </style>
@endsection

@section('content')

<section class="section" id="about" style="width:100%; height:100%; background-color:white">
    
    <div class="container">
        {{-- INFORMACIÓN DEL LIBRO --}}
        <div class="row">
                {{-- IMAGENES --}}
                <div class="col">
                    {{-- <div class="libro-fotos">
                        <img id="imagen-seleccionada" src="{{asset('storage/libros/'.$book->tiendaImagen)}}">
                        {{-- SLIDER 
                        @if (count($book->images) > 0)
                            <div class="owl-carousel">
                                {{-- IMAGEN DE LA TIENDA 
                                <div class="imagen-carrusel">
                                    <img src="{{asset('storage/libros/'.$book->tiendaImagen)}}" onclick="clickImagen('{{asset('storage/libros/'.$book->tiendaImagen)}}')">
                                </div>

                                {{-- IMAGEN DE LA PORTADA 
                                <div class="imagen-carrusel">
                                    <img src="{{asset('storage/libros/'.$book->portadaImagen)}}" onclick="clickImagen('{{asset('storage/libros/'.$book->portadaImagen)}}')">
                                </div>

                                {{-- IMAGENES EXTRA 
                                @foreach($book->images as $imagen)
                                    <div class="imagen-carrusel">
                                        <img src="{{asset('storage/libros/'.$imagen->imagen)}}" onclick="clickImagen('{{asset('storage/libros/'.$imagen->imagen)}}')">
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    </div> --}}

                    {{-- CARRUSEL --}}
                    <div class="row">
                        
                    </div>
                    {{-- NOMBRE LIBRO --}}
                    <div class="row">
                        <p class="cj-titulo">{{Str::limit($book->titulo,61)}}</p>
                    </div>
                    {{-- AUTOR --}}
                    <div class="row mt-4">
                        <div class="col" style="padding: 0px">
                            <p class="cj-info align-middle">
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
                                        <a href="{{ route('autor', ['id' => $author->id]) }}" class="sm-link sm-link3 sm-link_padding-bottom"><span class="sm-link__label">{{$author->nombre}}</span></a>
                                    @elseif($contador == $cantAutores)
                                        y <a href="{{ route('autor', ['id' => $author->id]) }}" class="sm-link sm-link3 sm-link_padding-bottom"><span class="sm-link__label">{{$author->nombre}}</span></a>
                                    @else
                                        , <a href="{{ route('autor', ['id' => $author->id]) }}" class="sm-link sm-link3 sm-link_padding-bottom"><span class="sm-link__label">{{$author->nombre}}</span></a>
                                    @endif
                                    @php
                                        $contador++;
                                    @endphp
                                @endforeach
                            </p> --}}
                        </div>
                        <div class="col">
                            <button class="shrink cj-button align-top">
                                Seguir al autor
                                <img
                                    class="ml-1"
                                    style="width: 18px; height: 18px"
                                    src="{{ asset('assets/fonts/plus.svg') }}"
                                />
                            </button>
                        </div>
                    </div>
                </div>

                {{-- INFO --}}
                <div class="col-5">
                    {{-- Sinopsis --}}
                    <div class="row">
                        <p class="cj-info2 align-middle cj-scroll">
                            <b style="font-weight: bold">Sinopsis: </b> {{ $book->sinopsis }}
                        </p>
                    </div>


                    <div class="row">
                        <div class="col" style="padding: 0px">
                            <p class="cj-info2 align-middle">
                                <b style="font-weight: bold">Editorial: </b> {{ $book->sello->nombre }}
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

                    <div class="libro-info">

                        @if ($book->linkDemo)
                        <a href="{{asset('storage/libros/'.$book->linkDemo)}}" target="_blank" class="sm-link sm-link3 sm-link_padding-bottom">
                            <p style="color:#83d7b5;">
                            Descarga el pdf promocional
                            </p> 
                        </a>    
                        @endif
                        
                    </div>
                </div>

                {{-- PRECIOS --}}
                <div class="col">
                    <div class="cj-book-border">
                        @if ($book->linkDemo)
                        <div class="row cj-book-price">
                            <p class="cj-titulo">Prueba el libro: <span style="color: #1FC6AC">GRATIS</span></p>
                        </div>
                        <div class="row">
                            <button class="shrink cj-button-bolsa">
                                Agregar a la bolsa
                            </button>
                        </div>
                        @endif
    
                        @if ($book->stockDigital > 0)
                        <div class="row cj-book-price">
                            <p class="cj-titulo">Libro Digital:
                                <span style="color: #1FC6AC">
                                    {{-- Si el precio es 0 se muestra Gratis--}}
                                    @if($book->precioDigital <= 0)
                                        Gratis
                                    @else
                                        @if($book->descuentoDigital > 0)
                                            ${{ number_format($book->precioDigital - $book->precioDigital*($book->descuentoDigital/100), 2 , ".", "," ) }}
                                        @else
                                            ${{ number_format($book->precioDigital, 2 , ".", "," ) }}
                                        @endif
                                    @endif
                                </span>
                            </p>
                        </div>
                        <div class="row">
                            <button class="shrink cj-button-bolsa">
                                Agregar a la bolsa
                            </button>
                        </div>
                        @endif
    
                        @if ($book->stockFisico > 0)
                        <div class="row cj-book-price">
                            <p class="cj-titulo">Libro Físico:
                                <span style="color: #1FC6AC">
                                    {{-- Si el precio es 0 se muestra Gratis--}}
                                    @if($book->precioFisico <= 0)
                                        Gratis
                                    @else
                                    {{-- Si no entonces se muestra el precio --}}
                                        @if($book->descuentoFisico > 0)
                                            ${{ number_format($book->precioFisico - $book->precioFisico*($book->descuentoFisico/100), 2 , ".", "," ) }}
                                        @else
                                            ${{ number_format($book->precioFisico, 2 , ".", "," ) }}
                                        @endif
                                    @endif
                                </span>
                            </p>
                        </div>
                        <div class="row">
                            <button class="shrink cj-button-bolsa">
                                Agregar a la bolsa
                            </button>
                        </div>
                        @endif
    
                        {{-- EN CASO DE QUE EL LIBRO ESTÉ DISPONIBLE SE MUESTRA EL SIGUIENTE MENSAJE --}}
                        <div class="mensaje">
                            <p>
                                Pueden aplicarse gastos de envío,
                            </p>
                            <a title="Stripe"><img src="{{asset('storage/stripe.png')}}" width="50%"></a>
                            <!-- PayPal Logo --><a title="PayPal"><img src="https://www.paypalobjects.com/webstatic/mktg/Logo/pp-logo-100px.png" border="0" alt="PayPal Logo"></a>
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
                                @if($book->precioFisico <= 0)
                                    Gratis
                                @else
                                {{-- Si no entonces se muestra el precio
                                    @if($book->descuentoFisico > 0)
                                        <div class="oferta">
                                            ${{ number_format($book->precioFisico, 2 , ".", "," ) }}
                                        </div>

                                        ${{ number_format($book->precioFisico - $book->precioFisico*($book->descuentoFisico/100), 2 , ".", "," ) }}
                                    @else
                                        ${{ number_format($book->precioFisico, 2 , ".", "," ) }}
                                    @endif
                                @endif
                            </div>

                            {{-- AHORRO (EN CASO DE OFERTA) y que no sea gratis 
                            @if ($book->descuentoFisico > 0 && $book->precioFisico > 0)
                                <div class="ahorro">
                                    <p>Ahorras: ${{ number_format($book->precioFisico*($book->descuentoFisico/100), 2 , ".", "," ) }}</p>
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
                                @if($book->precioDigital <= 0)
                                    Gratis
                                @else
                                    @if($book->descuentoDigital > 0)
                                        <div class="oferta">
                                            ${{ number_format($book->precioDigital, 2 , ".", "," ) }}
                                        </div>

                                        ${{ number_format($book->precioDigital - $book->precioDigital*($book->descuentoDigital/100), 2 , ".", "," ) }}
                                    @else
                                        ${{ number_format($book->precioDigital, 2 , ".", "," ) }}
                                    @endif
                                @endif
                            </div>

                            {{-- AHORRO (EN CASO DE OFERTA) y que sea gratis 
                            @if ($book->descuentoDigital > 0 && $book->precioDigital > 0)
                                <div class="ahorro">
                                    <p>Ahorras: ${{ number_format($book->precioDigital*($book->descuentoDigital/100), 2 , ".", "," ) }}</p>
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
                                    <!-- PayPal Logo --><a title="PayPal"><img src="https://www.paypalobjects.com/webstatic/mktg/Logo/pp-logo-100px.png" border="0" alt="PayPal Logo"></a>
                                </div>

                                {{-- BOTONES DE COMPRA 
                                <button class="carrito-button shrink" data-toggle="modal" data-target="#comprarFormato" onclick="comprarCarrito()"><img src="{{asset('img/ico/carrito.png')}}"> Agregar al carrito</button>
                                <button class="comprar-button shrink" data-toggle="modal" data-target="#comprarFormato" onclick="comprarAhora()">Comprar ahora</button>
                            @endif
                        </div>
                    </div> --}}
                </div>
        </div>

        {{-- CARRUSEL DE LIBROS DE LOS AUTORES --}}
        @if(count($books) > 1)
            <hr class="hr-tienda">
            {{-- <div class="container"> --}}
                <div class="row">
                    <div class="MultiCarousel" data-items="1,3,3,3" data-slide="1" id="MultiCarousel"  data-interval="1000">
                        @if (count($book->authors) > 1)
                            <p class="mas-autor-libro">Más de estos autores</p>
                        @else
                            <p class="mas-autor-libro">Más de este autor</p>
                        @endif
                        <div class="MultiCarousel-inner">
                            @foreach ($books as $bookBanner)
                            @if($book->id != $bookBanner->id)
                                <div class="item" onclick="window.location.href='{{ route('libro',['id' => $bookBanner->id]) }}'">
                                    <div class="pad15">
                                        <div class="div_portadapad15">
                                            <img alt="{{$bookBanner->bannerImagen}}" src="{{asset('storage/libros/'.$bookBanner->bannerImagen)}}">
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
            {{-- </div> --}}
        @endif
        <br>
    </div>
</section>

{{-- MODAL DE COMPRA --}}
<div class="modal fade" id="comprarFormato" tabindex="-1" role="dialog" aria-labelledby="comprarFormatoTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle" style="width: 100%; text-align:center;">{{ $book->titulo }}</h5>
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
                        <div class="boton-formato" id="botonFisico" data-toggle="modal" data-target=
                        @if ($book->stockFisico > 0)
                            {!!"#comprarFormato"!!}
                        @endif>
                            <div class="formato">
                                <p style="padding-top: 20px;">Formato Físico:</p>
                            </div>
                            {{-- PRECIO --}}
                            <div class="precio" id="precioFisico">
                            {{-- Si el precio es 0 se muestra Gratis--}}
                                @if($book->precioFisico <= 0)
                                    Gratis
                                @else
                                {{-- Si no entonces se muestra el precio --}}
                                    @if($book->descuentoFisico > 0)
                                        <div class="oferta">
                                            ${{ number_format($book->precioFisico, 2 , ".", "," ) }}
                                        </div>

                                        ${{ number_format($book->precioFisico - $book->precioFisico*($book->descuentoFisico/100), 2 , ".", "," ) }}
                                    @else
                                        ${{ number_format($book->precioFisico, 2 , ".", "," ) }}
                                    @endif
                                @endif
                            </div>

                            {{-- AHORRO (EN CASO DE DESCUENTO Y QUE NO SEA GRATIS) --}}
                            <div class="ahorro" id="ahorroFisico">
                                @if ($book->descuentoFisico > 0 && $book->precioFisico > 0)
                                    <p>Ahorras: ${{ number_format($book->precioFisico*($book->descuentoFisico/100), 2 , ".", "," ) }}</p>
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
                                {{-- en caso que el producto se encuentre en el carrito se establece el minimo como la cantidad que ya está en el carrito --}}
                                @if (session('cart'))
                                    @foreach(session('cart') as $id => $details)
                                        @if ($id == $book->id && $details['cantidadFisico'] > 0)
                                            @php
                                                $min = $details['cantidadFisico'];
                                            @endphp
                                        @endif
                                    @endforeach
                                @endif
                                {{-- si el producto no se encontraba en el carrito entonces el minimo se establece como 1 --}}
                                @if ($min == 0)
                                    @php
                                        $min = 1;
                                    @endphp
                                @endif
                                {{-- si hay mas de un libro en stock entonces se pone el minimo como cantidad --}}
                                @if ($book->stockFisico > 1)
                                    <div role="button" tabindex="0" class="qty qty-minus botonCantidad" id="menosCarrito">-</div>
                                    <input type="numeric" id="cantidadFisico" value="{{ $min }}" />
                                    <div role="button" tabindex="0" class="qty qty-plus botonCantidad" id="masCarrito">+</div>
                                @else
                                    {{-- si solo hay un libro disponible entonces solamente se podra seleccionar un libro como maximo --}}
                                    <input type="numeric" id="cantidadFisico" value="1" />
                                @endif
                            @endif
                        </div>
                    </div>
                </div>

                {{-- FORMATO DIGITAL --}}
                <div class="formato-comprar" id="botonDigital" data-toggle="modal" data-target=
                @if ($book->stockDigital > 0)
                    {!!"#comprarFormato"!!}
                @endif>
                    <div class="formato-container shrink" style="height: 213.8px">
                        <div class="formato">
                            <p style="padding-top: 20px;">Formato Digital:</p>
                        </div>

                        {{-- PRECIO --}}
                        <div class="precio" id="precioDigital">
                            {{-- Si el precio es 0 se muestra Gratis--}}
                            @if($book->precioDigital <= 0)
                                Gratis
                            @else
                            {{-- Si no entonces se muestra el precio --}}
                                @if($book->descuentoDigital > 0)
                                    <div class="oferta">
                                        ${{ number_format($book->precioDigital, 2 , ".", "," ) }}
                                    </div>

                                    ${{ number_format($book->precioDigital - $book->precioDigital*($book->descuentoDigital/100), 2 , ".", "," ) }}
                                @else
                                    ${{ number_format($book->precioDigital, 2 , ".", "," ) }}
                                @endif
                            @endif
                        </div>

                        {{-- AHORRO (EN CASO DE DESCUENTO Y QUE NO SEA GRATIS) --}}
                        <div class="ahorro" id="ahorroDigital">
                            @if ($book->descuentoDigital > 0 && $book->precioDigital > 0)
                                <p>Ahorras: ${{ number_format($book->precioDigital*($book->descuentoDigital/100), 2 , ".", "," ) }}</p>
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

{{-- ESTE SCRIPT CONTROLA EL ZOOM DE LA IMAGEN Y EL LEER MAS --}}
<script>
    //pre es el elemento donde se muestra la previsualizacion de la imagen seleccionada
    //"imagen-seleccionada" es el visualizador de la imagen
    var pre = document.getElementById("imagen-seleccionada");
    //imagen es la imagen que se ha seleccionado
    var imagen = pre.src;

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
    function clickImagen(nuevaImagen){
        //hace que se muestre la nueva imagen en el visualizador
        pre.src = nuevaImagen;
        //obtiene la imagen para el zoom
        imagen = nuevaImagen;
    }
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
@endsection
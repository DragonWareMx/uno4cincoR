@extends('layouts.layoutTienda')

@section('seccionTienda')
    Novedades
@endsection

@section('carrusel')
<div id="carruselLibros" class="carousel slide carrusel-tienda" data-ride="carousel">
    <div class="carousel-inner">
        @php
            $i=0; 
        @endphp
        @foreach ($banners as $banner)
            @if ($i==0)
                <div class="carousel-item active" >
                    <div class="img_carrusel" style="background: url('{{asset('storage/banners/'.$banner->imagenPC)}}');
                        background-size: 100% 100%;
                        -moz-background-size: 100% 100%;
                        -o-background-size: 100% 100%;
                        -webkit-background-size: 100% 100%;">
                    </div>
                </div>
            @else
                <div class="carousel-item " >
                    <div class="img_carrusel" style="background: url('{{asset('storage/banners/'.$banner->imagenPC)}}');
                        background-size: 100% 100%;
                        -moz-background-size: 100% 100%;
                        -o-background-size: 100% 100%;
                        -webkit-background-size: 100% 100%;">
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
<div id="carruselLibrosHide" class="carousel slide carrusel-tienda" data-ride="carousel">
    <div class="carousel-inner">
        @php
            $i=0; 
        @endphp
        @foreach ($banners as $banner)
            @if ($i==0)
                <div class="carousel-item active" >
                    <div class="img_carrusel" style="background: url('{{asset('storage/banners/'.$banner->imagenCell)}}');
                        background-size: 100% 100%;
                        -moz-background-size: 100% 100%;
                        -o-background-size: 100% 100%;
                        -webkit-background-size: 100% 100%;">
                    </div>
                </div>
            @else
                <div class="carousel-item " >
                    <div class="img_carrusel" style="background: url('{{asset('storage/banners/'.$banner->imagenCell)}}');
                        background-size: 100% 100%;
                        -moz-background-size: 100% 100%;
                        -o-background-size: 100% 100%;
                        -webkit-background-size: 100% 100%;">
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
@endsection

@section('encabezadoTienda')
    Los más recientes
@endsection

@section('contenidoTienda')
<div class="container">
    @php
        $n=1; 
    @endphp
    @foreach ($books as $book)
        @if($n == 1)
            <div class="row">
        @endif
            <div class="col-sm">
                <div class="producto-tienda">
                    <!--imagen del producto-->
                    <div class="imagen">
                        <img src="{{asset('storage/libros/'.$book->tiendaImagen)}}">
                    </div>

                    <!--informacion del libro-->
                    <div class="info-libro" onclick="clickLibro({{$book->id}})" id="{{$book->id}}" style="opacity: 0;">
                        <div class="info non-selectable">
                            @if($book->descuentoFisico == $book->descuentoDigital && $book->descuentoFisico > 0)
                                <h1 style="margin-bottom: 10px;"><b>{{$book->descuentoFisico}}% de descuento en formato físico y digital</b></h1>
                            @elseif($book->descuentoFisico > 0 && $book->descuentoDigital > 0)
                                <h1 style="margin-bottom: 10px;"><b>{{$book->descuentoFisico}}% de descuento en formato físico y {{$book->descuentoDigital}}% en formato digital</b></h1>
                            @elseif($book->descuentoFisico > 0)
                                <h1 style="margin-bottom: 10px;"><b>{{$book->descuentoFisico}}% de descuento en formato físico</b></h1>
                            @elseif($book->descuentoDigital > 0)
                                <h1 style="margin-bottom: 10px;"><b>{{$book->descuentoDigital}}% de descuento en formato digital</b></h1>
                            @endif
                            <h1>Autor:</h1>
                            <p>{{$book->authors[0]->nombre}}</p>
                            <h1>Num. Edición:</h1>
                            <p>{{$book->numEdicion}}</p>
                            <h1>Sello:</h1>
                            <p>{{$book->sello->nombre}}</p>
                        </div>
                    </div>

                    <!--icono de oferta-->
                    @if($book->descuentoFisico > 0 && $book->descuentoDigital > 0)
                        <div class="img-oferta">
                            <img src="{{asset('img/ico/oferta.PNG')}}">
                        </div>
                    @endif

                    <!--titulo del libro-->
                    <div class="titulo">
                        <h1>{{Str::limit($book->titulo,49)}}</h1>
                    </div>

                    <!--precio e icono de nuevo-->
                    <div class="contenido-producto">
                        <div class="precio">
                            @if($book->descuentoFisico > 0)
                                <div class="oferta">
                                    ${{$book->precioFisico}}
                                </div>
                            @endif
                            @php
                                $precio = $book->precioFisico - ($book->precioFisco*$book->descuentoFisico);
                            @endphp
                            ${{$precio}}
                        </div>
                        <img src="{{asset('img/ico/signo!.PNG')}}">
                    </div>

                    <!--boton de carrito-->
                    <button class="shrink">
                        <img src="{{asset('img/ico/carrito.PNG')}}"> Agregar al carrito
                    </button>
                </div>
            </div>
            @php
                $n++; 
            @endphp
        @if($n == 1)
            </div>
        @endif
    @endforeach
</div>

<!--Muestra la info de los libros-->
<script>
    function clickLibro(id) {
        var x = document.getElementById(id);
        if (x.style.opacity === "0") {
            x.style.opacity = "1";
        } else {
            x.style.opacity = "0";
        }
    }
</script>
@endsection
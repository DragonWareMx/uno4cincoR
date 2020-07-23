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

    <div class="row">
        @if (count($books) > 0)
        @foreach ($books as $book)
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
                    @if($book->descuentoFisico > 0 || $book->descuentoDigital > 0)
                        <div class="img-oferta">
                            @if ($book->sello->nombre == 'uno4cinco')
                                <img src="{{asset('img/ico/oferta.PNG')}}">
                            @else
                                <img src="{{asset('img/ico/oferta2.PNG')}}">
                            @endif
                        </div>
                    @endif

                    <!--titulo del libro-->
                        <a href="{{ route('libro', ['id' => $book->id])}}">
                            <div class="titulo">
                                <p>{{Str::limit($book->titulo,49)}}</p>
                            </div>
                        </a>

                    <!--precio e icono de nuevo-->
                    <div class="contenido-producto"  data-toggle="tooltip" data-placement="top" data-html="true" title="
                    Precio Físico: ${{ number_format($book->precioFisico - $book->precioFisico*($book->descuentoFisico/100), 2 , ".", "," ) }} @if($book->descuentoFisico > 0)(con descuento)@endif
                    <br>
                    Precio Digital: ${{ number_format($book->precioDigital - $book->precioDigital*($book->descuentoDigital/100), 2 , ".", "," ) }} @if($book->descuentoDigital > 0)(con descuento)@endif
                    <br>
                    @if($book->nuevo == 1)
                        @if($book->sello->nombre == 'uno4cinco')
                            <p>Nuevo de uno4cinco</p>
                        @else
                            <h1>Nuevo de 145<h1>
                        @endif
                    @endif">
                        <div class="precio" style="cursor: default;">
                            {{-- SI EXISTE UN DESCUENTO FÍSICO Y DIGITAL MUESTRA EL RESULTADO CON MENOR COSTO --}}
                            @if($book->descuentoFisico > 0 && $book->descuentoDigital > 0)
                            @php
                                $precio1 = $book->precioFisico - $book->precioFisico*($book->descuentoFisico/100);
                                $precio2 = $book->precioDigital - $book->precioDigital*($book->descuentoDigital/100);
                            @endphp
                                @if($precio1 < $precio2)
                                    <div class="oferta">
                                        ${{ number_format($book->precioFisico, 2 , ".", "," ) }}
                                    </div>
                                    @php
                                        $precio = $book->precioFisico - ($book->precioFisico * ($book->descuentoFisico/100));
                                    @endphp
                                    ${{ number_format($precio, 2 , ".", "," ) }}
                                @else
                                    <div class="oferta">
                                        ${{ number_format($book->precioDigital, 2 , ".", "," ) }}
                                    </div>
                                    @php
                                        $precio = $book->precioDigital - ($book->precioDigital * ($book->descuentoDigital/100));
                                    @endphp
                                    ${{ number_format($precio, 2 , ".", "," ) }}
                                @endif
                            @elseif($book->descuentoFisico > 0)
                                <div class="oferta">
                                    ${{ number_format($book->precioFisico, 2 , ".", "," ) }}
                                </div>
                                @php
                                    $precio = $book->precioFisico - ($book->precioFisico * ($book->descuentoFisico/100));
                                @endphp
                                ${{ number_format($precio, 2 , ".", "," ) }}
                            @elseif($book->descuentoDigital > 0)
                                <div class="oferta">
                                    ${{ number_format($book->precioDigital, 2 , ".", "," ) }}
                                </div>
                                @php
                                    $precio = $book->precioDigital - ($book->precioDigital * ($book->descuentoDigital/100));
                                @endphp
                                ${{ number_format($precio, 2 , ".", "," ) }}
                            @else
                                @php
                                    $precio1 = $book->precioFisico;
                                    $precio2 = $book->precioDigital;
                                @endphp
                                @if ($precio1 < $precio2)
                                    ${{ number_format( $precio1, 2 , ".", "," ) }}
                                @else
                                    ${{ number_format($precio2, 2 , ".", "," ) }}
                                @endif
                            @endif
                        </div>

                        {{-- Muestra sello --}}
                        @if ($book->nuevo == 1)
                            @if ($book->sello->nombre == 'uno4cinco')
                                <img src="{{asset('img/ico/signo!.PNG')}}">
                            @else
                                <img src="{{asset('img/ico/signo2.PNG')}}">
                            @endif
                        @endif
                    </div>

                    <!--boton de carrito-->
                    <button class="shrink" onclick="comprarCarrito({{ $book->id }})" data-toggle="modal" data-target="#comprarFormato">
                        <img src="{{asset('img/ico/carrito.PNG')}}"> Agregar al carrito
                    </button>
                </div>
            </div>
        @endforeach
        @else
        <h5 style="text-align: center; width:100%">No hay libros que mostrar</h5>
        @endif
    </div>

    <div class="paginate-tienda">
        <div style="width: fit-content; margin:auto;">
        {{ $books->links() }}
        </div>
    </div>

    <hr class="hr-tienda">
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

<script>
$(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip();
});
</script>
@endsection
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

    @include('subview.tiendaLibro')
    
@endsection
@extends('layouts.layoutTienda')

@section('seccionTienda')
    Novedades
@endsection

@section('carrusel')
    
@endsection

@section('encabezadoTienda')
    Los más recientes
@endsection

@section('contenidoTienda')
<div class="container">
    <div class="row">
        <div class="col-sm">
            <div class="producto-tienda">
                <div class="imagen">
                    <img src="{{asset('storage/libros/agustinC.JPG')}}">
                </div>
                <div class="titulo">
                    <h1>{{Str::limit("Estos poemas culeros que son lo menos culero que tengo",49)}}</h1>
                </div>
                <div class="contenido-producto">
                    <div class="precio">
                        <div class="oferta">
                            $287.58
                        </div>
                        $287.58
                    </div>
                    <img src="{{asset('img/ico/signo!.PNG')}}">
                </div>
                <button class="shrink">
                    <img src="{{asset('img/ico/carrito.PNG')}}"> Agregar al carrito
                </button>
            </div>
        </div>
        <div class="col-sm">
            <div class="producto-tienda">
                <div class="imagen">
                    <img src="{{asset('storage/libros/agustinC.JPG')}}">
                </div>
                <div class="titulo">
                    <h1>{{Str::limit("Estos poemas culeros que son lo menos culero que tengo",49)}}</h1>
                </div>
                <div class="contenido-producto">
                    <div class="precio">
                        <div class="oferta">
                            $287.58
                        </div>
                        $287.58
                    </div>
                    <img src="{{asset('img/ico/signo!.PNG')}}">
                </div>
                <button class="shrink">
                    <img src="{{asset('img/ico/carrito.PNG')}}"> Agregar al carrito
                </button>
            </div>
        </div>
        <div class="col-sm">
            <div class="producto-tienda">
                <div class="imagen">
                    <img src="{{asset('storage/libros/agustinC.JPG')}}">
                </div>
                <div class="titulo">
                    <h1>{{Str::limit("Estos poemas culeros que son lo menos culero que tengo",49)}}</h1>
                </div>
                <div class="contenido-producto">
                    <div class="precio">
                        <div class="oferta">
                            $287.58
                        </div>
                        $287.58
                    </div>
                    <img src="{{asset('img/ico/signo!.PNG')}}">
                </div>
                <button class="shrink">
                    <img src="{{asset('img/ico/carrito.PNG')}}"> Agregar al carrito
                </button>
            </div>
        </div>
        <div class="col-sm">
            <div class="producto-tienda">
                <div class="imagen">
                    <img src="{{asset('storage/libros/agustinC.JPG')}}">
                </div>
                <div class="titulo">
                    <h1>{{Str::limit("Estos poemas culeros que son lo menos culero que tengo",49)}}</h1>
                </div>
                <div class="contenido-producto">
                    <div class="precio">
                        <div class="oferta">
                            $287.58
                        </div>
                        $287.58
                    </div>
                    <img src="{{asset('img/ico/signo!.PNG')}}">
                </div>
                <button class="shrink">
                    <img src="{{asset('img/ico/carrito.PNG')}}"> Agregar al carrito
                </button>
            </div>
        </div>
    </div>
</div>
@endsection
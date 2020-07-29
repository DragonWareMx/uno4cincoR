@extends('layouts.layoutTienda')

@section('seccionTienda')
    Colecciones
@endsection

@section('encabezadoTienda')
    Colecciones
@endsection

@section('contenidoTienda')

    <div class="container">
        <div class="row justify-content-start">
            <div class="col-lg-4 col-md-4 collection-container">
                <img src="{{asset('storage/libros/agustinC.JPG')}}">
                <div class="name">
                    <p>The Master Chef Collection</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 collection-container">
                hola
            </div>
            <div class="col-lg-4 col-md-4 collection-container">
                hola
            </div>
        </div>
        <div class="row justify-content-start">
            <div class="col-lg-4 col-md-4 collection-container">
                ola
            </div>
            <div class="col-lg-4 col-md-4 collection-container">
                hola
            </div>
            <div class="col-lg-4 col-md-4 collection-container">
                hola
            </div>
        </div>
            @if (count($collections) > 0)
                {{-- LIBRO --}}
                @foreach ($collections as $collection)
                
                @endforeach
        </div>
    </div>
    
@endif
@endsection
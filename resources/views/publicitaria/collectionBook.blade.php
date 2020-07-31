@extends('layouts.layoutTienda')

@section('seccionTienda')
    Colección
@endsection

@section('encabezadoTienda')
    {{ $collection->nombre }}
@endsection

@section('contenidoTienda')

    @include('subview.tiendaLibro')

    {{-- BOTON REGRESAR --}}
    <div class="libro-regresar">
        <div class="boton">
        <button onclick="location.href='{{ route('colecciones') }}'">
            <div class="row" style="margin-right:0px; margin-left: auto;">
                <img src="{{ asset('img/ico/blackarrow.png') }}">
            </div>
            <div class="row" style="margin-right:0px; margin-left: auto;">
                Regresar a colecciones
            </div>
        </button>
        </div>
    </div>
    
@endsection
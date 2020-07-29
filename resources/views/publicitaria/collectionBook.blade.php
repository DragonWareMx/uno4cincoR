@extends('layouts.layoutTienda')

@section('seccionTienda')
    Colección
@endsection

@section('encabezadoTienda')
    {{ $collection->nombre }}
@endsection

@section('contenidoTienda')

    @include('subview.tiendaLibro')
    
@endsection
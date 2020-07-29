@extends('layouts.layoutTienda')

@section('seccionTienda')
    145
@endsection

@section('encabezadoTienda')
    Libros de otros autores
@endsection

@section('contenidoTienda')

    @include('subview.tiendaLibro')
    
@endsection
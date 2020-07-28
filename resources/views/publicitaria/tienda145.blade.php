@extends('layouts.layoutTienda')

@section('seccionTienda')
    145
@endsection

@section('encabezadoTienda')
    Libros de otros autores
@endsection

@section('contenidoTienda')
<div class="container">

    @include('subview.tiendaLibro')
    
@endsection
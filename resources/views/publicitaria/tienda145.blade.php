@extends('layouts.layoutTienda')

@section('seccionTienda')
    145
@endsection

@section('encabezadoTienda')
    Que debe decir? :v
@endsection

@section('contenidoTienda')
<div class="container">

    @include('subview.tiendaLibro')
    
@endsection
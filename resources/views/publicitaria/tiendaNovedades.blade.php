@extends('layouts.layoutTienda')

@section('seccionTienda')
    Novedades
@endsection


@section('encabezadoTienda')
    Los más recientes
@endsection

@section('contenidoTienda')

    @include('subview.tiendaLibro')
    
@endsection
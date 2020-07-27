@extends('layouts.layoutTienda')

@section('seccionTienda')
    Catálogo
@endsection

@section('encabezadoTienda')
    Nuestros libros
@endsection

@section('contenidoTienda')
<div class="container">

    @include('subview.tiendaLibro')
    
@if(session('status'))
<script>
    $( document ).ready(function() {
        bootbox.dialog({ 
            message: '<div class="text-center" style="padding:10px><i class="fas fa-check"></i>&nbsp {{session('status')}} </div>', 
            closeButton: true 
        })
    });
</script>
@endif
@endsection
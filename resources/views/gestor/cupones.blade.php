@extends('layouts.menuGestor')
 
@section('importOwl')
    <link rel="stylesheet" type="text/css" href="/assets/css/gestorBlogs.css">
    <link rel="stylesheet" type="text/css" href="/assets/css/gestorAutores.css">
@endsection

@section('menu')
    <a href="{{ route('verCupones') }}" class="txt-titulosGestor">Cupones</a>
@endsection

@section('contenido') 
    <a href="{{Route('nuevoCupon')}}" class="a_agregarAutor" style="color:#29B390">Agregar cupón</a>
    <div class="div_contenedorgral">
        
        <div class="paginacion_css" style="margin-top:30px;">
            {{$cupones->links()}}
        </div>
    </div>
@endsection
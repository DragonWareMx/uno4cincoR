@extends('layouts.menuGestor')

@section('importOwl')
    <link rel="stylesheet" type="text/css" href="/assets/css/gestorAutores.css">
    <link rel="stylesheet" type="text/css" href="{{asset('/assets/css/style_SobreNosotros.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/assets/css/tienda.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/assets/css/blogs.css')}}">
    <link rel="stylesheet" type="text/css" href="/assets/css/gestorBlogs.css">
    <link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Karla&display=swap" rel="stylesheet">

    
@endsection

@section('menu')
    Libros | {{$clasificacion}} 
@endsection

@section('contenido')
<div class="all_blogs_80" style="margin-bottom: 15px">
<a href="{{route('libros-crear')}}" class="a_agregarAutor" >Agregar libro </a>
    <div class="all_blogs_menu_busqueda">
        <form class="" action="{{ route('verLibros')}}" method="GET" enctype="multipart/form-data">
            <div class="all_blogs_busqueda">
                <input type="text" required id="" class ="all_blogs_input_busqueda" name="busqueda">
                <input type="text" name="clasificacion" value="{{$clasificacion}}" style="display: none;">
                <button type="submit" class="all_blogs_search_busqueda"><i class="fas fa-search" style="font-size: 14px; color:#909090;"></i></button>
            </div>
        </form>
    </div> 
</div>
<div class="div_contenedorgral">
    <div class="div_AutoresContainerG">
        @foreach ($books as $book)
            <div class="col-sm">
                <div class="producto-tienda" ">
                
                    <!--imagen del producto-->
                    <div class="imagen">
                        <img src="{{asset('storage/libros/'.$book->tiendaImagen)}}">
                    </div>

                    <!--titulo del libro-->
                    <div class="titulo" style="margin:25px 0px 15px 0px">
                        <p>{{Str::limit($book->titulo,42)}}</p>
                    </div>

                    <p class="autor-limit">{{Str::limit($book->authors[0]->nombre,56)}}</p>

                    <p class="precio-rango">{{$book->isbn}}</p>

                    <!--boton de editar-->
                    <div class="btn_editarAutorG" >
                        <a href="{{Route('libros-editar',['id'=>$book->id])}}">Editar</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="paginacion_css" style="margin-top:30px;">
        {{$books->links()}}
    </div>
</div>
<script>
    function clickLibro(id) {
        var x = document.getElementById(id);
        if (x.style.opacity === "0") {
            x.style.opacity = "1";
        } else {
            x.style.opacity = "0";
        }
    }
</script>

<script>
$(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip();
});
</script>
@endsection
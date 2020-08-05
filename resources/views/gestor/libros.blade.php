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
                <div class="producto-tienda">
                    <!--imagen del producto-->
                    <div class="imagen">
                        <img src="{{asset('storage/libros/'.$book->tiendaImagen)}}">
                    </div>

                    <!--informacion del libro-->
                    <div class="info-libro" onclick="clickLibro({{$book->id}})" id="{{$book->id}}" style="opacity: 0;">
                        <div class="info non-selectable">
                            @if($book->descuentoFisico == $book->descuentoDigital && $book->descuentoFisico > 0)
                                <h1 style="margin-bottom: 10px;"><b>{{$book->descuentoFisico}}% de descuento en formato físico y digital</b></h1>
                            @elseif($book->descuentoFisico > 0 && $book->descuentoDigital > 0)
                                <h1 style="margin-bottom: 10px;"><b>{{$book->descuentoFisico}}% de descuento en formato físico y {{$book->descuentoDigital}}% en formato digital</b></h1>
                            @elseif($book->descuentoFisico > 0)
                                <h1 style="margin-bottom: 10px;"><b>{{$book->descuentoFisico}}% de descuento en formato físico</b></h1>
                            @elseif($book->descuentoDigital > 0)
                                <h1 style="margin-bottom: 10px;"><b>{{$book->descuentoDigital}}% de descuento en formato digital</b></h1>
                            @endif
                            <h1>Autor:</h1>
                            <p>{{$book->authors[0]->nombre}}</p>
                            <h1>Num. Edición:</h1>
                            <p>{{$book->numEdicion}}</p>
                            <h1>Sello:</h1>
                            <p>{{$book->sello->nombre}}</p>
                        </div>
                    </div>

                    <!--icono de oferta-->
                    @if($book->descuentoFisico > 0 || $book->descuentoDigital > 0)
                        <div class="img-oferta">
                            @if ($book->sello->nombre == 'uno4cinco')
                                <img src="{{asset('img/ico/oferta.png')}}">
                            @else
                                <img src="{{asset('img/ico/oferta2.png')}}">
                            @endif
                        </div>
                    @endif

                    <!--titulo del libro-->
                    <div class="titulo" data-toggle="tooltip" data-placement="top" data-html="true" title="{{$book->titulo}}">
                        <p>{{Str::limit($book->titulo,49)}}</p>
                    </div>
                        

                    <!--precio e icono de nuevo-->
                    <div class="contenido-producto"  data-toggle="tooltip" data-placement="top" data-html="true" title="
                    Precio Físico: ${{ number_format($book->precioFisico - $book->precioFisico*($book->descuentoFisico/100), 2 , ".", "," ) }} @if($book->descuentoFisico > 0)(con descuento)@endif
                    <br>
                    Precio Digital: ${{ number_format($book->precioDigital - $book->precioDigital*($book->descuentoDigital/100), 2 , ".", "," ) }} @if($book->descuentoDigital > 0)(con descuento)@endif
                    <br>
                    @if($book->nuevo == 1)
                        @if($book->sello->nombre == 'uno4cinco')
                            <p>Nuevo de uno4cinco</p>
                        @else
                            <h1>Nuevo de 145<h1>
                        @endif
                    @endif">
                        <div class="precio" style="cursor: default;">
                            {{-- SI EXISTE UN DESCUENTO FÍSICO Y DIGITAL MUESTRA EL RESULTADO CON MENOR COSTO --}}
                            @if($book->descuentoFisico > 0 && $book->descuentoDigital > 0)
                            @php
                                $precio1 = $book->precioFisico - $book->precioFisico*($book->descuentoFisico/100);
                                $precio2 = $book->precioDigital - $book->precioDigital*($book->descuentoDigital/100);
                            @endphp
                                @if($precio1 < $precio2)
                                    <div class="oferta">
                                        ${{ number_format($book->precioFisico, 2 , ".", "," ) }}
                                    </div>
                                    @php
                                        $precio = $book->precioFisico - ($book->precioFisico * ($book->descuentoFisico/100));
                                    @endphp
                                    ${{ number_format($precio, 2 , ".", "," ) }}
                                @else
                                    <div class="oferta">
                                        ${{ number_format($book->precioDigital, 2 , ".", "," ) }}
                                    </div>
                                    @php
                                        $precio = $book->precioDigital - ($book->precioDigital * ($book->descuentoDigital/100));
                                    @endphp
                                    ${{ number_format($precio, 2 , ".", "," ) }}
                                @endif
                            @elseif($book->descuentoFisico > 0)
                                <div class="oferta">
                                    ${{ number_format($book->precioFisico, 2 , ".", "," ) }}
                                </div>
                                @php
                                    $precio = $book->precioFisico - ($book->precioFisico * ($book->descuentoFisico/100));
                                @endphp
                                ${{ number_format($precio, 2 , ".", "," ) }}
                            @elseif($book->descuentoDigital > 0)
                                <div class="oferta">
                                    ${{ number_format($book->precioDigital, 2 , ".", "," ) }}
                                </div>
                                @php
                                    $precio = $book->precioDigital - ($book->precioDigital * ($book->descuentoDigital/100));
                                @endphp
                                ${{ number_format($precio, 2 , ".", "," ) }}
                            @else
                                @php
                                    $precio1 = $book->precioFisico;
                                    $precio2 = $book->precioDigital;
                                @endphp
                                @if ($precio1 < $precio2)
                                    ${{ number_format($precio1, 2 , ".", "," ) }}
                                @else
                                    ${{ number_format($precio2, 2 , ".", "," ) }}
                                @endif
                            @endif
                        </div>

                        {{-- Muestra sello --}}
                        @if ($book->nuevo == 1)
                            @if ($book->sello->nombre == 'uno4cinco')
                                <img src="{{asset('img/ico/signo!.png')}}">
                            @else
                                <img src="{{asset('img/ico/signo2.png')}}">
                            @endif
                        @endif
                    </div>

                    <!--boton de editar-->
                    <div class="btn_editarAutorG" >
                        <a href="{{Route('libros-editar',['id'=>$book->id])}}"><i class="fas fa-pencil-alt" style="font-size: 14px"></i> &nbsp;Editar</a>
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
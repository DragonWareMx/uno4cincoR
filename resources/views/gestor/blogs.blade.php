@extends('layouts.menuGestor')
 
@section('importOwl')
    <link rel="stylesheet" type="text/css" href="/assets/css/gestorBlogs.css">
    <link rel="stylesheet" type="text/css" href="/assets/css/gestorAutores.css">
    <script type="text/javascript" src='/assets/js/tags.js'></script>
    <link href="https://fonts.googleapis.com/css2?family=Karla&display=swap" rel="stylesheet">
@endsection

@section('menu')
    <a href="{{ route('verBlogs') }}" class="txt-titulosGestor">Blogs</a>
@endsection

@section('contenido') 
    <div class="all_blogs_80" style="margin-bottom: 15px">
        <a href="{{ route('nuevoBlog') }}" class="a_agregarAutor" >Agregar entrada</a>
        <div class="all_blogs_menu_busqueda">
            <form class="" action="{{ route('verBlogs') }}" method="GET" enctype="multipart/form-data">
                <div class="all_blogs_busqueda">
                    <input type="text" required id="" class ="all_blogs_input_busqueda" name="busqueda">
                    <button type="submit" class="all_blogs_search_busqueda"><i class="fas fa-search" style="font-size: 14px; color:#909090; margin-bottom:0px"></i></button>
                </div>
            </form>
        </div> 
    </div>
<div class="div_contenedorgral">
    <div class="div_AutoresContainerG">
        <div class="div_AutoresContainerG" >
        @foreach ($blogs as $blog)
        <div class="div_ItemAutorG" style="margin-bottom: 25px;">
            <div class="div_imagAutorG">
                <img src="{{asset('storage/blogs/'.$blog->imagen)}}">
                <div class="div_infoAutorG txt-nombreAutorG" data-toggle="tooltip" data-placement="top" data-html="true" title="{{$blog->titulo}}">
                    {{Str::limit($blog->titulo,18)}}
                </div>
                <div class="div_DatosAutorG">
                    <div class="div_librosAutorG" style="width: 100%">
                        @if ($blog->author_id && !$blog->autor)
                            {{Str::limit($blog->author->nombre,18)}}
                        @endif
                        @if (!$blog->author_id && $blog->autor)
                            {{Str::limit($blog->autor,18)}}
                        @endif
                        @if ($blog->author_id && $blog->autor)
                            {{Str::limit($blog->autor,9)}}&nbsp;/&nbsp;{{Str::limit($blog->author->nombre,9)}}
                        @endif
                    </div>
                    <div class="div_entradasAutorG" style="width: 100%; color:#29B390">
                        @php
                        $separa=explode("-",$blog->fecha);
                        $anio=$separa[0];
                        $mes=$separa[1];
                        $dia=$separa[2];
                    @endphp
                    {{$dia}}&nbsp;
                    @switch($mes)
                        @case('01')
                            Enero&nbsp;
                            @break
                        @case('02')
                            Febrero&nbsp;
                            @break
                        @case('03')
                            Marzo&nbsp;
                            @break
                        @case('04')
                            Abril&nbsp;
                            @break
                        @case('05')
                            Mayo&nbsp;
                            @break
                        @case('06')
                            Junio&nbsp;
                            @break
                        @case('07')
                            Julio&nbsp;
                            @break
                        @case('08')
                            Agosto&nbsp;
                            @break
                        @case('09')
                            Septiembre&nbsp;
                            @break
                        @case('10')
                            Octubre&nbsp;
                            @break
                        @case('11')
                            Noviembre&nbsp;
                            @break
                        @case('12')
                            Diciembre&nbsp;
                            @break
                    @endswitch
                    {{$anio}}  
                    </div>
                </div>
                <div class="btn_editarAutorG" >
                    <a href="{{ route('editarBlog', ['id'=>$blog->id]) }}"><i class="fas fa-pencil-alt" style="font-size: 14px"></i> &nbsp;Editar</a>
                </div>
            </div> 
        </div>
        @endforeach
    </div>
    <div class="all_blogs_derecha">
        <div class="all_blogs_paginacion">
            {{ $blogs->links()}} 
        </div>
    </div>
</div>
@endsection
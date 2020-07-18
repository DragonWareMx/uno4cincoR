@extends('layouts.menuGestor')

@section('importOwl')
    <link rel="stylesheet" type="text/css" href="/assets/css/gestorBlogs.css">
    <script type="text/javascript" src='/assets/js/tags.js'></script>
    <link href="https://fonts.googleapis.com/css2?family=Karla&display=swap" rel="stylesheet">
@endsection

@section('contenido')
    <div class="all_blogs_80">
        <div class="all_blogs_menu_busqueda">
            <div class="h3 mb-0 text-gray-800">Blog</div>
            <form class="" action="{{ route('verBlogs') }}" method="GET" enctype="multipart/form-data">
                <div class="all_blogs_busqueda">
                    <input type="text" required id="" class ="all_blogs_input_busqueda" name="busqueda">
                    <button type="submit" class="all_blogs_search_busqueda"><i class="fas fa-search"></i></button>
                </div>
            </form>
        </div>
    </div>
   <div class="all_blogs_contenido">
        <div class="all_blogs_80">
            <div class="all_blogs_100">
                <a href="#">Agregar entrada</a>
            </div>  
        </div>
        @foreach ($blogs as $blog)
            <div class="all_blogs_item">
                <div class="all_blogs_item_imagen">
                    <img src="{{asset('storage/blogs/'.$blog->imagen)}}">
                </div>
                <h1>
                    {{Str::limit($blog->titulo,26)}}
                </h1>
                <h2>
                    @if ($blog->author_id && !$blog->autor)
                        {{Str::limit($blog->author->nombre,26)}}
                    @endif
                    @if (!$blog->author_id && $blog->autor)
                        {{Str::limit($blog->autor,26)}}
                    @endif
                    @if ($blog->author_id && $blog->autor)
                        {{Str::limit($blog->autor,12)}}&nbsp;/&nbsp;{{Str::limit($blog->author->nombre,12)}}
                    @endif
                </h2>
                <h2>
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
                </h2>
                <a href="{{ route('editarBlog', ['id'=>$blog->id]) }}"class="all_blogs_item_boton">
                    <div class="all_blogs_mueve"><i class="fas fa-pencil-alt icono_small_blogs"></i>&nbsp;&nbsp;&nbsp;Editar</div>
                </a>
            </div>
        @endforeach
    </div>
    <div class="all_blogs_derecha">
        <div class="all_blogs_paginacion">
            {{ $blogs->links()}} 
        </div>
    </div>
@endsection
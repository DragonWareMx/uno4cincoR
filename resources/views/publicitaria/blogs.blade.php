@extends('layouts.layoutPubli')

@section('header')
<title>Blogs | Editorial uno4cinco</title>
<link rel="stylesheet" type="text/css" href="/assets/css/style_SobreNosotros.css">
<link rel="stylesheet" type="text/css" href="/assets/css/blogs.css">
<link rel="stylesheet" type="text/css" href="/assets/css/tienda.css">
<link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Karla&display=swap" rel="stylesheet">
		<!-- Vendors-->
		<link rel="stylesheet" type="text/css" href="assetsTimer/vendors/bootstrap/grid.css">
		<link rel="stylesheet" type="text/css" href="assetsTimer/vendors/YTPlayer/css/jquery.mb.YTPlayer.min.css">
		<link rel="stylesheet" type="text/css" href="assetsTimer/vendors/vegas/vegas.min.css">
		<!-- App & fonts-->
		<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Work+Sans:300,400,500,700">
		<link rel="stylesheet" type="text/css" id="app-stylesheet" href="assetsTimer/css/main.css"><!--[if lt IE 9] -->
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            
        
@endsection

@section('content')
    <section class="section" id="about" style="width:100%; height:100%; background-color:#F2ECD5">
        {{-- TITTLE --}}
        <p class="txt-TitulosApartados">Blogs</p>
        <hr class="hr-Titulos-long">
        <hr class="hr-Titulos-small ">
        <br><br>



        {{-- Aquí va el carrusel, esprar a que agustín lo termine de diseñar --}}
        <div id="carruselBlogs_blogs" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                @php
                    $i=0; 
                @endphp
                @foreach ($bannerBlogs as $banner)
                    @if ($i==0)
                        <div class="carousel-item active" >
                            <div class="img_carrusel_blogs" style="background: url('{{asset('storage/banners/'.$banner->imagenPC)}}') center center no-repeat;
                                background-size: cover;
                                -moz-background-size: cover;
                                -o-background-size: cover;
                                -webkit-background-size: cover;">

                                <div class="banner_blog_fecha_blogs">
                                    {{$banner->blog->fecha}}
                                </div>
                                <div class="banner_blog_titulo_blogs">
                                    {{$banner->blog->titulo}}
                                </div>
                                {{-- Este de abajo lo metí en dos divs para centrarlo, ya tengo sueño perdón :C --}}
                                <div class="div_width_100_blogs">
                                    <div class="banner_blog_contenido_blogs">
                                        {{Str::limit($banner->blog->contenido,350)}}
                                    </div>
                                </div>
                                <div class="div_width_100_blogs">
                                    <a href="{{ route('blog', ['id' => $banner->blog_id])}}" class="banner_blog_boton_blogs">
                                        <div>Seguir leyendo &nbsp;<i class="fas fa-long-arrow-alt-right"></i></div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="carousel-item" >
                            <div class="img_carrusel_blogs" style="background: url('{{asset('storage/banners/'.$banner->imagenPC)}}') center center no-repeat;
                                background-size: cover;
                                -moz-background-size: cover;
                                -o-background-size: cover;
                                -webkit-background-size: cover;">

                                <div class="banner_blog_fecha_blogs">
                                    {{$banner->blog->fecha}}
                                </div>
                                <div class="banner_blog_titulo_blogs">
                                    {{$banner->blog->titulo}}
                                </div>
                                {{-- Este de abajo lo metí en dos divs para centrarlo, ya tengo sueño perdón :C --}}
                                <div class="div_width_100_blogs">
                                    <div class="banner_blog_contenido_blogs">
                                        {{Str::limit($banner->blog->contenido,350)}}
                                    </div>
                                </div>
                                <div class="div_width_100_blogs">
                                    <a href="{{ route('blog', ['id' => $banner->blog_id])}}" class="banner_blog_boton_blogs">
                                        <div>Seguir leyendo &nbsp;<i class="fas fa-long-arrow-alt-right"></i></div>
                                    </a>
                                </div>
                            </div>
                        </div>      
                    @endif
                    @php
                        $i++;
                    @endphp
                @endforeach
                <a class="carousel-control-prev flechasPosicion" data-target="#carruselBlogs_blogs" data-slide="prev" style="cursor: pointer; cursor:hand;">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next flechasPosicion" data-target="#carruselBlogs_blogs" data-slide="next" style="cursor: pointer; cursor:hand;">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
        

        <div class="blog_encabezado">
            Todas las entradas
            <form class="" action="{{ route('blogs', ['id' => 0])}}" method="GET" enctype="multipart/form-data">
                <div class="blog_barra_busqueda">
                    <select class="busqueda_clasificacion" name="clasificacion" id="tipos_blogs">
                        <option value="titulo">Titulo</option>
                        <option value="autor">Autor</option>
                        <option value="contenido">Contenido</option>
                        <option value="tags">Tags</option>
                    </select>
                    <input type="text" required id="busqueda_busqueda" class ="" name="busqueda">
                    <button type="submit" class="busqueda_boton">
                        <img class="imagen_busqueda_boton" src="{{asset('img/ico/search.png')}}" alt="">
                    </button>
                </div>
            </form>
        </div>
        <div class="blogs_barra">
            <div class="blogs_vista">
                @if (sizeOf($blogs)==0)
                    <div>No se encontraron resultados&nbsp;<i class="far fa-sad-cry"></i>&nbsp;<i class="fas fa-heart-broken"></i></div>
                @endif
                @foreach ($blogs as $blog)
                    <a href="{{ route('blog', ['id' => $blog->id])}}" class="blog_item">
                        <div class="blog_item_imagen" style="background: url('{{asset('storage/blogs/'.$blog->imagen)}}') center center no-repeat;
                                background-color:#717171;
                                background-size: cover;
                                -moz-background-size: cover;
                                -o-background-size: cover;
                                -webkit-background-size: cover;">
                            <div class="hover_blog_item_imagen">
                                <div class="leer_mas_boton_blog">
                                    Leer más
                                </div>
                            </div>
                        </div>
                        <div class="blog_info">
                            <div class="blog_info_titulo"> {{Str::limit($blog->titulo,44)}}</div>
                            <div class="blog_info_autor">
                                @if ($blog->author_id && !$blog->autor)
                                    {{Str::limit($blog->author->nombre,44)}}
                                @endif
                                @if (!$blog->author_id && $blog->autor)
                                    {{Str::limit($blog->autor,44)}}
                                @endif
                                @if ($blog->author_id && $blog->autor)
                                    {{Str::limit($blog->autor,21)}}&nbsp;/&nbsp;{{Str::limit($blog->author->nombre,21)}}
                                @endif
                            </div>
                            <div class="blog_info_fecha">
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
                        <div class="blog_info_contenido">
                            {!!Str::limit($blog->contenido,158)!!}
                        </div>
                    </a>
                @endforeach
                <div class="paginate-tienda">
                    <div style="width: fit-content; margin:auto;">
                    {{ $blogs->links() }}
                    </div>
                </div>
            </div>
            <div class="barra_lateral_blogs">
                <div class="barra_tags_principales">
                    @foreach ($tags as $tag)
                        @if ($tag->nombre=='Eventos')
                            <div style="height:25px;width:100%"><a href="{{ route('blogs', ['id' => $tag->id, 'tipo' => 'tag'])}}">Eventos</a></div>
                        @endif
                        @if ($tag->nombre=='Artículos')
                            <div style="width:100%"> <a href="{{ route('blogs', ['id' => $tag->id, 'tipo' => 'tag'])}}">Artículos</a></div>
                        @endif
                        @if ($tag->nombre=="Noticias")
                            <div style="width:100%"> <a href="{{ route('blogs', ['id' => $tag->id, 'tipo' => 'tag'])}}">Noticias</a></div>
                        @endif
                    @endforeach
                    <div style=" height:15px; width:100%"><a href="{{ route('blogs', ['id' => 0])}}">Todo</a></div>
                </div>
                <div class="barra_autores">
                    <p id="desaparecer" class="barra_autores_titulo">AUTORES<hr class="hr_barra_autores"></p>
                    @foreach ($authors2 as $author2)
                        @if ($author2->autor == 'Redacción')
                            <div style="width:100%; margin-bottom:15px;"><a href="{{ route('blogs', ['id'=>0 ,'nombre' => $author2->autor, 'tipo' => 'autor2'])}}">{{$author2->autor}}</a></div>
                        @endif
                    @endforeach
                    @foreach ($authors2 as $author2)
                        @if ($author2->autor != 'Redacción')
                            <div style="width:100%; margin-bottom:15px;"><a href="{{ route('blogs', ['id'=>0 ,'nombre' => $author2->autor, 'tipo' => 'autor2'])}}">{{$author2->autor}}</a></div>
                        @endif
                    @endforeach
                    @foreach ($authors as $author)
                        <div style="width:100%; margin-bottom:15px;"><a href="{{ route('blogs', ['id' => $author->id, 'tipo' => 'autor'])}}">{{$author->nombre}}</a></div>
                    @endforeach
                </div>
                <div id ="desaparecer" class="barra_autores">
                    <p class="barra_autores_titulo">TAGS<hr class="hr_barra_autores"></p>
                </div>
                <div class="barra_tags">
                    @foreach ($tags as $tag)
                        <div class="barra_tags_tags"><a href="{{ route('blogs', ['id' => $tag->id, 'tipo' => 'tag'])}}">#{{Str::limit($tag->nombre,11)}}</a></div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endsection
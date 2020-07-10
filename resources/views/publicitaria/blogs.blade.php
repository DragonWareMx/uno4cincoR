@extends('layouts.layoutPubli')

@section('header')
<title>Blogs | Editorial uno4cinco</title>
<link rel="stylesheet" type="text/css" href="/assets/css/style_SobreNosotros.css">
<link rel="stylesheet" type="text/css" href="/assets/css/blogs.css">
<link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Karla&display=swap" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="assetsTimer/fonts/fontawesome/font-awesome.min.css">
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
        <div id="carruselBlogs" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                @php
                    $i=0; 
                @endphp
                @foreach ($bannerBlogs as $banner)
                    @if ($i==0)
                        <div class="carousel-item active" >
                            <div class="img_carrusel banner_blogs" style="background: url('{{asset('storage/banners/'.$banner->imagenPC)}}') center center no-repeat;
                                background-size: cover;
                                -moz-background-size: cover;
                                -o-background-size: cover;
                                -webkit-background-size: cover;">

                                <div class="banner_blog_fecha">
                                    {{$banner->blog->fecha}}
                                </div>
                                <div class="banner_blog_titulo">
                                    {{$banner->blog->titulo}}
                                </div>
                                {{-- Este de abajo lo metí en dos divs para centrarlo, ya tengo sueño perdón :C --}}
                                <div class="div_width_100">
                                    <div class="banner_blog_contenido">
                                        {{Str::limit($banner->blog->contenido,350)}}
                                    </div>
                                </div>
                                <div class="div_width_100">
                                    <div class="banner_blog_boton">
                                        <div>Seguir leyendo &nbsp;<i class="fas fa-long-arrow-alt-right"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="carousel-item" >
                            <div class="img_carrusel banner_blogs" style="background: url('{{asset('storage/banners/'.$banner->imagenPC)}}') center center no-repeat;
                                background-size: cover;
                                -moz-background-size: cover;
                                -o-background-size: cover;
                                -webkit-background-size: cover;">

                                <div class="banner_blog_fecha">
                                    {{$banner->blog->fecha}}
                                </div>
                                <div class="banner_blog_titulo">
                                    {{$banner->blog->titulo}}
                                </div>
                                {{-- Este de abajo lo metí en dos divs para centrarlo, ya tengo sueño perdón :C --}}
                                <div class="div_width_100">
                                    <div class="banner_blog_contenido">
                                        {{Str::limit($banner->blog->contenido,350)}}
                                    </div>
                                </div>
                                <div class="div_width_100">
                                    <div class="banner_blog_boton">
                                        <div>Seguir leyendo &nbsp;<i class="fas fa-long-arrow-alt-right"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>      
                    @endif
                    @php
                        $i++;
                    @endphp
                @endforeach
                <a class="carousel-control-prev flechasPosicion" data-target="#carruselBlogs" data-slide="prev" style="cursor: pointer; cursor:hand;">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next flechasPosicion" data-target="#carruselBlogs" data-slide="next" style="cursor: pointer; cursor:hand;">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
        

        <div class="blog_encabezado">
            Todas las entradas
            <form class="" action="" method="GET" enctype="multipart/form-data">
                <div class="blog_barra_busqueda">
                    <select class="busqueda_clasificacion" name="clasificacion" id="tipos_blogs">
                        <option value="contenido">Contenido</option>
                        <option value="autor">Autor</option>
                        <option value="tag">Tag</option>
                    </select>
                    <input type="text" id="busqueda_busqueda" class ="" name="busqueda">
                    <button type="submit" class="busqueda_boton"><i class="fas fa-search"></i></button>
                </div>
            </form>
        </div>
        <div class="blogs_barra">
            <div class="blogs_vista">
                @foreach ($blogs as $blog)
                    <div class="blog_item">
                        <div class="blog_item_imagen" style="background: url('{{asset('storage/banners/'.$blog->imagen)}}') center center no-repeat;
                                background-size: cover;
                                -moz-background-size: cover;
                                -o-background-size: cover;
                                -webkit-background-size: cover;">
                            <div class="hover_blog_item_imagen">
                                <div class="leer_mas_boton_blog">
                                <a href="#">Leer más</a>
                                </div>
                            </div>
                        </div>
                        <div class="blog_info">
                            <div class="blog_info_titulo"> {{Str::limit($blog->titulo,44)}}</div>
                            @if ($blog->author_id && !$blog->autor)
                                {{Str::limit($blog->author->nombre,44)}}
                            @endif
                            @if (!$blog->author_id && $blog->autor)
                                {{Str::limit($blog->autor,44)}}
                            @endif
                            @if ($blog->author_id && $blog->autor)
                                {{Str::limit($blog->autor,21)}}&nbsp;/&nbsp;{{Str::limit($blog->author->nombre,21)}}
                            @endif
                            <br>
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
                        <div class="blog_info_contenido">
                            {{Str::limit($blog->contenido,176)}}
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="barra_lateral_blogs">
                
            </div>
        </div>
    </section>
@endsection
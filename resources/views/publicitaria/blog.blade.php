@extends('layouts.layoutPubli')

@section('header')
<title>Blogs | Editorial uno4cinco</title>
<link rel="stylesheet" type="text/css" href="/assets/css/style_SobreNosotros.css">
<link rel="stylesheet" type="text/css" href="/assets/css/style_Autores.css">
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
            <div id="fb-root"></div>
            <!--sdk facebook-->
            <script async defer crossorigin="anonymous" src="https://connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v7.0" nonce="sLvp9Nel"></script>
            
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    
@endsection

@section('content')
    <section class="section" id="about" style="width:100%; height:100%; background-color:#F2ECD5">
        {{-- TITTLE --}}
        <p class="txt-TitulosApartados">Blog</p>
        <hr class="hr-Titulos-long">
        <hr class="hr-Titulos-small ">
        <br><br>

        <div class="blog_encabezado">
           
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
            <div class="titulo_blog_txt">{{$blog->titulo}}</div>
                
                <div class="blog_item_imagen" style="background: url('{{asset('storage/blogs/'.$blog->imagen)}}') center center no-repeat;
                    background-size: cover;
                    -moz-background-size: cover;
                    -o-background-size: cover;
                    -webkit-background-size: cover;">
                </div>
                <div class="autor_blog_txt">Autor: {{$blog->autor}}</div>
                <div class="fecha_blog_txt">Fecha: 
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
                <div class="contenido_blog_txt">
                    {!!$blog->contenido!!}
                </div>
            </div>
            <div class="barra_lateral_blogs">
                <div class="barra_tags_principales">
                    @foreach ($tags as $tag)
                        @if ($tag->nombre=='Eventos')
                            <div style="width:100%"><a href="{{ route('blogs', ['id' => $tag->id, 'tipo' => 'tag'])}}">Eventos</a></div>
                        @endif
                        @if ($tag->nombre=='Artículos')
                            <div style="width:100%"> <a href="{{ route('blogs', ['id' => $tag->id, 'tipo' => 'tag'])}}">Artículos</a></div>
                        @endif
                        @if ($tag->nombre=="Noticias")
                            <div style="width:100%"> <a href="{{ route('blogs', ['id' => $tag->id, 'tipo' => 'tag'])}}">Noticias</a></div>
                        @endif
                    @endforeach
                    <div style="width:100%"><a href="{{ route('blogs', ['id' => 0])}}">Todo</a></div>
                </div>
                <div class="barra_autores">
                    <p id="desaparecer" class="barra_autores_titulo">MÁS DE ESTE AUTOR<hr class="hr_barra_autores"></p>
                    @foreach ($blogAutor as $blogsA)
                        <div style="width:100%; margin-bottom:15px;"><a href="{{ route('blogs', ['id' => $blogsA->id, 'tipo' => 'autor'])}}">{{$blogsA->titulo}}</a></div>
                    @endforeach
                </div>
                <div id ="desaparecer" class="barra_autores">
                    <p class="barra_autores_titulo">TAGS<hr class="hr_barra_autores"></p>
                </div>
                <div class="barra_tags">
                    @foreach ($blog->tags as $tag)
                        <div class="barra_tags_tags"><a href="{{ route('blogs', ['id' => $tag->id, 'tipo' => 'tag'])}}">#{{Str::limit($tag->nombre,21)}}</a></div>
                    @endforeach
                </div>
                <div id ="desaparecer" class="barra_autores">
                    <p class="barra_autores_titulo">COMPARTIR<hr class="hr_barra_autores"></p>
                </div>
                
                <div class="div_compartir_volver">
                
                <a href="https://www.facebook.com/sharer/sharer.php?u={{url()->current()}};src=sdkpreparse" target="_blank"><img src="{{ asset('img/ico/fb.png') }}" width="22px"></a>
                <a href="https://twitter.com/share?ref_src=twsrc%5Etfw" target="blank"><img src="{{ asset('img/ico/twt.png') }}" width="22px"></a>
                
                </div>
            
            </div>
        </div>
        <div class="div_contenidoBack2">
            <a class="btn_regresar" href="{{ route('blogs', ['id' => 0])}}">
                &nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-long-arrow-left fa-2x" aria-hidden="true"></i>
                <br>
                Regresar
            </a>
        </div>
        <br>
    </section>
@endsection
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
                        </div>
                        <div class="blog_info">
                            <div class="blog_info_titulo"> {{Str::limit($blog->titulo,44)}}</div>
                            {{Str::limit('autor autor autor autor',44)}}<br>
                            {{Str::limit($blog->fecha,44)}}
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="barra_lateral_blogs">
                
            </div>
        </div>
    </section>
@endsection
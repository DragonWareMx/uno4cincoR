@extends('layouts.layoutPubli')

@section('header')
<title>Tienda | Editorial uno4cinco</title>
<link rel="stylesheet" type="text/css" href="{{asset('/assets/css/style_SobreNosotros.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('/assets/css/blogs.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('/assets/css/tienda.css')}}">
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

<!--hoja de estilos-->
<link rel="stylesheet" href="{{ asset('assets/css/index.css') }}" type="text/css">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
                    
@endsection

@section('content')
    <section class="section" id="about" style="width:100%; height:100%; background-color:#F2ECD5">
        {{-- TITTLE --}}
        <p class="txt-TitulosApartados">Tienda | @yield('seccionTienda')</p>
        <hr class="hr-Titulos-long">
        <hr class="hr-Titulos-small ">
        <br><br>

        {{-- Aquí va el carrusel, esprar a que agustín lo termine de diseñar --}}
        @yield('carrusel')

        <div class="blog_encabezado">

            @yield('encabezadoTienda')
            
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

        @yield('contenidoTienda')
    </section>
@endsection
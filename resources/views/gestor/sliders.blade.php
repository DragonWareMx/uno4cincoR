@extends('layouts.menuGestor')

@section('importOwl')
    <link rel="stylesheet" href="{{ asset('assets/css/index.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/css/gestorSlider.css') }}" type="text/css">
    <script type="text/javascript" src='/assets/js/tags.js'></script>
    <link href="https://fonts.googleapis.com/css2?family=Karla&display=swap" rel="stylesheet">

@endsection

@section('contenido')
    <div class="all_sliders_80">
        <div class="all_sliders_menu_busqueda">
            <div class="h3 mb-0 text-gray-800"><a href="{{ route('verSliders') }}"> Sliders</a></div>
        </div>
    </div>
   <div class="all_sliders_contenido">
    <div class="title_index" style="">
        <h2 class="text_title_slider" style="">LIBROS</h2>
    </div>
    <a class="text_agregar" href="#">Agregar</a>
    
    <!--slider LIBROS-->
    <div id="carruselLibros" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            @php
                $i=0; 
            @endphp
            @foreach ($bannerLibros as $banner)
                @if ($i==0)
                    <div class="carousel-item active" >
                    <div class="transparente_libros">
                        <div id="img_carrusel" class="img_libros" style="background: url('{{asset('storage/banners/'.$banner->imagenPC)}}');
                            background-size: 100% 100%;
                            -moz-background-size: 100% 100%;
                            -o-background-size: 100% 100%;
                            -webkit-background-size: 100% 100%;">
                        </div>
                    
                    <a href="" id="boton_delete" class="boton_delete_libros">
                        <div class="all_sliders_mueve" style="">
                            <i class="fas fa-trash-alt icono_small_blogs"></i>&nbsp;&nbsp;&nbsp;Eliminar
                        </div>
                    </a>
                    </div>
                    </div>
                @else
                    <div class="carousel-item " >
                        <div class="transparente_libros">
                        <div id="img_carrusel" class="img_libros" style="background: url('{{asset('storage/banners/'.$banner->imagenPC)}}');
                            background-size: 100% 100%;
                            -moz-background-size: 100% 100%;
                            -o-background-size: 100% 100%;
                            -webkit-background-size: 100% 100%;">
                        </div>
                        
                        <a href="" id="boton_delete" class="boton_delete_libros">
                            <div class="all_sliders_mueve" style="">
                                <i class="fas fa-trash-alt icono_small_blogs"></i>&nbsp;&nbsp;&nbsp;Eliminar
                            </div>
                        </a>
                    </div>

                    </div>  
                @endif
                @php
                    $i++;
                @endphp
            @endforeach
            <a class="carousel-control-prev flechasPosicion" data-target="#carruselLibros" data-slide="prev" style="cursor: pointer; cursor:hand;">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next flechasPosicion" data-target="#carruselLibros" data-slide="next" style="cursor: pointer; cursor:hand;">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
    {{-- Fin slider libros --}}
    
    <div class="title_index" style="">
        <h2 class="text_title_slider" style="">AUTORES</h2>
    </div>
    <a class="text_agregar" href="#">Agregar</a>
    
    <!--SLIDER AUTORES-->
    <div id="carruselAutores" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            @php
                $i=0; 
            @endphp
            @foreach ($bannerAutores as $banner)
                @if ($i==0)
                    
                    <div class="carousel-item active" >
                        <div class="transparente_autores">
                        <div class="img_autores" id="img_carrusel" style="background: url('{{asset('storage/banners/'.$banner->imagenPC)}}');
                            background-size: 100% 100%;
                            -moz-background-size: 100% 100%;
                            -o-background-size: 100% 100%;
                            -webkit-background-size: 100% 100%;">
                        </div>
                        <a href="" id="boton_delete" class="boton_delete_autores">
                            <div class="all_sliders_mueve" style="">
                                <i class="fas fa-trash-alt icono_small_blogs"></i>&nbsp;&nbsp;&nbsp;Eliminar
                            </div>
                        </a>
                    </div>    
                    </div>
                @else
                    <div class="carousel-item" >
                        <div class="transparente_autores">
                        <div class="img_autores" id="img_carrusel" style="background: url('{{asset('storage/banners/'.$banner->imagenPC)}}');
                            background-size: 100% 100%;
                            -moz-background-size: 100% 100%;
                            -o-background-size: 100% 100%;
                            -webkit-background-size: 100% 100%;">
                        </div>
                        <a href="" id="boton_delete" class="boton_delete_autores">
                            <div class="all_sliders_mueve" style="">
                                <i class="fas fa-trash-alt icono_small_blogs"></i>&nbsp;&nbsp;&nbsp;Eliminar
                            </div>
                        </a>
                        </div>
                    </div>      
                @endif
                @php
                    $i++;
                @endphp
            @endforeach
            <a class="carousel-control-prev flechasPosicion" data-target="#carruselAutores" data-slide="prev" style="cursor: pointer; cursor:hand;">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next flechasPosicion" data-target="#carruselAutores" data-slide="next" style="cursor: pointer; cursor:hand;">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>

    <div class="title_index" style="">
        <h2 class="text_title_slider" style="">BLOGS</h2>
    </div>
    <a class="text_agregar" href="#">Agregar</a>

    {{-- Slider de Blogs --}}
    <div id="carruselBlogs" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            @php
                $i=0; 
            @endphp
            @foreach ($bannerBlogs as $banner)
                @if ($i==0)
                    <div class="carousel-item active" >
                        <div class="transparente_blogs">
                        <div id="img_carrusel" class="img_blog banner_blogs" style="background: url('{{asset('storage/banners/'.$banner->imagenPC)}}') center center no-repeat;
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
                            <a href="{{ route('blog', ['id' => $banner->blog->id])}}">
                            <div class="div_width_100">
                            </div>
                            </a>
                        </div>
                        <a href="" id="boton_delete" class="boton_delete_blogs">
                            <div class="all_sliders_mueve" style="">
                                <i class="fas fa-trash-alt icono_small_blogs"></i>&nbsp;&nbsp;&nbsp;Eliminar
                            </div>
                        </a>
                        </div>
                    </div>
                @else
                    <div class="carousel-item" >
                        <div class="transparente_blogs">
                        <div id="img_carrusel" class="img_blog banner_blogs" style="background: url('{{asset('storage/banners/'.$banner->imagenPC)}}') center center no-repeat;
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
                            <a href="{{ route('blog', ['id' => $banner->blog->id])}}">
                            <div class="div_width_100">
                            </div>
                            </a>
                        </div>
                        <a href="" id="boton_delete" class="boton_delete_blogs">
                            <div class="all_sliders_mueve" style="">
                                <i class="fas fa-trash-alt icono_small_blogs"></i>&nbsp;&nbsp;&nbsp;Eliminar
                            </div>
                        </a>
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
</div>

<script type="text/javascript">
    var clickBotonLibro=false;
    
    $(document).ready(function() {
        $('.transparente_libros').on ('click', function(){
            if(clickBotonLibro){
                $('.boton_delete_libros').hide();  
                $('.img_libros').css('opacity','1');
                clickBotonLibro=false;  
            }
            else{
                $('.boton_delete_libros').show();
                $('.img_libros').css('opacity','0.6');
                clickBotonLibro=true;
                
                
            }
        });

        $('.transparente_autores').on ('click', function(){
            if(clickBotonLibro){
                $('.boton_delete_autores').hide();  
                clickBotonLibro=false;  
                $('.img_autores').css('opacity','1');

            }
            else{
                $('.boton_delete_autores').show();
                clickBotonLibro=true;
                $('.img_autores').css('opacity','0.6');
                
            }
        });

        $('.transparente_blogs').on ('click', function(){
            if(clickBotonLibro){
                $('.boton_delete_blogs').hide();  
                clickBotonLibro=false;  
                $('.img_blog').css('opacity','1');

            }
            else{
                $('.boton_delete_blogs').show();
                clickBotonLibro=true;
                $('.img_blog').css('opacity','0.6');
                
            }
        });
    });

</script>
@endsection
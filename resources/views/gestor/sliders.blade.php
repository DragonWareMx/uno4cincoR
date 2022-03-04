@extends('layouts.menuGestor')

@section('importOwl')
    <link rel="stylesheet" href="{{ asset('assets/css/index.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/css/gestorSlider.css') }}" type="text/css">
    <script type="text/javascript" src='/assets/js/tags.js'></script>
    <link href="https://fonts.googleapis.com/css2?family=Karla&display=swap" rel="stylesheet">

@endsection
@section('menu')
    Publicidad
@endsection
@section('contenido')
@if (session()->has('success'))
    <script>
        alert('Ya hay 5 banners en este carrusel. Elimina uno e intenta de nuevo');
    </script>
@endif
@if (session()->has('success2'))
    <script>
        alert('No puedes eliminar más banners. Debe haber al menos 1');
    </script>
@endif
    
    <div class="all_sliders_contenido">
    <a class="text_agregar" style="margin:0px 20px 0px 0px !important; width:100%; text-align:right" href="{{ route('nuevoSlider', ['tipo' => 'libro'])}}">Agregar</a>
    <p style="width:100%">El Slider más nuevo es el que será mostrado en el inicio de la página. Click sobre un slider para eliminarlo</p>
    <!--slider LIBROS-->
    <div id="carruselLibros" class="carousel slide" data-ride="carousel" style="margin-bottom:60px !important">
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
                            Slider página de inicio
                            <form action="{{ route('editarSlider', ['id'=>$banner->id])}}" method="post">
                                @csrf
                                @method('patch')
                                <input type="submit" id="boton_delete" class="boton_delete_libros" value="Eliminar">
                            </form>
                        
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
                        <form action="{{ route('editarSlider', ['id'=>$banner->id])}}" method="post">
                            @csrf
                            @method('patch')
                            <input type="submit" id="boton_delete" class="boton_delete_libros" value="Eliminar">
                        </form>  
                    </div>

                    </div>  
                @endif
                @php
                    $i++;
                @endphp
            @endforeach
            <a class="carousel-control-prev flechasPosicion newPosition" data-target="#carruselLibros" data-slide="prev" style="cursor: pointer; cursor:hand;">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next flechasPosicion newPosition" data-target="#carruselLibros" data-slide="next" style="cursor: pointer; cursor:hand;">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
    {{-- Fin slider libros --}}
    
    <!-- <div class="title_index" style="">
        <h2 class="text_title_slider" style="">AUTORES</h2>
    </div>
    
    <!--SLIDER AUTORES-->
    <!-- <div id="carruselAutores" class="carousel slide" data-ride="carousel">
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
                        <form action="{{ route('editarSlider', ['id'=>$banner->id])}}" method="post">
                            @csrf
                            @method('patch')
                            <input type="submit" id="boton_delete" class="boton_delete_autores" value="Eliminar">
                        </form>
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
                        <form action="{{ route('editarSlider', ['id'=>$banner->id])}}" method="post">
                            @csrf
                            @method('patch')
                            <input type="submit" id="boton_delete" class="boton_delete_autores" value="Eliminar">
                        </form>
                        </div>
                    </div>      
                @endif
                @php
                    $i++;
                @endphp
            @endforeach
            <a class="carousel-control-prev flechasPosicion newPosition" data-target="#carruselAutores" data-slide="prev" style="cursor: pointer; cursor:hand;">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next flechasPosicion newPosition" data-target="#carruselAutores" data-slide="next" style="cursor: pointer; cursor:hand;">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div> -->



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
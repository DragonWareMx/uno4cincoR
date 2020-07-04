@extends('layouts.layoutPubli')

@section('header')
<title>Inicio | Editorial uno4cinco</title>
<!--hoja de estilos-->
<link rel="stylesheet" href="{{ asset('assets/css/index.css') }}" type="text/css">
<!--BOOTSTRAP-->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="assetsTimer/fonts/fontawesome/font-awesome.min.css">

		<!-- Vendors-->
		<link rel="stylesheet" type="text/css" href="assetsTimer/vendors/bootstrap/grid.css">
		<link rel="stylesheet" type="text/css" href="assetsTimer/vendors/YTPlayer/css/jquery.mb.YTPlayer.min.css">
		<link rel="stylesheet" type="text/css" href="assetsTimer/vendors/vegas/vegas.min.css">
        <!-- App & fonts-->
        <link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Karla&display=swap" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Work+Sans:300,400,500,700">
		<link rel="stylesheet" type="text/css" id="app-stylesheet" href="assetsTimer/css/main.css"><!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
@endsection

@section('content')
<!-- ***** Welcome Area Start ***** -->
<div class="page-wrap" id="root">
    <!-- Content-->
    <!-- hero -->
    <div class="" style="background-color: #83D7B5; width:100%;"> 
        <div class="container">
            <div class="hero__wrapper">
                    <div class="row" style="">
                        <div class="col-lg-10 col-xs-offset-0 col-sm-offset-0 col-md-offset-0 col-lg-offset-1 "  >
                            <div class="hero__title_inner" ><img src="{{ asset('img/logos/logo.png') }}" alt="" srcset="">
                                <br>
                                <br>
                                <h4 id="viledruid" class="hero__text" style="color: #1D2120; font-family:Karla;">Para todas, arte.</h4>
                                <br>
                                <div class="mesita_escondida" style=""> <img src="{{ asset('img/logos/escritorio.png') }}" style="width:100%"></div> 
                                <h4 id="viledruid" class="hero__text" style="color:white; font-family:Karla">Pronto estaremos contigo</h4>
                                <div id="clocki" class="countdown__module hide" data-date="2020/8/13" style="">
                                    <p><span>%D</span> Días</p>
                                    <p><span>%H</span> Horas</p>
                                    <p><span>%M</span> Minutos</p>
                                </div><!-- End / countdown__module hide undefined -->         
                            </div>
                              
                        </div>
                    </div>

            </div>
        </div>
        <div class="mesita" style=""> <img src="{{ asset('img/logos/escritorio.png') }}" style="width:100%"></div> 
    </div><!-- End / hero -->
        <!--comienza div de banners y sliders-->
    <div id="div_contenido" class="md-content" style="">
        <div class="title_index" style="">
            <h2 class="text_title" style="">LIBROS</h2>
        </div>
            <!--slider LIBROS-->
            <div class="cajaBannerLibros" style="">
            <div id="carruselLibros" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                      <li id="carrusel_indic" data-target="#carruselLibros" data-slide-to="0" class="active" style=""></li>
                      <li id="carrusel_indic" data-target="#carruselLibros" data-slide-to="1" style=""></li>
                      <li id="carrusel_indic" data-target="#carruselLibros" data-slide-to="2" style=""></li>
                      <li id="carrusel_indic" data-target="#carruselLibros" data-slide-to="3" style=""></li>
                    </ol>
                    <div class="carousel-inner">
                        @php
                        $i=0; 
                        @endphp
                        @foreach ($bannerLibros as $banner)
                        @if ($i==0)
                            <div id='{{$banner->idRelacion}}' class="carousel-item active img_carrusel" style="background: url('{{asset('storage/banners/'.$banner->imagenPC)}}');
                                background-size: 100% 100%;
                                -moz-background-size: 100% 100%;
                                -o-background-size: 100% 100%;
                                -webkit-background-size: 100% 100%;">
                            </div>
                        @else
                            <div id='{{$banner->idRelacion}}' class="carousel-item img_carrusel" style="background: url('{{asset('storage/banners/'.$banner->imagenPC)}}');
                                background-size: 100% 100%;
                                -moz-background-size: 100% 100%;
                                -o-background-size: 100% 100%;
                                -webkit-background-size: 100% 100%;">
                            </div>    
                        @endif
                        @php
                            $i++;
                        @endphp
                        @endforeach
                    <a class="carousel-control-prev" data-target="#carruselLibros" data-slide="prev" style="cursor: pointer; cursor:hand;">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                      </a>
                      <a class="carousel-control-next" data-target="#carruselLibros" data-slide="next" style="cursor: pointer; cursor:hand;">
                          <span class="carousel-control-next-icon" aria-hidden="true"></span>
                          <span class="sr-only">Next</span>
                      </a>
                    </div>
                    
                    
                    <div class="slider_footer" style="">
                    </div>

                    <!--div pestaña detalles libro-->
                    <div class="details_libro" style="">
                        <img id="portada_libro" src="{{ asset('storage/libros/aless.png') }}" alt="" srcset="" style="width:140px; height:138px; margin-left:10px; margin-right:10px">
                        <div id="details_content1" class="details_content" style="">
                            <p id="titulo_txt" class="details_txt" style="">Título: 
                            <span class="details_data" style="" name="details_title_libro">Desordenes de la memoria</span></p>
                            
                            <p id="autor_txt" class="details_txt" style="">Autor:
                                <span class="details_data" style="" name="details_autor_libro">Aless Segovia</span>
                            </p>
                            <p id="sello_txt" class="details_txt" style="">Sello:
                                <span class="details_data" style="" name="details_sello_libro">Uno4cinco</span>
                            </p>  
                        </div>
                        <div id="details_content2" class="details_content" style="">
                            <p id="genero_txt" class="details_txt" >Género:
                                <span class="details_data" style="" name="details_genero_libro">Poesía</span>
                            </p>
                            
                            <p id="tipo_txt" class="details_txt">Tipo:
                                <span class="details_data" style="" name="details_tipo_libro">Digital/Papel</span>
                            </p>
                            <p id="precio_txt" class="details_txt">Precio:
                                <span class="details_data" style="" name="details_precio_libro">$</span>
                            </p>
                        </div>
                        <div class="btn_details" >
                            <p class="btn_txt" style="">Comprar</p>
                        </div>
                    </div> 
                    
                    <!--pestaña click-->
                    <div class="pestana_details" style= "display:flex; justify-content:center" name="details_libro">
                        <img src="{{ asset('img/ico/menu.png') }}" style="width:30%;">
                        <p class="pestana_txt" style="text-align: center; font-family: Abril Fatface; color:white">
                        </p>    
                    </div>
            </div>
        </div>  

        <!--CARRUSEL ESCONDIDO LIBROS-->
        <div class="cajaBannerLibrosHide" style="">
            <div id="carruselLibrosHide" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                      <li id="carrusel_indic" data-target="#carruselLibrosHide" data-slide-to="0" class="active" style=""></li>
                      <li id="carrusel_indic" data-target="#carruselLibrosHide" data-slide-to="1" style=""></li>
                      <li id="carrusel_indic" data-target="#carruselLibrosHide" data-slide-to="2" style=""></li>
                      <li id="carrusel_indic" data-target="#carruselLibrosHide" data-slide-to="3" style=""></li>
                    </ol>
                    <div class="carousel-inner">
                        @php
                        $i=0; 
                        @endphp
                        @foreach ($bannerLibros as $banner)
                        @if ($i==0)
                            <div id='{{$banner->idRelacion}}' class="carousel-item active img_carrusel" style="background: url('{{asset('storage/banners/'.$banner->imagenCell)}}');
                                background-size: 100% 100%;
                                -moz-background-size: 100% 100%;
                                -o-background-size: 100% 100%;
                                -webkit-background-size: 100% 100%;">
                            </div>
                        @else
                            <div id='{{$banner->idRelacion}}' class="carousel-item img_carrusel" style="background: url('{{asset('storage/banners/'.$banner->imagenCell)}}');
                                background-size: 100% 100%;
                                -moz-background-size: 100% 100%;
                                -o-background-size: 100% 100%;
                                -webkit-background-size: 100% 100%;">
                            </div>    
                        @endif
                        @php
                            $i++;
                        @endphp
                        @endforeach
                    <a class="carousel-control-prev" data-target="#carruselLibrosHide" data-slide="prev" style="cursor: pointer; cursor:hand;">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                      </a>
                      <a class="carousel-control-next" data-target="#carruselLibrosHide" data-slide="next" style="cursor: pointer; cursor:hand;">
                          <span class="carousel-control-next-icon" aria-hidden="true"></span>
                          <span class="sr-only">Next</span>
                      </a>
                    </div>
                    
                    
                    <div class="slider_footer" style="">
                    </div>

                    <!--div pestaña detalles libro-->
                    <div class="details_libro" style="">
                        <img id="portada_libroHide" src="{{ asset('storage/libros/aless.png') }}" alt="" srcset="" style="width:140px; height:138px; margin-left:10px; margin-right:10px">
                        <div id="details_content1" class="details_content" style="">
                            <p id="titulo_txt" class="details_txt" style="">Título: 
                            <span class="details_data" style="" name="details_title_libro">Desórdenes de la memoria</span></p>
                            
                            <p id="autor_txt" class="details_txt" style="">Autor:
                                <span class="details_data" style="" name="details_autor_libro">Aless Segovia</span>
                            </p>
                            <p id="sello_txt" class="details_txt" style="">Sello:
                                <span class="details_data" style="" name="details_sello_libro">Uno4cinco</span>
                            </p>  
                        </div>
                        <div id="details_content2" class="details_content" style="">
                            <p id="genero_txt" class="details_txt" >Género:
                                <span class="details_data" style="" name="details_genre_libro">Poesía</span>
                            </p>
                            
                            <p id="tipo_txt" class="details_txt">Tipo:
                                <span class="details_data" style="" name="details_tipo_libro">Digital/Papel</span>
                            </p>
                            <p id="precio_txt" class="details_txt">Precio:
                                <span class="details_data" style="" name="details_precio_libro">$</span>
                            </p>
                        </div>
                        <div class="btn_details" >
                            <p class="btn_txt" style="">Comprar</p>
                        </div>
                    </div> 
                    
                    <!--pestaña click-->
                    <div class="pestana_details" style= "display:none; justify-content:center" name="details_libro">
                        <img src="{{ asset('img/ico/menu.png') }}" style="width:30%;">
                    </div>
            </div>
        </div>  

        <!--FIN CARRUSEL ESCONDIDO-->



        <div class="title_index" style="">
            <h2 class="text_title" style="">AUTORES</h2>
        </div>
        <!--SLIDER AUTORES-->
        <div class="cajaBannerAutores" style="">
            <div id="carruselAutores" class="carousel slide" data-ride="carousel" style="">
                    <ol class="carousel-indicators">
                      <li id="carrusel_indic" data-target="#carruselAutores" data-slide-to="0"></li>
                      <li id="carrusel_indic" data-target="#carruselAutores" data-slide-to="1"></li>
                      <li id="carrusel_indic" data-target="#carruselAutores" data-slide-to="2"></li>
                      <li id="carrusel_indic" data-target="#carruselAutores" data-slide-to="3"></li>
                    </ol>
                    <div class="carousel-inner">
                        @php
                        $i=0; 
                        @endphp
                        @foreach ($bannerAutores as $banner)
                        @if ($i==0)
                            <div id='{{$banner->idRelacion}}' class="img_carrusel carousel-item active " style="background: url('{{asset('storage/banners/'.$banner->imagenPC)}}');background-position: center center !important;
                                background-size: 100% 100%;
                                -moz-background-size: 100% 100%;
                                -o-background-size: 100% 100%;
                                -webkit-background-size: 100% 100%;">
                            </div>
                        @else
                            <div id='{{$banner->idRelacion}}' class="carousel-item img_carrusel" style="background: url('{{asset('storage/banners/'.$banner->imagenPC)}}');
                                background-size: 100% 100%;
                                -moz-background-size: 100% 100%;
                                -o-background-size: 100% 100%;
                                -webkit-background-size: 100% 100%;">
                            </div>    
                        @endif
                        @php
                            $i++;
                        @endphp
                        @endforeach
                    <a class="carousel-control-prev" data-target="#carruselAutores" data-slide="prev" style="cursor: pointer; cursor:hand;">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                      </a>
                      <a class="carousel-control-next" data-target="#carruselAutores" data-slide="next" style="cursor: pointer; cursor:hand;">
                          <span class="carousel-control-next-icon" aria-hidden="true"></span>
                          <span class="sr-only">Next</span>
                      </a>
                    </div>
                    <div class="slider_footer" style="position: relative;
                    width: 1294px;
                    height: 25px;
                    top: 356px;">
                    </div>

                    <!--pestaña detalles autor-->
                    <div class="details_autor" style="">
                        
                        <div class="detailsAutor_content" style="">
                            <img id="portada_libro_autor" class="img_libro_aut" src="{{ asset('storage/libros/aless.png') }}" alt="" srcset="" style="">
                            <div id="details_content3" class=detailsAutor_txt>
                            <p class="details_txt" >Título:
                                <span class="details_data" style="" name="details_title_autor">Desórdenes de la memoria</span>
                            </p>
                            <p class="details_txt" >Género:
                                <span class="details_data" style="" name="details_genre_autor">Poesía</span>
                            </p>
                            <p class="details_txt" >Precio:
                                <span class="details_data" style="" name="details_precio_autor">$</span>
                            </p>
                            </div>
                            <div class="btn_details_autor" >
                                <p class="btn_txt2" style="">Comprar</p>
                            </div> 
                        </div>
                        
                    </div> 
                    
                    <div class="pestana_details_autor" style= "display:none; justify-content:center" name="details_autor">
                         <img src="{{ asset('img/ico/menu.png') }}" style="width:30%;">
                        
                    </div>
            </div>
    </div>
    <!--slider ESCONDIDO AUTORES-->
    <div class="cajaBannerAutoresHide" style="">
        <div id="carruselAutoresHide" class="carousel slide" data-ride="carousel" style="">
                <ol class="carousel-indicators">
                  <li id="carrusel_indic" data-target="#carruselAutoresHide" data-slide-to="0"></li>
                  <li id="carrusel_indic" data-target="#carruselAutoresHide" data-slide-to="1"></li>
                  <li id="carrusel_indic" data-target="#carruselAutoresHide" data-slide-to="2"></li>
                  <li id="carrusel_indic" data-target="#carruselAutoresHide" data-slide-to="3"></li>
                </ol>
                <div class="carousel-inner">
                    @php
                    $i=0; 
                    @endphp
                    @foreach ($bannerAutores as $banner)
                    @if ($i==0)
                        <div id='elemento' class="img_carrusel carousel-item active " style="background: url('{{asset('storage/banners/'.$banner->imagenCell)}}');background-position: center center !important;
                            background-size: 100% 100%;
                            -moz-background-size: 100% 100%;
                            -o-background-size: 100% 100%;
                            -webkit-background-size: 100% 100%;">
                        </div>
                    @else
                        <div id='elemento' class="carousel-item img_carrusel" style="background: url('{{asset('storage/banners/'.$banner->imagenCell)}}');
                            background-size: 100% 100%;
                            -moz-background-size: 100% 100%;
                            -o-background-size: 100% 100%;
                        -webkit-background-size: 100% 100%;">
                        </div>    
                    @endif
                    @php
                        $i++;
                    @endphp
                    @endforeach
                <a class="carousel-control-prev" data-target="#carruselAutoresHide" data-slide="prev" style="cursor: pointer; cursor:hand;">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                  </a>
                  <a class="carousel-control-next" data-target="#carruselAutoresHide" data-slide="next" style="cursor: pointer; cursor:hand;">
                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                      <span class="sr-only">Next</span>
                  </a>
                </div>
                <div class="slider_footer" style="position: relative;
                width: 1294px;
                height: 25px;
                top: 356px;">
                </div>

                <!--pestaña detalles autor-->
                <div class="details_autor" style="">
                    
                    <div class="detailsAutor_content" style="">
                        <img class="img_libro_aut" src="{{ asset('img/portada.jpg') }}" alt="" srcset="" style="">
                        <div id="details_content3" class=detailsAutor_txt>
                        <p class="details_txt" >Título:
                            <span class="details_data" style="" name="details_title_autor">Cuaderno de ensayo</span>
                        </p>
                        <p class="details_txt" >Género:
                            <span class="details_data" style="" name="details_genre_autor">Ensayo</span>
                        </p>
                        <p class="details_txt" >Precio:
                            <span class="details_data" style="" name="details_precio_autor">$200</span>
                        </p>
                        </div>
                        <div class="btn_details_autor" >
                            <p class="btn_txt2" style="">Comprar</p>
                        </div> 
                    </div>
                    
                </div> 
                
                <div class="pestana_details_autor" style= "display:none; justify-content:center" name="details_autor">
                     <img src="{{ asset('img/ico/menu.png') }}" style="width:30%;">
                    <p class="pestana_txt_autor" style="">
                    </p>
                </div>
        </div>
</div>
<!--FIN ESLIDER ESCONDIDO AUTORES-->
    <!--script para mostrar pestañas de detalles-->
    <script type="text/javascript">
        var clickLibro=false;
        var clickAutor=false;
        var idLibros;
        var idLibros2;
        var idAutores;
        var books = @json($libros);
        var autor =@json($autores);
        var imagen =@json($imagenes);
        //oski mañana trabaja en esto (que funcione con varios libros y autores)
        var banners =@json($bannerLibros);
        var matrizLibros;

        $(document).ready(function() {
        
        

            $('[name=details_libro]').on('click', function () {

                if(clickLibro){  
                    clickLibro=false;
                    $('.details_libro').hide();
                    $('.cajaBannerLibros').css({'margin-bottom':'75px', 'height':''});
                    $('.cajaBannerLibrosHide').css({'margin-bottom':'75px', 'height':''});
                }   
                else{
                
                    clickLibro=true;
                    $('.cajaBannerLibros').css({'margin-bottom':'250px','height':''});
                    $('.cajaBannerLibrosHide').css({'margin-bottom':'250px','height':''});
                    $('.details_libro').css({ "display": "flex", "flex-direction": "row" });
                    $('.details_libro').show();
                    
                    $('#carruselLibros').on('slid.bs.carousel', function() {
                
                    idLibros = $('div.active').index();
           
                   $('[name=details_title_libro]').html(books[idLibros]['titulo']);
                   $('[name=details_autor_libro]').html(autor[idLibros]['nombre']);
                    $('#portada_libro').attr('src','storage/libros/'+imagen[idLibros]['imagen']);   
                
           
               });
                    
                }
                    
                           
            });

            $('[name=details_autor]').on('click', function () {
                
                if(clickAutor){  
                    clickAutor=false;
                    $('.details_autor').hide();
                    $('.cajaBannerAutores').css({'margin-bottom':'75px', 'height':''});
                    $('.cajaBannerAutoresHide').css({'margin-bottom':'75px', 'height':''});
                }   
                else{
                   
                    clickAutor=true;
                    $('.cajaBannerAutores').css({'margin-bottom':'250px','height':''});
                    $('.cajaBannerAutoresHide').css({'margin-bottom':'250px','height':''});
                    $('.details_autor').css({ "display": "flex", "flex-direction": "row", "justify-content":"center",});
                    $('.details_autor').show();
                    
                }      
            });
        });
    </script>
 </div>
<!-- End / Content-->
<!-- Vendors-->
<script type="text/javascript" src="assetsTimer/vendors/jquery/jquery.min.js"></script>
<script type="text/javascript" src="assetsTimer/vendors/jquery.countdown/jquery.countdown.min.js"></script>
<script type="text/javascript" src="assetsTimer/vendors/flat-surface-shader/fss.min.js"></script>
<script type="text/javascript" src="assetsTimer/vendors/particles.js/particles.js"></script>
<script type="text/javascript" src="assetsTimer/vendors/waterpipe/waterpipe.js"></script>
<script type="text/javascript" src="assetsTimer/vendors/quietflow/quietflow.min.js"></script>
<script type="text/javascript" src="assetsTimer/vendors/YTPlayer/jquery.mb.YTPlayer.min.js"></script>
<script type="text/javascript" src="assetsTimer/vendors/vegas/vegas.min.js"></script>
<!-- App-->
<script type="text/javascript" src="assetsTimer/js/main.js"></script>
@endsection
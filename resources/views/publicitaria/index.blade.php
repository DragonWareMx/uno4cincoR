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
    <div class="" style="background-color: #83D7B5"> 
        <div class="container">
            <div class="hero__wrapper">
                    <div class="row">
                        <div class="col-lg-10 col-xs-offset-0 col-sm-offset-0 col-md-offset-0 col-lg-offset-1 ">
                            <div class="hero__title_inner"><img src="{{ asset('img/logos/logo.png') }}" alt="" srcset="">
                                <br>
                                <br>
                                <h4 class="hero__text" style="color:black">Los mejores libros, a la puerta de tu casa, siempre</h4>
                                <br>
                                <h4 class="hero__text" style="color:white">Pronto estaremos contigo</h4>
                                <div class="countdown__module hide" data-date="2020/8/13">
                                    <p><span>%D</span> Días</p>
                                    <p><span>%H</span> Horas</p>
                                    <p><span>%M</span> Minutos</p>
                                </div><!-- End / countdown__module hide undefined -->   
                            </div>
                        </div>
                    </div>
            </div>
                <div style="position: absolute; width:502px; height:216px; top: 410px; left: 50px"> <img src="{{ asset('img/logos/escritorio.png') }}"></div>      
        </div>
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
                    </ol>
                    <div class="carousel-inner">
                      <div class="carousel-item active" style="background: url('{{asset('img/prueba1.jpg')}}');
                        background-position: center center !important;
                        background-size: cover;
                        -moz-background-size: cover;
                        -o-background-size: cover;
                        -webkit-background-size: cover;
                        height:356px;">
                      </div>
                      <div class="carousel-item" style="background: url('{{asset('img/prueba2.jpg')}}');
                      background-position: center center !important;
                      background-size: cover;
                      -moz-background-size: cover;
                      -o-background-size: cover;
                      -webkit-background-size: cover;
                      height:356px;">
                      </div>
                      <div class="carousel-item" style="background: url('{{asset('img/prueba3.jpg')}}');
                      background-position: center center !important;
                      background-size: cover;
                      -moz-background-size: cover;
                      -o-background-size: cover;
                      -webkit-background-size: cover;
                      height:356px;">
                      </div>
                    </div>
                    <a class="carousel-control-prev" href="#carruselLibros"  data-slide="prev">
                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                      <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carruselLibros" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                    
                    <div class="slider_footer" style="">
                    </div>

                    <!--div pestaña detalles libro-->
                    <div class="details_libro" style="">
                        <img src="{{ asset('img/portada.jpg') }}" alt="" srcset="" style="widht:128px; height:138px; margin-left:10px; margin-right:10px">
                        <div class="details_content" style="">
                            <p class="details_txt" style="">Título: 
                            <span class="details_data" style="" name="details_title">Cuaderno de ensayo</span></p>
                            
                            <p class="details_txt" style="">Autor:
                                <span class="details_data" style="" name="details_title">José Agustín Solórzano</span>
                            </p>
                            <p class="details_txt" style="">Sello:
                                <span class="details_data" style="" name="details_title">Uno4cinco</span>
                            </p>  
                        </div>
                        <div class="details_content" style="">
                            <p class="details_txt" >Género:
                                <span class="details_data" style="" name="details_title">Ensayo</span>
                            </p>
                            
                            <p class="details_txt">Tipo:
                                <span class="details_data" style="" name="details_title">Digital/Papel</span>
                            </p>
                            <p class="details_txt">Precio:
                                <span class="details_data" style="" name="details_title">$200</span>
                            </p>
                        </div>
                        <div class="btn_details" >
                            <p style="text-align:center; font-family: Karla;
                            font-style: normal;
                            font-weight: bold;
                            font-size: 18px;
                            line-height: 21px;
                            color:black">Comprar</p>
                        </div>
                    </div> 
                    
                    <!--pestaña click-->
                    <div class="pestana_details" style= "" name="details_libro">
                        <p class="pestana_txt" style="text-align: center; font-family: Abril Fatface; color:white">
                            más
                        </p>    
                    </div>
            </div>
        </div>  

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
                    </ol>
                    <div class="carousel-inner">
                      <div class="carousel-item active" style="background: url('{{asset('img/prueba1.jpg')}}');
                        background-position: center center !important;
                        background-size: cover;
                        -moz-background-size: cover;
                        -o-background-size: cover;
                        -webkit-background-size: cover;
                        height:356px;">
                      </div>
                      <div class="carousel-item" style="background: url('{{asset('img/prueba2.jpg')}}');
                      background-position: center center !important;
                      background-size: cover;
                      -moz-background-size: cover;
                      -o-background-size: cover;
                      -webkit-background-size: cover;
                      height:356px;">
                      </div>
                      <div class="carousel-item" style="background: url('{{asset('img/prueba3.jpg')}}');
                      background-position: center center !important;
                      background-size: cover;
                      -moz-background-size: cover;
                      -o-background-size: cover;
                      -webkit-background-size: cover;
                      height:356px;">
                      </div>
                    </div>
                    <a class="carousel-control-prev" href="#carruselAutores"  data-slide="prev">
                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                      <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carruselAutores" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    </a>
                    <div class="slider_footer" style="position: relative;
                    width: 1294px;
                    height: 25px;
                    top: 356px;">
                    </div>

                    
                    <div class="details_autor" style="">
                        
                        <div class="detailsAutor_content" style="">
                            <img class="img_libro_aut" src="{{ asset('img/portada.jpg') }}" alt="" srcset="" style="">
                            <div class=detailsAutor_txt>
                            <p class="details_txt" >Título:
                                <span class="details_data" style="" name="details_title">Cuaderno de ensayo</span>
                            </p>
                            <p class="details_txt" >Género:
                                <span class="details_data" style="" name="details_title">Ensayo</span>
                            </p>
                            <p class="details_txt" >Precio:
                                <span class="details_data" style="" name="details_title">$200</span>
                            </p>
                            </div>
                            <div class="btn_details_autor" >
                                <p style="text-align:center; font-family: Karla;
                                font-style: normal;
                                font-weight: bold;
                                font-size: 18px;
                                line-height: 21px;
                                color:black">Comprar</p>
                            </div> 
                        </div>
                        
                        <div class="detailsAutor_content" style="">
                            <img class="img_libro_aut" src="{{ asset('img/portada2.jpg') }}" alt="" srcset="" style="">
                            <div class=detailsAutor_txt>
                            <p class="details_txt" >Título:
                                <span class="details_data" style="" name="details_title">Monomanía del autómata</span>
                            </p>
                            <p class="details_txt" >Género:
                                <span class="details_data" style="" name="details_title">Poesía</span>
                            </p>
                            <p class="details_txt" >Precio:
                                <span class="details_data" style="" name="details_title">$200</span>
                            </p>
                            </div>
                            <div class="btn_details_autor" >
                                <p style="text-align:center; font-family: Karla;
                                font-style: normal;
                                font-weight: bold;
                                font-size: 18px;
                                line-height: 21px;
                                color:black">Comprar</p>
                            </div> 
                            
                        </div>
                    </div> 
                    
                    <div class="pestana_details_autor" style= "" name="details_autor">
                        <p class="pestana_txt_autor" style="">
                            más
                        </p>
                    </div>
            </div>
        
    
    </div>

    <!--script para mostrar pestañas de detalles-->
    <script type="text/javascript">
        var clickLibro=false;
        var clickAutor=false;
        $(document).ready(function() {
            $('[name=details_libro]').on('click', function () {
                if(clickLibro){  
                    clickLibro=false;
                    $('.details_libro').hide();
                    $('.cajaBannerLibros').css({'margin-bottom':'75px', 'height':'352px'});
                    $('.pestana_txt').html("más");
                }   
                else{
                    clickLibro=true;
                    $('.cajaBannerLibros').css({'margin-bottom':'230px','height':'452px'});
                    $('.details_libro').css({ "display": "flex", "flex-direction": "row" });
                    $('.details_libro').show();
                    $('.pestana_txt').html("menos");
                }      
            });

            $('[name=details_autor]').on('click', function () {
                if(clickAutor){  
                    clickAutor=false;
                    $('.details_autor').hide();
                    $('.cajaBannerAutores').css({'margin-bottom':'75px', 'height':'352px'});
                    $('.pestana_txt_autor').html('más');
                }   
                else{
                    clickAutor=true;
                    $('.cajaBannerAutores').css({'margin-bottom':'230px','height':'452px'});
                    $('.details_autor').css({ "display": "flex", "flex-direction": "row", "justify-content":"center",});
                    $('.details_autor').show();
                    $('.pestana_txt_autor').html('menos')
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
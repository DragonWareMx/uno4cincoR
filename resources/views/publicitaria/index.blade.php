@extends('layouts.layoutPubli')

@section('header')
<title>Inicio | Editorial uno4cinco</title>
<!--BOOTSTRAP-->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="assetsTimer/fonts/fontawesome/font-awesome.min.css">
<link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&display=swap" rel="stylesheet">
		<!-- Vendors-->
		<link rel="stylesheet" type="text/css" href="assetsTimer/vendors/bootstrap/grid.css">
		<link rel="stylesheet" type="text/css" href="assetsTimer/vendors/YTPlayer/css/jquery.mb.YTPlayer.min.css">
		<link rel="stylesheet" type="text/css" href="assetsTimer/vendors/vegas/vegas.min.css">
		<!-- App & fonts-->
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
                                <h4 class="hero__text" style="color:black">Los mejores libros a la puerta de tu casa, siempre</h4>
                                <br>
                                <h4 class="hero__text" style="color:white">Pronto estaremos contigo</h4>
                                <div class="countdown__module hide" data-date="2020/7/3">
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
        
    <div class="md-content" style="background-color: #E5E5E5 ; display:flex ; flex-direction:column; justify-content:center; align-items:center; padding:10px">
        <div class="title_index" style="width: 270px; line-height: 49px; margin:10px">
            <h2 style="font-family: Abril Fatface; font-style: normal; font-weight: normal; font-size: 36px; color: #1D2120">Novedades</h2>
        </div>
            <!--slider LIBROS-->
        <div class="cajaBannerLibros" style=" width: 1294px; height: 352px; left: 21px; top: 780px; border: 1px solid #303030; box-sizing: border-box; margin:30px; margin-bottom:75px">
            <div id="carruselLibros" class="carousel slide" data-ride="carousel" style=" position: relative; width: 1294px; height: 381px; left: 10px; top: 10px;  background: #1D2120;">
                    <ol class="carousel-indicators">
                      <li data-target="#carruselLibros" data-slide-to="0" class="active" style="width:10px; height:10px; border-radius:100%"></li>
                      <li data-target="#carruselLibros" data-slide-to="1"style="width:10px; height:10px; border-radius:100%"></li>
                      <li data-target="#carruselLibros" data-slide-to="2" style="width:10px; height:10px; border-radius:100%"></li>
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
                    <div class="slider_footer" style="position: relative;
                    width: 1294px;
                    height: 25px;
                    top: 356px;">
                    </div>

                    
                    <div class="details_libro" style="width: 1293px;
                    height: 152px;
                    background: #BA1F00;
                    border: 1px solid #BA1F00;
                    box-sizing: border-box; padding:5px; display:none">
                        <h1><img src="{{ asset('img/portada.jpg') }}" alt="" srcset="" style="widht:128px; height:138px">ESTE ES UN LIBRO</h1>
                    </div> 
                    <div class="pestana_details" style= "background: #BA1F00; width:91px; height:22px;" name="details_libro">
                        <p style="text-align: center; font-family: Abril Fatface; color:white">detalles</p>
                    </div>
            </div>
            

        </div>  
        <!--SLIDER AUTORES-->
        <div class="cajaBanner" style=" width: 1294px; height: 352px; left: 21px; top: 780px; border: 1px solid #303030; box-sizing: border-box; margin:30px; margin-bottom:75px">
            <div id="carruselAutores" class="carousel slide" data-ride="carousel" style=" position: relative; width: 1294px; height: 381px; left: 10px; top: 10px;  background: #1D2120;">
                    <ol class="carousel-indicators">
                      <li data-target="#carruselAutores" data-slide-to="0" class="active" style="width:10px; height:10px; border-radius:100%"></li>
                      <li data-target="#carruselAutores" data-slide-to="1"style="width:10px; height:10px; border-radius:100%"></li>
                      <li data-target="#carruselAutores" data-slide-to="2" style="width:10px; height:10px; border-radius:100%"></li>
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

                    
                    <div class="details_autor" style="postition:relative; width: 1293px;
                    height: 152px;
                    background: #BA1F00;
                    border: 1px solid #BA1F00;
                    box-sizing: border-box; padding:5px; display:none">
                        <h1><img src="{{ asset('img/portada.jpg') }}" alt="" srcset="" style="widht:128px; height:148px">ESTE ES UN LIBRO</h1>
                    </div> 
                    <div class="pestana_details" style= "background: #BA1F00; width:91px; height:22px;" name="details_autor">
                        <p style="text-align: center; font-family: Abril Fatface; color:white">detalles</p>
                    </div>
            </div>
        
    
    </div>
    <script type="text/javascript">
                        
        $(document).ready(function() {
            $('[name=details_libro]').on('click', function () {
               $('.cajaBannerLibros').css('margin-bottom','230px');
                $('.details_libro').show();

                    
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
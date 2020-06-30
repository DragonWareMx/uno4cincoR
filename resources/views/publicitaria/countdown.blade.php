@extends('layouts.layoutPubli')

@section('header')
<title>Inicio | Editorial uno4cinco</title>

<link rel="stylesheet" type="text/css" href="assetsTimer/fonts/fontawesome/font-awesome.min.css">
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
    <div class="md-content">
        
        <!-- hero -->
        <div class="" style="background-color: #83D7B5">
            
            <div class="container">
                <div class="hero__wrapper">
                    <div class="row">
                        <div class="col-lg-10 col-xs-offset-0 col-sm-offset-0 col-md-offset-0 col-lg-offset-1 ">
                            <div class="hero__title_inner"><img src="{{ asset('img/logos/logo.png') }}" alt="" srcset="">
                                <br>
                                <br>
                                <h1 class="hero__text" style="color:black">Página en construcción</h1>
                                <h4 class="hero__text" style="color:black">Los mejores libros a la puerta de tu casa, siempre</h4>
                            </div>
                        </div>
                    </div>
                

                    <!-- countdown__module hide undefined -->
                    <div class="countdown__module hide" data-date="2020/7/3">
                        <p><span>%D</span> Días</p>
                        <p><span>%H</span> Horas</p>
                        <p><span>%M</span> Minutos</p>
                        <p><span>%S</span> Segundos</p>
                    </div><!-- End / countdown__module hide undefined -->
                    
                    
                    
                    <div class="service-wrapper">
                        
                        <!-- service -->
                        <div class="service">
                            <h2 class="service__title">Nosotros</h2>
                            <p class="service__text">Como empresa creemos que el arte humaniza, por lo que nos es preciso recuperar el clásico proceso editorial y el sagrado vínculo espiritual entre escritora editora lectora, que ha dado como resultado los libros más emblemáticos de la historia, bajo la cíclica mirada del siglo XXI. 

                                </p>
                        </div><!-- End / service -->
                        
                        
                        <!-- service -->
                        <div class="service">
                            <h2 class="service__title">Misión</h2>
                            <p class="service__text">Servir como medio para la edición y divulgación de obras artísticas literarias de valor humano que contribuyan siempre al crecimiento, sostenimiento y vinculación de la comunidad lectoescritora.</p>
                        </div><!-- End / service -->
                        
                        
                        <!-- service -->
                        <div class="service">
                            <h2 class="service__title">Visión</h2>
                            <p class="service__text">Sentar las bases necesarias para la creación de una nueva forma de entender el concepto de consumo de literatura, teniendo siempre en cuenta a la ser humano como origen y fin de toda actividad artística. </p>
                        </div><!-- End / service -->
                        
                    </div>
            
                </div>
            </div>
        </div><!-- End / hero -->
        
    </div>
    <!-- End / Content-->
</div>
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
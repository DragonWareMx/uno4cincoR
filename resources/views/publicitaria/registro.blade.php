@extends('layouts.layoutPubli')

@section('header')
<title>Registro | Editorial uno4cinco</title>
<link rel="stylesheet" type="text/css" href="/assets/css/style_SobreNosotros.css">
<link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Karla&display=swap" rel="stylesheet">
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
        <div class="" style="background-color: #83D7B5">
            <div class="container">
                <div class="hero__wrapper">
                    <p class="txt-TitulosApartados" style="font-family:'Karla'; color:white">PRONTO ESTAREMOS CONTIGO</p>
                    <!-- countdown__module hide undefined -->
                    <div class="countdown__module hide" data-date="2020/8/13">
                        <p><span>%D</span> Días</p>
                        <p><span>%H</span> Horas</p>
                        <p><span>%M</span> Minutos</p>
                        <p><span>%S</span> Segundos</p>
                    </div><!-- End / countdown__module hide undefined -->

                    <p class="p-txt-content" style="margin-top:0px; color:#1D2120">
                        <b>Registrate al evento de facebook</b> para seguir los eventos de lanzamiento de la editorial. Se parte 
                    de uno4cinco</p>
                    <a href="https://www.facebook.com/uno4cinco" target="blank">
                        <div class="div-btn-registro" >
                            Registrarme
                        </div>
                    </a>

                </div>
            </div>
        </div>
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
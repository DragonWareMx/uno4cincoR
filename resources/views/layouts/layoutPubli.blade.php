<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="DragonWare">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">
    <link rel="icon" href="{{ asset('/img/ico/puerta.png') }}" type="image/icon type">

    <script src="https://kit.fontawesome.com/ba2b187421.js" crossorigin="anonymous"></script>
    @yield('header')

    <!-- Additional CSS Files -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap.min.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/font-awesome.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/css/templatemo-lava.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/css/templatemo-oscar.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/css/owl-carousel.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/css/footerR.css') }}">

    <!-- Fuentes -->
    <link href="https://fonts.googleapis.com/css2?family=Karla&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">


</head>

<body>
    <!-- ***** Header Area Start ***** -->
    <header class="header-area header-sticky background-header" 
    @php
        if(Request::path() != '/' )
        echo 'style="background-color: #83d7b5"';
    @endphp
    >
        <div class="container">
            <div class="row">
                <div class="col-12" >
                    <nav class="main-nav nav-space-between">
                        
                        <a href="{{ route('inicio') }}" class="logo2" style="display:none">
                            <img src="{{ asset('img/logos/logoNuevo.png') }}" alt="" srcset="" height="40px">
                        </a>

                        <a href="{{ route('inicio') }}" class="logo imagotipoLogo @php 
                                if(Request::path() == '/' )
                                echo 'ocultoIndex';
                            @endphp
                            " style=" height: 80px;display: flex;align-items: center;">
                            <img src="{{ asset('/img/ico/puerta.png') }}" alt="" srcset="" height="40px" style="vertical-align: middle;margin: auto;">
                        </a>
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">
                                <li class="carritoli"><a href="{{ route('carrito') }}" class=""><img src="{{ asset('img/ico/bolsa.png') }}" alt="" srcset="" width="20px">&nbsp;CARRITO
                                <div class="cargar-info">
                                @if(session('cart'))
                                    @php
                                        $contador = 0;
                                    @endphp
                                    @foreach(session('cart') as $id => $details)
                                        @php
                                            $contador += $details['cantidadFisico'];
                                            $contador += $details['cantidadDigital'];
                                        @endphp
                                    @endforeach
                                    <div class="contador-carrito"><p class="contador-carrito-value">{{ $contador }}</p></div>
                                @endif
                                </div>
                                </a></li>
                        </ul>
                        <a class='menu-trigger'>
                            <span>Menu</span>
                        </a>

                        <a class='menu-carrito' href="{{ route('carrito') }}">
                            <img src="{{ asset('img/ico/bolsa.png') }}" alt="" srcset="" height="30px">
                            <div class="cargar-info2">
                            @if(session('cart'))
                                <div class="contador-carrito"><p class="contador-carrito-value2">{{ $contador }}</p></div>
                            @endif
                            </div>
                        </a>
                        <!-- ***** Menu End ***** -->
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ***** Header Area End ***** -->

    <!-- ***** Welcome Area End ***** -->

    <!-- ***** Features Big Item Start ***** -->
    @yield('content')
    <div id="cajacookies">
        <p><button onclick="aceptarCookies()" class="pull-right"><i class="fa fa-times"></i> Aceptar y cerrar este mensaje</button>
        Este sitio web usa cookies, si permanece aquí acepta su uso.
        Puede leer más sobre el uso de cookies en nuestra <a href="{{route('avisoPrivacidad')}}">política de privacidad</a>.
        </p>
    </div>
    <!-- ***** Features Big Item End ***** -->

    <script>
    /* ésto comprueba la localStorage si ya tiene la variable guardada */
        function compruebaAceptaCookies() {
            if(localStorage.aceptaCookies == null){
                cajacookies.style.display = 'block';
                }
            }
            
            /* aquí guardamos la variable de que se ha
            aceptado el uso de cookies así no mostraremos
            el mensaje de nuevo */
            function aceptarCookies() {
            localStorage.aceptaCookies = 'true';
            cajacookies.style.display = 'none';
            }
            
            /* ésto se ejecuta cuando la web está cargada */
            $(document).ready(function () {
            compruebaAceptaCookies();
        });
    </script>


    <!-- ***** Footer Start ***** -->
    @include('subview.footer')

    <!-- jQuery -->
    <script src="{{asset('assets/js/jquery-2.1.0.min.js')}}"></script>

    <!-- Bootstrap -->
    <script src="{{asset('assets/js/popper.js')}}"></script>
    <script src="{{asset('assets/js/bootstrap.min.js')}}"></script>

    <!-- Plugins -->
    <script src="{{asset('assets/js/owl-carousel.js')}}"></script>
    <script src="{{asset('assets/js/scrollreveal.min.js')}}"></script>
    <script src="{{asset('assets/js/waypoints.min.js')}}"></script>
    <script src="{{asset('assets/js/jquery.counterup.min.js')}}"></script>
    <script src="{{asset('assets/js/imgfix.min.js')}}"></script>

    <!-- Global Init -->
    <script src="{{asset('assets/js/custom.js')}}"></script>
    <script src="{{asset('/assets/js/bootbox.min.js')}}"></script>
</body>
</html>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="DragonWare">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap"
        rel="stylesheet">
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
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">


</head>

<body>
    <!-- ***** Header Area Start ***** -->
    <header class="header-area header-sticky background-header">
        <div >
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav nav-space-between" style="padding: 0px 40px 0px 10px !important">

                        <a href="{{ route('inicio') }}" class="logo2">
                            
                            <img src="{{ asset('img/logos/ElBooke.png') }}" alt="" srcset="" height="60px">
                        </a>


                        <!-- ***** Logo End ***** -->
                        <!-- ***** Menu Start ***** -->
                        <div class="ld-links-header">
                            <ul class="nav">
                                <li class="">
                                    <a href="#!" class="">Nosotros</a>
                                </li>
                                <li>
                                    <a href="#!" class="">Blog</a>
                                </li>
                                <li>
                                    <a href="#!" class="">Filtros</a>
                                </li>
                            </ul>
                        </div>
                        <ul class="nav">
                            <li class="carritoli"><a href="{{ route('carrito') }}" class="">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="23" height="28" viewBox="0 0 32 37">
                                        <path id="Unión_9" data-name="Unión 9" d="M0,37V12.082H3.81A11.948,11.948,0,0,1,7.38,3.539a12.267,12.267,0,0,1,17.239,0,11.948,11.948,0,0,1,3.57,8.543H32V37ZM25.288,12.082a9.288,9.288,0,0,0-18.575,0Z" fill="#362358"/>
                                    </svg>
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
                                        <div class="contador-carrito">
                                            <p class="contador-carrito-value">{{ $contador }}</p>
                                        </div>
                                        @endif
                                    </div>
                                </a></li>
                        </ul>
                        <a class='menu-trigger'>
                            <span >Menu</span>
                        </a>

                        <a class='menu-carrito' href="{{ route('carrito') }}" style="right:110px">
                            <svg xmlns="http://www.w3.org/2000/svg" width="23" height="28" viewBox="0 0 32 37">
                                <path id="Unión_9" data-name="Unión 9" d="M0,37V12.082H3.81A11.948,11.948,0,0,1,7.38,3.539a12.267,12.267,0,0,1,17.239,0,11.948,11.948,0,0,1,3.57,8.543H32V37ZM25.288,12.082a9.288,9.288,0,0,0-18.575,0Z" fill="#362358"/>
                            </svg>
                            <div class="cargar-info2">
                                @if(session('cart'))
                                <div class="contador-carrito">
                                    <p class="contador-carrito-value2">{{ $contador }}</p>
                                </div>
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
        <p><button onclick="aceptarCookies()" class="pull-right"><i class="fa fa-times"></i> Aceptar y cerrar este
                mensaje</button>
            Este sitio web usa cookies, si permanece aquí acepta su uso.
            Puede leer más sobre el uso de cookies en nuestra <a href="{{route('avisoPrivacidad')}}">política de
                privacidad</a>.
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
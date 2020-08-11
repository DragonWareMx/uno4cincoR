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

</head>

<body>

    <!-- ***** Preloader Start ***** -->
    
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>
    <!-- ***** Preloader End ***** -->


    <!-- ***** Header Area Start ***** -->
    <header class="header-area header-sticky background-header">
        <div class="container">
            <div class="row">
                <div class="col-12" >
                    <nav class="main-nav nav-space-between">
                        <!-- ***** Logo Start ***** -->
                        <a href="index.html" class="logo" style="
                            @php
                                if(Request::path() != '/' )
                                echo 'display:none';
                            @endphp
                        ">
                            <img class="logonovedades" src="{{ asset('img/ico/signo!.png') }}">&nbsp;&nbsp;&nbsp;Novedades
                        </a>
                        <a href="{{ route('inicio') }}" class="logo2" style="display:none">
                            <img src="{{ asset('img/logos/logo.png') }}" alt="" srcset="" height="40px">
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
                            <li class=""><a href="{{ route('sobreNosotros') }}" class="">¿QUIÉNES SOMOS?</a></li>
                            </li>
                            <li class="submenu">
                                <a href="javascript:;">TIENDA&nbsp;<i class="fas fa-chevron-down"></i></a>
                                <ul>
                                    <li><a href="{{ route('tiendaNovedades') }}" class="">NOVEDADES</a></li>
                                    <li><a href="{{ route('tiendaCatalogo') }}" class="">CATÁLOGO</a></li>
                                    <li><a href="{{ route('tienda145') }}" class="">145</a></li>
                                    <li><a href="{{ route('colecciones') }}" class="">COLECCIONES</a></li>
                                </ul>
                            </li>
                            <li class="submenu">
                                <a href="javascript:;">AUTORES&nbsp;<i class="fas fa-chevron-down"></i></a>
                                <ul>
                                    <li><a href="{{ route('autoresUno4cinco') }}" class="">UNO4CINCO</a></li>
                                    <li><a href="{{ route('autores145') }}" class="">145</a></li>
                                </ul>
                            </li> 
                            <li class="submenu">
                                <a href="javascript:;">BLOG&nbsp;<i class="fas fa-chevron-down"></i></a>
                                <ul>
                                    <li><a href="{{ route('blogs', ['id' => '1', 'tipo' => 'tag'])}}" class="">EVENTOS</a></li>
                                    <li><a href="{{ route('blogs', ['id' =>'4', 'tipo' => 'tag'])}}" class="">ARTÍCULOS</a></li>
                                    <li><a href="{{ route('blogs', ['id' => 0])}}" class="">VER TODO</a></li>
                                </ul>
                            </li>
                            <li class=""><a href="{{ route('contacto') }}" class="">CONTACTO</a></li>
                            <li class="carritoli"><a href="{{ route('carrito') }}" class=""><img src="{{ asset('img/ico/carrito.png') }}" alt="" srcset="" width="20px">&nbsp;CARRITO
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
                            <img src="{{ asset('img/ico/carrito.png') }}" alt="" srcset="" height="30px">
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
    
    <!-- ***** Features Big Item End ***** -->

   


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
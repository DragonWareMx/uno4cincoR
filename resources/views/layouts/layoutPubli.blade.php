<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="TemplateMo">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">
    <link rel="icon" href="{{ asset('/img/ico/puerta.png') }}" type="image/icon type">

    <script src="https://kit.fontawesome.com/ba2b187421.js" crossorigin="anonymous"></script>
    @yield('header')

    <!-- Additional CSS Files -->
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css">

    <link rel="stylesheet" href="assets/css/templatemo-lava.css">

    <link rel="stylesheet" href="assets/css/templatemo-oscar.css">

    <link rel="stylesheet" href="assets/css/owl-carousel.css">

    <link rel="stylesheet" href="assets/css/footerR.css">

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
                <div class="col-12">
                    <nav class="main-nav">
                        <!-- ***** Logo Start ***** -->
                        <a href="index.html" class="logo">
                            <img class="logonovedades" src="{{ asset('img/ico/signo!.png') }}">&nbsp;&nbsp;&nbsp;Novedades
                        </a>

                        <a href="{{ route('inicio') }}" class="logo2" style="display:none">
                            <img src="{{ asset('img/logos/logo.png') }}" alt="" srcset="" height="40px">
                        </a>
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">
                            <li class=""><a href="{{ route('sobreNosotros') }}" class="">¿QUIÉNES SOMOS?</a></li>
                            </li>
                            <li class="submenu">
                                <a href="javascript:;">TIENDA&nbsp;<i class="fas fa-chevron-down"></i></a>
                                <ul>
                                    <li><a href="{{ route('sobreNosotros') }}" class="">NOVEDADES</a></li>
                                    <li><a href="" class="">CATÁLOGO</a></li>
                                    <li><a href="" class="">145</a></li>
                                </ul>
                            </li>
                            <li class="submenu">
                                <a href="javascript:;">AUTORES&nbsp;<i class="fas fa-chevron-down"></i></a>
                                <ul>
                                    <li><a href="" class="">UNO4CINCO</a></li>
                                    <li><a href="" class="">145</a></li>
                                </ul>
                            </li> 
                            <li class="submenu">
                                <a href="javascript:;">BLOG&nbsp;<i class="fas fa-chevron-down"></i></a>
                                <ul>
                                    <li><a href="" class="">EVENTOS</a></li>
                                    <li><a href="" class="">ARTÍCULOS</a></li>
                                    <li><a href="" class="">VER TODO</a></li>
                                </ul>
                            </li>
                            <li class=""><a href="{{ route('contacto') }}" class="">CONTACTO</a></li>
                            <li class="carritoli"><a href="#contact-us" class=""><img src="{{ asset('img/ico/carrito.png') }}" alt="" srcset="" width="20px">&nbsp;CARRITO</a></li>
                        </ul>
                        <a class='menu-trigger'>
                            <span>Menu</span>
                        </a>

                        <a class='menu-carrito'>
                            <img src="{{ asset('img/ico/carrito.png') }}" alt="" srcset="" height="30px">
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
    <script src="assets/js/jquery-2.1.0.min.js"></script>

    <!-- Bootstrap -->
    <script src="assets/js/popper.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

    <!-- Plugins -->
    <script src="assets/js/owl-carousel.js"></script>
    <script src="assets/js/scrollreveal.min.js"></script>
    <script src="assets/js/waypoints.min.js"></script>
    <script src="assets/js/jquery.counterup.min.js"></script>
    <script src="assets/js/imgfix.min.js"></script>

    <!-- Global Init -->
    <script src="assets/js/custom.js"></script>

</body>
</html>
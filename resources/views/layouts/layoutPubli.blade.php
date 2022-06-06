<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="DragonWare">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap"
        rel="stylesheet">
    <link rel="icon" href="{{ asset('/img/ico/ebook.png') }}" type="image/icon type">

    <script src="https://kit.fontawesome.com/ba2b187421.js" crossorigin="anonymous"></script>
    @yield('header')

    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>

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
    <style>
        .checkbox-filter {
            color: #362358;
        }

        .checkbox-input {
            cursor: pointer;
            background-color: red !important;
            background: red !important;
            color: pink !important;
        }

        .form-checkboxes {
            margin-bottom: 9px;
            display: flex;
            justify-content: space-between;
        }

        @media(max-width:990px) {
            .down-filter {
                position: relative !important;
                transform: translate3d(360px, 0px, 0px) !important;
            }
        }

        @media(max-width:750px) {
            .down-filter {
                transform: translate3d(230px, 0px, 0px) !important;
            }
        }

        @media(max-width:480px) {
            .down-filter {
                transform: translate3d(100px, 0px, 0px) !important;
            }
        }

        @media(max-width:320px) {
            .down-filter {
                transform: translate3d(20px, 0px, 0px) !important;
            }
        }
    </style>

</head>

<body>
    <!-- ***** Header Area Start ***** -->
    <header class="header-area header-sticky background-header">
        <div>
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav nav-space-between" style="padding: 0px 40px 0px 10px !important">

                        <a href="{{ route('inicio') }}" class="logo2">

                            <img src="{{ asset('img/logos/ElBooke.PNG') }}" alt="" srcset="" height="60px">
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
                                    <a style="cursor:pointer" class="" id="dropdownMenu2"
                                        data-bs-toggle="dropdown">Filtros <svg xmlns="http://www.w3.org/2000/svg"
                                            width="11" height="9" viewBox="0 0 17 14">
                                            <path id="Polígono_2" data-name="Polígono 2" d="M8.5,0,17,14H0Z"
                                                transform="translate(17 14) rotate(180)" fill="#362358" />
                                        </svg>
                                    </a>
                                    <ul class="dropdown-menu down-filter" aria-labelledby="dropdownMenu2"
                                        style="padding-left:10px">
                                        <form action="{{ route('inicio') }}" method="get">
                                            <li>
                                                <p style="border:none !important" class="a-filter"
                                                    style="background-color:white !important">Categorias</p>
                                            </li>
                                            <li>
                                                <div class="form-check form-check-inline form-checkboxes">
                                                    <label class="form-check-label checkbox-filter" for="booke">Booke
                                                        wellness&nbsp;&nbsp;</label>
                                                    <input class="form-check-input checkbox-input" type="checkbox"
                                                        id="booke" name="booke" onChange="this.form.submit()" @if(
                                                        Request::get('booke') ) checked @endif>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="form-check form-check-inline form-checkboxes">
                                                    <label class="form-check-label checkbox-filter"
                                                        for="novela">Novela</label>
                                                    <input class="form-check-input checkbox-input" type="checkbox"
                                                        id="novela" name="novela" onChange="this.form.submit()" @if(
                                                        Request::get('novela') ) checked @endif>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="form-check form-check-inline form-checkboxes">
                                                    <label class="form-check-label checkbox-filter"
                                                        for="poesia">Poesía</label>
                                                    <input class="form-check-input checkbox-input" type="checkbox"
                                                        id="poesia" name="poesia" onChange="this.form.submit()" @if(
                                                        Request::get('poesia') ) checked @endif>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="form-check form-check-inline form-checkboxes">
                                                    <label class="form-check-label checkbox-filter"
                                                        for="ensayo">Ensayo</label>
                                                    <input class="form-check-input checkbox-input" type="checkbox"
                                                        id="ensayo" name="ensayo" onChange="this.form.submit()" @if(
                                                        Request::get('ensayo') ) checked @endif>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="form-check form-check-inline form-checkboxes">
                                                    <label class="form-check-label checkbox-filter"
                                                        for="investigacion">Investigación</label>
                                                    <input class="form-check-input checkbox-input" type="checkbox"
                                                        id="investigacion" name="investigacion"
                                                        onChange="this.form.submit()" @if( Request::get('investigacion')
                                                        ) checked @endif>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="form-check form-check-inline form-checkboxes">
                                                    <label class="form-check-label checkbox-filter"
                                                        for="religion">Religión</label>
                                                    <input class="form-check-input checkbox-input" type="checkbox"
                                                        id="religion" name="religion" onChange="this.form.submit()" @if(
                                                        Request::get('religion') ) checked @endif>
                                                </div>
                                            </li>
                                            <li>
                                                <p style="border:none !important" class="a-filter">Formato</p>
                                            </li>
                                            <li>
                                                <div class="form-check form-check-inline form-checkboxes">
                                                    <label class="form-check-label checkbox-filter"
                                                        for="fisico">Físico</label>
                                                    <input class="form-check-input checkbox-input" type="checkbox"
                                                        id="fisico" name="fisico" onChange="this.form.submit()" @if(
                                                        Request::get('fisico') ) checked @endif>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="form-check form-check-inline">
                                                    <label class="form-check-label checkbox-filter" for="digital"
                                                        style="margin-right:97px">Ebook</label>
                                                    <input class="form-check-input checkbox-input" type="checkbox"
                                                        id="digital" name="digital" onChange="this.form.submit()" @if(
                                                        Request::get('digital') ) checked @endif>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="form-check form-check-inline" style="margin-top: 8px">
                                                    <label class="form-check-label checkbox-filter" for="amazon"
                                                        style="margin-right:80px">Amazon</label>
                                                    <input class="form-check-input checkbox-input" type="checkbox"
                                                        id="amazon" name="amazon" onChange="this.form.submit()" @if(
                                                        Request::get('amazon') ) checked @endif>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="form-check form-check-inline"
                                                    style="margin-top: 8px; margin-bottom: 8px">
                                                    <label class="form-check-label checkbox-filter" for="google"
                                                        style="margin-right:88px">Google</label>
                                                    <input class="form-check-input checkbox-input" type="checkbox"
                                                        id="google" name="google" onChange="this.form.submit()" @if(
                                                        Request::get('google') ) checked @endif>
                                                </div>
                                            </li>
                                        </form>
                                        <!-- <li>
                                        <div class="form-check form-check-inline">
                                            <label class="form-check-label checkbox-filter" for="amazon" style="margin-right:64px">Amazon</label>
                                            <input class="form-check-input checkbox-input" type="checkbox" id="amazon">
                                        </div>
                                    </li> -->
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <ul class="nav" style="right:45px">
                            <li class="carritoli"><a href="{{ route('carrito') }}" class="">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="23" height="28" viewBox="0 0 32 37">
                                        <path id="Unión_9" data-name="Unión 9"
                                            d="M0,37V12.082H3.81A11.948,11.948,0,0,1,7.38,3.539a12.267,12.267,0,0,1,17.239,0,11.948,11.948,0,0,1,3.57,8.543H32V37ZM25.288,12.082a9.288,9.288,0,0,0-18.575,0Z"
                                            fill="#362358" />
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
                            <span>Menu</span>
                        </a>

                        <a class='menu-carrito' href="{{ route('carrito') }}" style="right:110px">
                            <svg xmlns="http://www.w3.org/2000/svg" width="23" height="28" viewBox="0 0 32 37">
                                <path id="Unión_9" data-name="Unión 9"
                                    d="M0,37V12.082H3.81A11.948,11.948,0,0,1,7.38,3.539a12.267,12.267,0,0,1,17.239,0,11.948,11.948,0,0,1,3.57,8.543H32V37ZM25.288,12.082a9.288,9.288,0,0,0-18.575,0Z"
                                    fill="#362358" />
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
@extends('layouts.layoutPubli')

@section('header')
<title>Tienda | Editorial uno4cinco</title>
<link rel="stylesheet" type="text/css" href="{{asset('/assets/css/style_SobreNosotros.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('/assets/css/blogs.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('/assets/css/tienda.css')}}">
<link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Karla&display=swap" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="assetsTimer/fonts/fontawesome/font-awesome.min.css">
		<!-- Vendors-->
		<link rel="stylesheet" type="text/css" href="assetsTimer/vendors/bootstrap/grid.css">
		<link rel="stylesheet" type="text/css" href="assetsTimer/vendors/YTPlayer/css/jquery.mb.YTPlayer.min.css">
		<link rel="stylesheet" type="text/css" href="assetsTimer/vendors/vegas/vegas.min.css">
		<!-- App & fonts-->
		<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Work+Sans:300,400,500,700">
		<link rel="stylesheet" type="text/css" id="app-stylesheet" href="assetsTimer/css/main.css"><!--[if lt IE 9] -->
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>

<!--hoja de estilos-->
<link rel="stylesheet" href="{{ asset('assets/css/index.css') }}" type="text/css">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
                    
@endsection

@section('content')
    <section class="section" id="about" style="width:100%; height:100%; background-color:#F2ECD5">
        {{-- TITTLE --}}
        <p class="txt-TitulosApartados">Tienda | @yield('seccionTienda')</p>
        <hr class="hr-Titulos-long">
        <hr class="hr-Titulos-small ">
        <br><br>

        {{-- Aquí va el carrusel, esprar a que agustín lo termine de diseñar --}}
        @yield('carrusel')

        <div class="blog_encabezado">

            @yield('encabezadoTienda')
            
            <form class="" action="" method="GET" enctype="multipart/form-data">
                <div class="blog_barra_busqueda">
                    <select class="busqueda_clasificacion" name="clasificacion" id="tipos_blogs">
                        <option value="contenido">Contenido</option>
                        <option value="autor">Autor</option>
                        <option value="tag">Tag</option>
                    </select>
                    <input type="text" id="busqueda_busqueda" class ="" name="busqueda">
                    <button type="submit" class="busqueda_boton"><i class="fas fa-search"></i></button>
                </div>
            </form>
        </div>

        @yield('contenidoTienda')
    </section>

    <div class="modal fade" id="comprarFormato" tabindex="-1" role="dialog" aria-labelledby="comprarFormatoTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLongTitle" style="text-align:center;">Estos poemas culeros que son lo menos culero que tengo</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <div style="display: table; width:100%;">
                    <div class="formato-comprar">
                        <div class="formato-container shrink">
                            <div class="boton-formato" data-toggle="modal" data-target="#comprarFormato">
                                <div class="formato">
                                    <p style="padding-top: 20px;">Formato Físico:</p>
                                </div>
                                <div class="precio">
                                    <div class="oferta">
                                        $200
                                    </div>
                                    $100
                                </div>
                                <div class="ahorro">
                                    <p>Ahorras: $100</p>
                                </div>
                                <div class="disponibilidad">
                                    <p style="color: #29B390;">Disponible</p>
                                </div>
                            </div>
                            <div class="cantidad" style="padding-bottom: 20px;">
                                <p>Cantidad: </p>
                                <a href="#" class="qty qty-minus">-</a>
                                    <input type="numeric" value="1" />
                                <a href="#" class="qty qty-plus">+</a>
                            </div>
                        </div>
                    </div>
                    <div class="formato-comprar" data-toggle="modal" data-target="#comprarFormato">
                        <div class="formato-container shrink">
                            <div class="formato">
                                <p style="padding-top: 20px;">Formato Digital:</p>
                            </div>
                            <div class="precio" id="precio">
                                <div class="oferta">
                                    $200
                                </div>
                                $100
                            </div>
                            <div class="ahorro">
                                <p>Ahorras: $100</p>
                            </div>
                            <div class="disponibilidad">
                                <p style="color: #29B390;">Disponible</p>
                            </div>
                            <div class="cantidad" style="padding-bottom: 20px;">
                                <p>Cantidad: </p>
                                <p>1</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
          </div>
        </div>
    </div>

    <script>
        var libros = @json($books);

        function comprarCarrito(){            
            alert(JSON.stringify(libros));

            var libro = libros[id];
            
            alert(libro.getAttribute('precioFisico'));

            //se pone el precio en el modal
            //FORMATO FISICO
            if(libro['descuentoFisico'] > 0){
                //precio con descuento
                var descuento = libro['precioFisico'] - libro['precioFisico']*(libro['descuentoFisico']/100);
                document.getElementById("precio").innerHTML = "<p></p>";
            }
            else{
                //sad
            }
        }
    </script>
@endsection
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
              <h5 class="modal-title" id="exampleModalLongTitle" style="width: 100%; text-align:center;"></h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <h6 style="width: 100%; text-align:center; padding-bottom: 7px;">Elige el formato:</h6>
                <div style="display: table; width:100%;">
                    <div class="formato-comprar">
                        <div class="formato-container shrink">
                            <div class="boton-formato" id="botonFisico" data-toggle="modal" data-target="">
                                <div class="formato">
                                    <p style="padding-top: 20px;">Formato Físico:</p>
                                </div>
                                <div class="precio" id="precioFisico">
                                    <div class="oferta">
                                        
                                    </div>
                                    
                                </div>
                                <div class="ahorro" id="ahorroFisico">
                                    
                                </div>
                                <div class="disponibilidad" id="disponibleFisico">
                                    
                                </div>
                            </div>
                            <div class="cantidad" style="padding-bottom: 20px;">
                                <p>Cantidad: </p>
                                <div role="button" tabindex="0" class="qty qty-minus botonCantidad" id="menosCarrito">-</div>
                                    <input type="numeric" id="cantidadFisico" value="1" />
                                <div role="button" tabindex="0" class="qty qty-plus botonCantidad" id="masCarrito">+</div>
                            </div>
                        </div>
                    </div>
                    <div class="formato-comprar" id="botonDigital" data-toggle="modal" data-target="">
                        <div class="formato-container shrink">
                            <div class="formato">
                                <p style="padding-top: 20px;">Formato Digital:</p>
                            </div>
                            <div class="precio" id="precioDigital">
                                <div class="oferta">
                                    $200
                                </div>
                                $100
                            </div>
                            <div class="ahorro" id="ahorroDigital">
                                
                            </div>
                            <div class="disponibilidad" id="disponibleDigital">
                                
                            </div>
                            <div class="cantidad" style="padding-bottom: 20px;" id="cantidadDigital">
                                
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
        var seleccionado;
        //cada vez que se recarga la página obtenemos el carrito
        var carrito = @json(session()->get('cart'));

        //obtiene los datos del libro en base al id
        function getLibro(id){
            var libro;

            for (var i = 0; i < libros.data.length; i++){
                var a = libros.data[i];
                if(a['id']==id){
                    libro = a;
                    break;
                }
            }

            return libro;
        }

        //ABRE EL MODAL PARA ELEGIR EL FORMATO
        function comprarCarrito(id){ 
            var minFisico;
            var minDigital;  
            var libro = getLibro(id);

            console.log(carrito);

            //SE OBTIENE EL ID DEL LIBRO SELECCIONADO Y SE GUARDA EN UNA VARIABLE GLOBAL
            seleccionado = id;

            //si el producto está en el carrito se obtiene su cantidad en fisico en digital
            if(carrito && carrito[id]){
                minFisico = carrito[id]['cantidadFisico'];
                minDigital = carrito[id]['cantidadDigital'];
            }
            else{
                minFisico = 0;
                minDigital = 0;
            }

            //SE PONE EL NOMBRE DEL LIBRO EN EL MODAL
            document.getElementById("exampleModalLongTitle").innerHTML = libro['titulo'];

            //SE PONE EL PRECIO EN EL MODAL

                //FORMATO FISICO
            if(libro['descuentoFisico'] > 0){
                //precio con descuento
                var oferta = libro['precioFisico']*(libro['descuentoFisico']/100);
                var descuento = libro['precioFisico'] - oferta;

                if(descuento < 0)
                    descuento = 0;

                document.getElementById("precioFisico").innerHTML = "<div class=\"oferta\">$" + libro['precioFisico'] + "</div>$"+descuento;
                document.getElementById("ahorroFisico").innerHTML = "<p>Ahorras: $"+ oferta +"</p>";
            }
            else{
                document.getElementById("precioFisico").innerHTML = "<div class=\"oferta\"></div>$"+libro['precioFisico'];
                document.getElementById("ahorroFisico").innerHTML = "";
            }

                //FORMATO DIGITAL
            if(libro['descuentoDigital'] > 0){
                //precio con descuento
                var oferta = libro['precioDigital']*(libro['descuentoDigital']/100);
                var descuento = libro['precioDigital'] - libro['precioDigital']*(libro['descuentoDigital']/100);

                if(descuento < 0)
                    descuento = 0;

                document.getElementById("precioDigital").innerHTML = "<div class=\"oferta\">$" + libro['precioDigital']+ "</div>$"+descuento;
                document.getElementById("ahorroDigital").innerHTML = "<p>Ahorras: $"+ oferta +"</p>";
            }
            else{
                document.getElementById("precioDigital").innerHTML = "$"+libro['precioDigital'];
                document.getElementById("ahorroDigital").innerHTML = "";
            }

            //CHECA DISPONIBILIDAD Y MUESTRA LAS CANTIDADES
                //FORMATO FISICO
            if(libro['stockFisico'] > 0){
                document.getElementById("disponibleFisico").innerHTML = "<p style=\"color: #29B390;\">Disponible</p>";
                //el modal se puede cerrar al seleccionar el formato
                document.getElementById("botonFisico").setAttribute("data-target", "#comprarFormato");

                //EL PRODUCTO YA ESTA EN EL CARRITO
                if(minFisico > 0){
                    //El valor de la cantidad se establece como 1
                    document.getElementById("cantidadFisico").value = minFisico;
                }
                else{
                    //El valor de la cantidad se establece como 1
                    document.getElementById("cantidadFisico").value = 1;
                }

                if(libro['stockFisico'] == 1 && minFisico <= 1){
                    //los botones de la cantidad son visibles
                    document.getElementById("menosCarrito").style.display = "none";
                    document.getElementById("masCarrito").style.display = "none";
                    document.getElementById("cantidadFisico").readOnly = true;
                }
                else{
                    //los botones de la cantidad son visibles
                    document.getElementById("menosCarrito").style.display = "inline-block";
                    document.getElementById("masCarrito").style.display = "inline-block";
                    document.getElementById("cantidadFisico").readOnly = false;
                }
            }
            else{
                document.getElementById("disponibleFisico").innerHTML = "<p style=\"color: #BA1F00;\">No Disponible</p>";
                //El modal ya no puede cerrarse al seleccionar el formato
                document.getElementById("botonFisico").setAttribute("data-target", "");
                //El valor de la cantidad se establece como 0
                document.getElementById("cantidadFisico").value = 0;
                //los botones de la cantidad son visibles
                document.getElementById("menosCarrito").style.display = "none";
                document.getElementById("masCarrito").style.display = "none";
                document.getElementById("cantidadFisico").readOnly = true;
            }

                //FORMATO DIGITAL
            if(libro['stockDigital'] > 0){
                document.getElementById("disponibleDigital").innerHTML = "<p style=\"color: #29B390;\">Disponible</p>";
                //el modal se puede cerrar al seleccionar el formato
                document.getElementById("botonDigital").setAttribute("data-target", "#comprarFormato");
                //la cantidad es 1
                document.getElementById("cantidadDigital").innerHTML = "<p>Cantidad: </p><p id=\"cantidadDigitalValue\">1</p>";
            }
            else{
                document.getElementById("disponibleDigital").innerHTML = "<p style=\"color: #BA1F00;\">No Disponible</p>";
                //El modal ya no puede cerrarse al seleccionar el formato
                document.getElementById("botonDigital").setAttribute("data-target", "");
                //la cantidad es 0
                document.getElementById("cantidadDigital").innerHTML = "<p>Cantidad: </p><p id=\"cantidadDigitalValue\">0</p>";
            }
        }

        //CANTIDAD, BOTON MENOS
        $('#menosCarrito').click(function(){            
            //se obtiene el numero del input y se hace la resta
            var number = document.getElementById("cantidadFisico").value;
            
            number--;
            
            //no se deja que la cantidad sea menor a 0
            if(number < 1){
                number = 1;
            }

            document.getElementById("cantidadFisico").value = number;
        });

        //CANTIDAD, BOTON MAS
        $('#masCarrito').click(function(){
            var libro = getLibro(seleccionado);
            var max = libro['stockFisico'];

            //se obtiene el numero del input y se hace la resta
            var number = document.getElementById("cantidadFisico").value;
            
            number++;
            
            //no se deja que la cantidad sea menor a 0
            if(number > max){
                number = max;
            }

            document.getElementById("cantidadFisico").value = number;
        });

        //CANTIDAD, INPUT ENTER
        $("#cantidadFisico").keypress(function(event) { 
            // Only ASCII charactar in that range allowed 
            var ASCIICode = (event.which) ? event.which : event.keyCode 
            if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57)) 
                return false;

            if (event.keyCode === 13) { 
                var libro = getLibro(seleccionado);
                var max = libro['stockFisico'];

                //se obtiene el numero del input
                var number = document.getElementById("cantidadFisico").value;

                if(number > max){
                    number = max;
                }
                else if(number < 1){
                    number = 1;
                }

                document.getElementById("cantidadFisico").value = number;
            } 
        });

        //CUANDO SE SELECCIONA EL FORMATO SE GUARDA EN LA COOKIE
        $("#botonFisico").click(function (e) {
           e.preventDefault();
           
           //SE OBTIENE LA CANTIDAD
           var cantidad = $("#cantidadFisico").val();

           if(cantidad > 0){
                $.ajax({
                    url: 'agregar-a-carrito/'+seleccionado+'/'+cantidad+'/fisico',
                    method: "get",
                    success: function (response) {
                        if(carrito){
                            if(carrito[seleccionado]){
                                carrito[seleccionado]['cantidadFisico'] = cantidad;
                                $(".main-nav").load(" .main-nav");
                                return;
                            }
                            else{
                                carrito[seleccionado] = {"cantidadFisico": cantidad, "cantidadDigital": 0};
                                $(".main-nav").load(" .main-nav");
                                return;
                            }
                        }
                        else{
                            var jsonSt = '{"'+seleccionado+'": {"cantidadFisico": "'+cantidad+'","cantidadDigital": "0"}}';
                            carrito = JSON.parse(jsonSt);
                            $(".main-nav").load(" .main-nav");
                            return;
                        }
                    },
                });
            }
        });

        $("#botonDigital").click(function (e) {
           e.preventDefault();
           
           //SE OBTIENE LA CANTIDAD
           var cantidad = $("#cantidadDigitalValue").html();

           if(cantidad > 0){
                $.ajax({
                    url: 'agregar-a-carrito/'+seleccionado+'/'+cantidad+'/digital',
                    method: "get",
                    success: function (response) {
                        if(carrito){
                            if(carrito[seleccionado]){
                                carrito[seleccionado]['cantidadDigital'] = cantidad;
                                $(".main-nav").load(" .main-nav");
                                return;
                            }
                            else{
                                carrito[seleccionado] = {"cantidadFisico": 0, "cantidadDigital": cantidad};
                                $(".main-nav").load(" .main-nav");
                                return;
                            }
                        }
                        else{
                            var jsonSt = '{"'+seleccionado+'": {"cantidadFisico": "0","cantidadDigital": "'+cantidad+'"}}';
                            carrito = JSON.parse(jsonSt);
                            $(".main-nav").load(" .main-nav");
                            return;
                        }
                    },
                });
            }
        });
    </script>
@endsection
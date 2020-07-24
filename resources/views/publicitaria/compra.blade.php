<!DOCTYPE html>
<html>
    <head>

        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- Additional CSS Files -->
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap.min.css') }}">

        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/font-awesome.css') }}">

        {{-- CSS COMPRA --}}
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/compra.css') }}">

        <!-- Fuentes -->
        <link href="https://fonts.googleapis.com/css2?family=Karla&display=swap" rel="stylesheet">
    </head>
    <body>
        @php
            $fisico = false;
        @endphp
        @foreach(session('cart') as $id => $details)
            @foreach ($books as $libro)
                @if ($libro->id == $id)
                    @if ($details['cantidadFisico'] > 0)
                        @php
                            $fisico = true;
                            break;
                        @endphp
                    @endif
                @endif
            @endforeach
        @endforeach

        <form>
            <div class="container-fluid">
                <div class="row">
                    <div class="compra-header">
                        <a href="{{ route('inicio') }}" class="logo">
                            <img class="logonovedades" src="{{ asset('img/logos/logo.png') }}">
                        </a>
                        <hr>
                    </div>
                </div>
                <div class="row">
                    <div class="compra-table">
                        <div class="compra-cell cell-80">
                            <div class="formulario-container">
                                <h1>Información del pedido:</h1>
                            </div>
                            <div class="formulario-container">
                                {{-- NOMBRE --}}
                                <div class="row row-m">
                                    <div class="col-sm">
                                        <div class="field">
                                            <input type="text" autocomplete="on" id="fname"  name="fname" value="" onchange="this.setAttribute('value', this.value);" required>
	                                        <label for="fname" title="Nombre" data-title="Nombre"></label>
                                        </div>
                                    </div>
                                    <div class="col-sm">
                                        <div class="field">
                                            <input type="text" autocomplete="off" id="lname" name="lname" value="" onchange="this.setAttribute('value', this.value);" required>
	                                        <label for="lname" title="Apellidos" data-title="Apellidos"></label>
                                        </div>
                                    </div>
                                </div>

                                {{-- CORREO --}}
                                <div class="row row-p">
                                    <div class="field">
                                        <input type="email" autocomplete="on" id="email" name="email" value="" onchange="this.setAttribute('value', this.value);" required>
                                        <label for="email" title="Correo electrónico" data-title="Correo electrónico"></label>
                                    </div>
                                </div>

                                {{--EDAD Y GENERO--}}
                                <div class="row">
                                    <div class="col-sm">
                                        <div class="field">
                                            <input type="number" autocomplete="on" id="age"  name="age" value="" onchange="this.setAttribute('value', this.value);" min="10" required>
	                                        <label for="age" title="Edad" data-title="Edad"></label>
                                        </div>
                                    </div>
                                    <div class="col-sm">
                                        <div class="field">
                                            <select name="genero" id="genero" value="">
                                                <option value="Elegir" id="AF">Elegir opción</option>
                                                <option value="Hombre" id="H">Hombre</option>
                                                <option value="Mujer" id="M">Mujer</option>
                                                <option value="Otro" id="0">Otro</option>
                                            </select>
                                            <label for="genero" title="Género" data-title="Género"></label>
                                        </div>
                                    </div>
                                </div>

                                {{-- PAIS Y ESTADO --}}
                                <div class="row">
                                    <div class="col-sm">
                                        <div class="field">
                                            <select name="country" class="countries" id="countryId">
                                                <option value="">Select Country</option>
                                            </select>
                                            <label for="countryId" title="País" data-title="País"></label>
                                        </div>
                                    </div>
                                    <div class="col-sm">
                                        <div class="field">
                                            <select name="state" class="states" id="stateId">
                                                <option value="">Select State</option>
                                            </select>
                                            <label for="stateId" title="Estado" data-title="Estado"></label>
                                        </div>
                                    </div>
                                </div>

                                {{-- CIUDAD --}}
                                <div class="row row-p">
                                    <div class="field">
                                        <input type="text" autocomplete="on" id="ciudad" name="ciudad" value="" onchange="this.setAttribute('value', this.value);" required>
                                        <label for="ciudad" title="Ciudad" data-title="Ciudad"></label>
                                    </div>
                                </div>

                                {{-- COLONIA --}}
                                <div class="row row-p">
                                    <div class="field">
                                        <input type="text" autocomplete="on" id="colonia" name="colonia" value="" onchange="this.setAttribute('value', this.value);" required>
                                        <label for="colonia" title="Colonia" data-title="Colonia"></label>
                                    </div>
                                </div>

                                {{-- COLONIA --}}
                                <div class="row row-p">
                                    <div class="field">
                                        <input type="text" autocomplete="on" id="calle" name="calle" value="" onchange="this.setAttribute('value', this.value);" required>
                                        <label for="calle" title="Calle" data-title="Calle"></label>
                                    </div>
                                </div>

                                {{-- NUM CASA Y CP --}}
                                <div class="row">
                                    <div class="col-sm">
                                        <div class="field">
                                            <input type="number" autocomplete="on" id="numCasa" name="numCasa" value="" onchange="this.setAttribute('value', this.value);" min="0" required>
                                            <label for="numCasa" title="Número de casa" data-title="Número de casa"></label>
                                        </div>
                                    </div>
                                    <div class="col-sm">
                                        <div class="field">
                                            <input type="text" pattern="[0-9]*" autocomplete="on" id="cp"  name="cp" value="" onchange="this.setAttribute('value', this.value);" required>
	                                        <label for="cp" title="Código Postal" data-title="Código Postal"></label>
                                        </div>
                                    </div>
                                </div>

                                @if($fisico)
                                {{--METODO ENVIO--}}
                                <div class="row">
                                    <div class="col-sm">
                                        <div class="field">
                                            <select name="envio" id="envio" value="" onchange="envioSelect()" required>
                                                @if($envios)
                                                    <option value="" id="NA">Elegir opción</option>
                                                    @foreach ($envios as $envio)
                                                        <option value="{{ $envio->id }}" id="{{ $envio->id }}">${{ number_format($envio->costo, 2 , ".", "," ) }} {{ $envio->nombre }} @if($envio->descripcion)- {{ $envio->descripcion }}@endif</option>
                                                    @endforeach
                                                @else
                                                    <option value="Elegir" id="NA">Lo sentimos, no hay envíos disponibles</option>
                                                @endif
                                            </select>
                                            <label for="envio" title="Tipo de envío" data-title="Tipo de envío"></label>
                                        </div>
                                    </div>
                                </div>
                                @endif
                            </div>
                        </div>

                        <div class="compra-cell cell-20">
                            <div class="compra-container">
                                <h1>Detalles de la compra</h1>
                                @if (session('cart'))
                                    @php
                                        $total = 0;
                                    @endphp
                                    {{-- HEADER TABLA --}}
                                    <div class="productos-compra">
                                        <div class="producto-table">
                                            <div class="producto-row">
                                                <div class="producto-cell imagen-producto">
                                                    <p><b>Imagen</b></p>
                                                </div>
                                                <div class="producto-cell contenido-producto">
                                                    <p><b>Producto</b></p>
                                                </div>
                                                <div class="producto-cell contenido-producto">
                                                    <p><b>Cantidad</b></p>
                                                </div>
                                                <div class="producto-cell contenido-producto-sm">
                                                    <p><b>Subtotal</b></p>
                                                </div>
                                            </div>
                                            {{-- PRODUCTOS --}}
                                            @foreach(session('cart') as $id => $details)
                                                @foreach ($books as $libro)
                                                    @if ($libro->id == $id)
                                                        @if ($details['cantidadFisico'] > 0)
                                                            <div class="producto-row">
                                                                <div class="producto-cell imagen-producto">
                                                                    <img src="{{ asset('/storage/libros/'.$libro->tiendaImagen) }}">
                                                                </div>
                                                                <div class="producto-cell contenido-producto">
                                                                    <p>{{ $libro->titulo }} (Físico)</p>
                                                                </div>
                                                                <div class="producto-cell contenido-producto">
                                                                    <p>{{ $details['cantidadFisico'] }}</p>
                                                                </div>
                                                                <div class="producto-cell contenido-producto-sm">
                                                                    <p>${{ number_format(($libro->precioFisico - $libro->precioFisico*($libro->descuentoFisico/100))*$details['cantidadFisico'], 2 , ".", "," ) }}</p>
                                                                    @php
                                                                        $total += ($libro->precioFisico - $libro->precioFisico*($libro->descuentoFisico/100))*$details['cantidadFisico'];
                                                                    @endphp
                                                                </div>
                                                            </div>
                                                        @endif
                                                        @if ($details['cantidadDigital'] > 0)
                                                            <div class="producto-row">
                                                                <div class="producto-cell imagen-producto">
                                                                    <img src="{{ asset('/storage/libros/'.$libro->tiendaImagen) }}">
                                                                </div>
                                                                <div class="producto-cell contenido-producto">
                                                                    <p>{{ $libro->titulo }} (Digital)</p>
                                                                </div>
                                                                <div class="producto-cell contenido-producto">
                                                                    <p>{{ $details['cantidadDigital'] }}</p>
                                                                </div>
                                                                <div class="producto-cell contenido-producto-sm">
                                                                    <p>${{ number_format(($libro->precioDigital - $libro->precioDigital*($libro->descuentoDigital/100)), 2 , ".", "," ) }}</p>
                                                                    @php
                                                                        $total += ($libro->precioDigital - $libro->precioDigital*($libro->descuentoDigital/100));
                                                                    @endphp
                                                                </div>
                                                            </div>
                                                        @endif
                                                    @endif
                                                @endforeach
                                            @endforeach
                                        </div>

                                        {{-- TOTALES --}}
                                        <div class="producto-table">
                                            <div class="producto-row">
                                                @if($fisico)
                                                    <div class="totales">
                                                        <p>Subtotal</p><p>${{ number_format($total, 2 , ".", "," ) }}</p>
                                                    </div>
                                                    <div class="totales">
                                                        <p>Envío</p><p id="envio-totales" class="envio-totales">Selecciona el tipo de envío</p>
                                                    </div>
                                                @endif
                                                <div class="totales">
                                                    <p>Total</p><p id="total">${{ number_format($total, 2 , ".", "," ) }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <input type="submit" value="Realizar compra" class="shrink">
                                @else
                                    <h1>No hay productos en su carrito</h1>
                                    <button onclick="location.href='{{ route('tiendaCatalogo') }}'">Regresar a la tienda</button>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>

        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script> 
        <script src="//geodata.solutions/includes/countrystatecity.js"></script>

        <script>
            //se guarda el total
            var totalCosto = {{ $total }};
            var envios = @json($envios);

            function getEnvio(id){
                var envio;

                for (var i = 0; i < envios.length; i++){
                    var a = envios[i];
                    if(a['id']==id){
                        envio = a;
                        break;
                    }
                }

                return envio;
            }

            function formatearNumero(numero){
                var parts = numero.toFixed(2).split(".");
                var num = parts[0].replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,") + 
                    (parts[1] ? "." + parts[1] : "");

                return num;
            }

            function envioSelect(){
                //obtenemos el envio
                var envio = document.getElementById("envio");
                var totalEnvio = document.getElementById("envio-totales");
                var total = document.getElementById("total");

                //verifica que el tipo de envio exista
                if(envio.value != ""){
                    //se obtiene el envio de la BD
                    envioData = getEnvio(envio.value);

                    //verifica que el envio exista en la BD
                    if(envioData["costo"]){
                        //se agrega el costo a los totales
                        totalEnvio.innerHTML = "$"+formatearNumero(envioData["costo"]);

                        //se elimina la clase de "envio-totales"
                        totalEnvio.classList.remove("envio-totales");

                        //se actualiza el total
                        total.innerHTML = "$"+formatearNumero(totalCosto + envioData["costo"]);
                    }
                }
                else{
                    //se pide al usuario que seleccione el tipo
                    totalEnvio.innerHTML = "Selecciona el tipo de envío";

                    //se agrega la clase de "envio-totales"
                    totalEnvio.classList.add("envio-totales");

                    //se actualiza el total
                    total.innerHTML = "$"+formatearNumero(totalCosto);
                }
            }
        </script>
    </body>
</html>
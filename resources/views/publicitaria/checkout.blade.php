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

        <link rel="icon" href="{{ asset('/img/ico/puerta.png') }}" type="image/icon type">

        <title>Checkout | Editorial uno4cinco</title>

        <script src="https://js.stripe.com/v3/"></script>
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

        <form action="{{ route('checkout.store') }}" id="payment-form" method="POST">
            @csrf
            <div class="container-fluid">
                <div class="row">
                    <div class="compra-header">
                        <div style="width: 100%">
                            <a href="{{ route('inicio') }}" class="logo">
                                <img src="{{ asset('img/logos/logo.png') }}">
                            </a>
                        </div>
                        <hr>
                    </div>
                </div>
                <div class="row">
                    @if(session('status'))
                    <div class="alert alert-danger" role="alert" style="width: 100%">
                        <ul>
                            <li>{{session('status')}}</li>
                        </ul>
                    </div>
                    @endif
                    @if($errors->any())
                    <div class="alert alert-danger" role="alert" style="width: 100%">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                </div>
                <div class="row">
                    <div class="compra-table">
                        <div class="compra-cell cell-80">
                            <div class="formulario-container">
                                <h1 class="row-m">Información de la tarjeta:</h1>
                            </div>
                            <div class="formulario-container">


                                {{-- CORREO --}}
                                <div class="row row-p">
                                    <div class="field">
                                        <input type="text" autocomplete="" id="nombreTarjeta" name="nombreTarjeta" value="" onchange="this.setAttribute('value', this.value);" required>
                                        <label for="nombreTarjeta" id="titularname" title="Nombre en tarjeta" data-title="Nombre en tarjeta"></label>
                                    </div>
                                </div>

                                
                                {{-- TEL --}}
                                <div class="row row-p" style="display: block">
                                    <label for="card-element">
                                        <a href="https://stripe.com/mx" target="_blank"><img src="{{ asset('img/ico/stripe-payment-logo.png') }}" width="50px" height="50px"></a> Tarjeta de crédito o débito 
                                    </label>
                                    <div id="card-element">
                                      <!-- A Stripe Element will be inserted here. -->
                                    </div>
                                
                                    <!-- Used to display form errors. -->
                                    <div id="card-errors" role="alert"></div>
                                  </div>
                            </div>
                        </div>
                        <input type="hidden" id="fname" name="fname" value="{{$datos['fname']}}">
                        <input type="hidden" id="lname" name="lname" value="{{$datos['lname']}}">
                        <input type="hidden" name="email" value="{{$datos['email']}}">
                        <input type="hidden" name="age" value="{{$datos['age']}}">
                        <input type="hidden" name="genero" value="{{$datos['genero']}}">
                        <input type="hidden" name="tel" value="{{$datos['tel']}}">
                        <input type="hidden" name="country" value="{{$datos['country']}}">
                        <input type="hidden" id="estado" name="state" value="{{$datos['state']}}">
                        <input type="hidden" id="ciudad" name="ciudad" value="{{$datos['ciudad']}}">
                        <input type="hidden" id="colonia" name="colonia" value="{{$datos['colonia']}}">
                        <input type="hidden" id="calle" name="calle" value="{{$datos['calle']}}">
                        <input type="hidden" name="numCasa" value="{{$datos['numCasa']}}">
                        <input type="hidden" id="cp" name="cp" value="{{$datos['cp']}}">
                        <input type="hidden" name="envio" value="@if (isset($datos['envio']))
                        {{$datos['envio']}}
                        @endif">
                        <input type="hidden" name="referencia" value="@if (isset($datos['referencias']))
                        {{$datos['referencias']}}
                        @endif">
                        <input type="hidden" name="cupon" value="{{$datos['cupon']}}">
                        <input type="hidden" id="subtotalAnt" name="subtotal" value="{{$datos['subtotal']}}">
                        <input type="hidden" id="descuentoAnt" name="descuento" value="{{$datos['descuento']}}">
                        <input type="hidden" name="cuponId" value="{{$datos['cuponId']}}">
                        <input type="hidden" id="totalAnt" name="total" value="{{$datos['total']}}">


                        <div class="compra-cell cell-20">
                            <div class="compra-container">
                                <h1>Detalles de la compra</h1>
                                @php
                                    $total = 0;
                                @endphp
                                @if (session('cart'))
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
                                                                    <p>{{ $libro->titulo }} <b>(Físico)</b></p>
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
                                                                    <p>{{ $libro->titulo }} <b>(Digital)</b></p>
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
                                                        <p>Subtotal</p><p id="subtotal">${{ number_format($total, 2 , ".", "," ) }}</p>
                                                    </div>
                                                    <div class="totales">
                                                        <p>Envío</p><p id="envio-totales" class="envio-totales">Selecciona el tipo de envío</p>
                                                    </div>
                                                @else
                                                    <div class="totales" id="subtotalHTML" style="display: none;">
                                                        <p>Subtotal</p><p id="subtotal">${{ number_format($total, 2 , ".", "," ) }}</p>
                                                    </div>
                                                @endif
                                                <div class="totales" id="cuponHTML" style="display: none;">
                                                    <p>Cupón de descuento</p><p id="cuponDescuento">${{ number_format(0, 2 , ".", "," ) }}</p>
                                                </div>
                                                <div class="totales">
                                                    <p>Total</p><p id="total">${{ number_format($total, 2 , ".", "," ) }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- <input type="submit" value="Realizar compra" class="shrink"> --}}
                                    <button type="submit" id="complete-order" class="boton_compra shrink" name="action">Pagar</button>
                                    
                                @else
                                    <h1 style="padding-top:50px">No hay productos en su carrito</h1>
                                    <button onclick="location.href='{{ route('tiendaCatalogo') }}'" class="boton_compra shrink">Regresar a la tienda</button>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <hr>

            <div class="libro-regresar">
                <div class="boton">
                <button onclick="location.href='{{ route('compra') }}'" type="button">
                    <div class="row" style="margin-right:0px; margin-left: auto;">
                        <img src="{{ asset('img/ico/blackarrow.png') }}">
                    </div>
                    <div class="row" style="margin-right:0px; margin-left: auto;">
                        Regresar
                    </div>
                </button>
                </div>
            </div>
        </form>

        <script>
            //se guarda el total
            var totalCosto = {{ $total }};
            var subtotal = {{ $total }};
            
            var hayFisico = {{ json_encode($fisico) }};
                        

            function formatearNumero(numero){
                var parts = numero.toFixed(2).split(".");
                var num = parts[0].replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,") + 
                    (parts[1] ? "." + parts[1] : "");

                return num;
            }

        </script>

        <script>
            document.addEventListener("DOMContentLoaded", function(){
                var envio=document.getElementById("totalAnt").value - document.getElementById("subtotalAnt").value;
                var descuento=document.getElementById("descuentoAnt").value;
                if(descuento!='descargas'){
                    descuento=descuento-0;
                }
                if(descuento!=0 && descuento>=0){
                    document.getElementById('cuponDescuento').innerHTML='$-'+formatearNumero(descuento);
                    cuponHTML = document.getElementById("cuponHTML");
                    cuponHTML.style.display = "flex";
                    envio=document.getElementById("totalAnt").value  - document.getElementById("subtotalAnt").value + descuento;
                }
                if(envio!=0){
                    document.getElementById('envio-totales').classList.remove('envio-totales');
                    document.getElementById('envio-totales').innerHTML='$'+formatearNumero(envio);
                    var total=document.getElementById("totalAnt").value-0;
                    document.getElementById('total').innerHTML='$'+formatearNumero(total);
                }
                if(descuento=='descargas'){
                    document.getElementById('cuponDescuento').innerHTML='Descargas Ilimitadas';
                    cuponHTML = document.getElementById("cuponHTML");
                    cuponHTML.style.display = "flex";
                }
            });
        </script>

        <script>
            (function(){
                // Create a Stripe client.
                var stripe = Stripe('pk_test_51HHHSrDINHvQO7l2gCKyjrAPWXBfg7kTPQOyvjkmQFbghqNpjucfMqES9L0DuSdhDQT7nXYAQ02j0N4Wa0QeKSzS00CPKytdCO');

                // Create an instance of Elements.
                var elements = stripe.elements();

                // Custom styling can be passed to options when creating an Element.
                // (Note that this demo uses a wider set of styles than the guide below.)
                var style = {
                base: {
                    color: '#32325d',
                    fontFamily: '"Karla", Helvetica, sans-serif',
                    fontSmoothing: 'antialiased',
                    fontSize: '16px',
                    '::placeholder': {
                    color: '#aab7c4'
                    }
                },
                invalid: {
                    color: '#fa755a',
                    iconColor: '#fa755a'
                }
                };

                // Create an instance of the card Element.
                var card = elements.create('card', {style: style,
                    hidePostalCode: true
                });

                // Add an instance of the card Element into the `card-element` <div>.
                card.mount('#card-element');

                // Handle real-time validation errors from the card Element.
                card.on('change', function(event) {
                var displayError = document.getElementById('card-errors');
                if (event.error) {
                    displayError.textContent = event.error.message;
                } else {
                    displayError.textContent = '';
                }
                });

                // Handle form submission.
                var form = document.getElementById('payment-form');
                form.addEventListener('submit', function(event) {
                event.preventDefault();

                document.getElementById('complete-order').disabled=true;

                var options = {
                    name: document.getElementById('nombreTarjeta').value,
                    address_line1: document.getElementById('calle').value+' '+document.getElementById('colonia').value ,
                    address_city: document.getElementById('ciudad').value,
                    address_state: document.getElementById('estado').value,
                    address_zip: document.getElementById('cp').value,

                }

                stripe.createToken(card, options).then(function(result) {
                    if (result.error) {
                        // Inform the user if there was an error.
                        var errorElement = document.getElementById('card-errors');
                        errorElement.textContent = result.error.message;
                        document.getElementById('complete-order').disabled=false;
                    } else {
                    // Send the token to your server.
                    stripeTokenHandler(result.token);
                    }
                });
                });

                function stripeTokenHandler(token) {
                    // Insert the token ID into the form so it gets submitted to the server
                    var form = document.getElementById('payment-form');
                    var hiddenInput = document.createElement('input');
                    hiddenInput.setAttribute('type', 'hidden');
                    hiddenInput.setAttribute('name', 'stripeToken');
                    hiddenInput.setAttribute('value', token.id);
                    form.appendChild(hiddenInput);

                    // Submit the form
                    form.submit();
                }
                // Submit the form with the token ID.
                function stripeTokenHandler(token) {
                // Insert the token ID into the form so it gets submitted to the server
                var form = document.getElementById('payment-form');
                var hiddenInput = document.createElement('input');
                hiddenInput.setAttribute('type', 'hidden');
                hiddenInput.setAttribute('name', 'stripeToken');
                hiddenInput.setAttribute('value', token.id);
                form.appendChild(hiddenInput);

                // Submit the form
                form.submit();
                }
            })();
        </script>
    </body>
</html>
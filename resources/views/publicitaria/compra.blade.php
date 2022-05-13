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

        <link rel="icon" href="{{ asset('/img/ico/ebook.png') }}" type="image/icon type">

        <title>Checkout | ElBooke</title>

    </head>
    <body>
        @php
            $fisico = false;
            $hayNuevo = false;
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

        <form action="{{ route('pagoPayPal') }}" method="POST" onsubmit="return validate(this);">
            @csrf
            <div class="container-fluid">
                <div class="row">
                    <div class="compra-header">
                        <div style="width: 100%">
                            <a href="{{ route('inicio') }}" class="logo">
                                <img src="{{ asset('img/logos/ElBooke.png') }}">
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
                                <h1 class="row-m">Información del cliente:</h1>
                            </div>
                            <div class="formulario-container">
                                {{-- NOMBRE --}}
                                <div class="row">
                                    <div class="col-sm">
                                        <div class="field">
                                            <input type="text" autocomplete="given-name" id="fname"  name="fname" value="" onchange="this.setAttribute('value', this.value);" required>
	                                        <label for="fname" title="Nombre" data-title="Nombre"></label>
                                        </div>
                                    </div>
                                    <div class="col-sm">
                                        <div class="field">
                                            <input type="text" autocomplete="family-name" id="lname" name="lname" value="" onchange="this.setAttribute('value', this.value);" required>
	                                        <label for="lname" title="Apellidos" data-title="Apellidos"></label>
                                        </div>
                                    </div>
                                </div>

                                {{-- CORREO --}}
                                <div class="row row-p">
                                    <div class="field">
                                        <input type="email" autocomplete="email" id="email" name="email" value="" onchange="this.setAttribute('value', this.value);" required>
                                        <label for="email" title="Correo electrónico" data-title="Correo electrónico"></label>
                                    </div>
                                </div>

                                {{--EDAD Y GENERO--}}
                                <div class="row" style="margin-bottom: 16px">
                                    <div class="col-sm">
                                        <div class="field">
                                            <input type="number" autocomplete="on" id="age"  name="age" value="" onchange="this.setAttribute('value', this.value);" min="10" required>
	                                        <label for="age" title="Edad" data-title="Edad"></label>
                                        </div>
                                    </div>
                                    <div class="col-sm">
                                        <div class="field">
                                            <select name="genero" autocomplete="on" id="genero" value="" autocomplete="sex" required>
                                                <option value="" id="AF">Elegir opción</option>
                                                <option value="Hombre" id="H">Hombre</option>
                                                <option value="Mujer" id="M">Mujer</option>
                                                <option value="Otro" id="0">Otro</option>
                                            </select>
                                            <label for="genero" title="Género" data-title="Género"></label>
                                        </div>
                                    </div>
                                </div>

                                {{-- TEL --}}
                                <div class="row row-p">
                                    <div class="field">
                                        <input type="tel" autocomplete="tel" id="tel" name="tel" value="" onchange="this.setAttribute('value', this.value);" required>
                                        <label for="tel" title="Teléfono" data-title="Teléfono"></label>
                                    </div>
                                </div>

                                @if ($fisico)
                                    <h1 class="row-m">Dirección de envío:</h1>
                                @else
                                    <h1 class="row-m">Dirección de facturación:</h1>
                                @endif

                                {{-- PAIS Y ESTADO --}}
                                <div class="row">
                                    <div class="col-sm">
                                        <div class="field">
                                            <select name="country" class="countries order-alpha presel-MX" id="countryId" autocomplete="country-name" required>
                                                <option value="">Select Country</option>
                                            </select>
                                            <label for="countryId" title="País" data-title="País"></label>
                                        </div>
                                    </div>
                                    <div class="col-sm">
                                        <div class="field">
                                            <select name="state" class="states" id="stateId" required>
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

                                {{-- CALLE --}}
                                <div class="row row-p">
                                    <div class="field">
                                        <input type="text" autocomplete="street-address" id="calle" name="calle" value="" onchange="this.setAttribute('value', this.value);" required>
                                        <label for="calle" title="Calle y número de casa" data-title="Calle y número de casa"></label>
                                    </div>
                                </div>

                                {{-- NUM CASA Y CP --}}
                                <div class="row">
                                    <div class="col-sm">
                                        <div class="field">
                                            <input type="text" autocomplete="on" id="numCasa" name="numCasa" value="" onchange="this.setAttribute('value', this.value);">
                                            <label for="numCasa" title="Número interior (opcional)" data-title="Número interior (opcional)"></label>
                                        </div>
                                    </div>
                                    <div class="col-sm">
                                        <div class="field">
                                            <input type="text" pattern="[0-9]*" autocomplete="postal-code" id="cp"  name="cp" value="" onchange="this.setAttribute('value', this.value);" required>
	                                        <label for="cp" title="Código Postal" data-title="Código Postal"></label>
                                        </div>
                                    </div>
                                </div>

                                @if($fisico)

                                    {{-- REFERENCUAS --}}
                                    <div class="row row-p">
                                        <div class="field">
                                            <input type="text" autocomplete="on" id="referencias" name="referencias" value="" onchange="this.setAttribute('value', this.value);">
                                            <label for="referencias" title="Referencias (opcional)" data-title="Referencias (opcional)"></label>
                                        </div>
                                    </div>

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

                                <h1 class="row-m">¿Desea utilizar un cupón?</h1>
                            
                                {{-- CUPON --}}
                                <div class="row row-p">
                                    <div class="col-sm">
                                        <div class="field">
                                            <input type="text" autocomplete="off" id="cupon" name="cupon" value="" onchange="this.setAttribute('value', this.value);">
                                            <label for="cupon" title="Ingresar cupón (opcional)" data-title="Ingresar cupón (opcional)"></label>
                                        </div>
                                    </div>
                                    <div class="col-sm">
                                        <div class="field">
                                            <button onclick="validar()" type="button" class="boton_compra shrink" id="validarCupon" name="validarCupon" value="validarCupon" style="width: 100%; height: 42px; margin: 0px;">Validar cupón</button>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            

                        </div>

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
                                                        @if (!$hayNuevo && $libro->nuevo == 1)
                                                            @php
                                                                $hayNuevo = true;
                                                            @endphp
                                                        @endif
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
                                                <input type="hidden" id="subtotalHidden" name="subtotal" value="{{ number_format($total, 2 , ".", "" ) }}">
                                                <input type="hidden" id="totalHidden" name="total" value="{{ number_format($total, 2 , ".", "" ) }}">
                                                <input type="hidden" id="cuponHidden" name="descuento" value="">
                                                <input type="hidden" id="cupSelHidden" name="cuponId" value="">
                                            </div>
                                        </div>
                                    </div>
                                    {{-- <input type="submit" value="Realizar compra" class="shrink"> --}}
                                    <button type="submit" class="boton_compra shrink" name="action" value="paypal">Pago con Paypal</button>
                                    <button type="submit" class="boton_compra shrink" name="action" value="bancaria">Pago con transferencia o deposito bancario</button>
                                    <button type="submit" class="boton_compra shrink" name="action" value="stripe">Pago con tarjeta de crédito/débito</button>
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
                <button onclick="location.href='{{ route('carrito') }}'" type="button">
                    <div class="row" style="margin-right:0px; margin-left: auto;">
                        <img src="{{ asset('img/ico/blackarrow.png') }}">
                    </div>
                    <div class="row" style="margin-right:0px; margin-left: auto;">
                        Regresar al carrito
                    </div>
                </button>
                </div>
            </div>
        </form>

        {{-- SCRIPT PARA LOS SELECT DE LOS PAISES Y ESTADO --}}
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script> 
        <script src="//geodata.solutions/includes/countrystatecity.js"></script>

        <script>
            //se guarda el total
            var totalCosto = {{ $total }};
            var subtotal = {{ $total }};

            var envios = @json($envios);

            //obtenemos todos los cupones
            var cupones = @json($cupones);
            var cuponesUsuario = @json(session()->get('cupones'));
            var cuponSeleccionado = 0;

            var hayFisico = {{ json_encode($fisico) }};
            var hayNuevo = {{ json_encode($hayNuevo) }};
            
            window.onload = envioSelect;

            function validar() {
                //------------------------PROCESO DE VALIDACIÓN------------------------
                
                //valida que hay ingresado un cupón
                codigo = document.getElementById("cupon").value;
    
                //verifica que se haya ingresado un codigo
                if(codigo.length > 0){
                    
                    // valida que existan cupones
                    if(cupones.length > 0){
                        var cupon = null;
                        //busca el cupon
                        cupones.forEach(cupon2 => {
                            if(cupon2['codigo'] == codigo){
                                cupon = cupon2;
                            }
                        });

                        //si existe el cupon introducido...
                        if(cupon){
                            //si el cupon expira por la fecha se verifica que no haya expirado
                            if(cupon['limiteFecha']){
                                var today = Date.parse(new Date().toISOString().slice(0,10));
                                var cuponDate = Date.parse(cupon['limiteFecha']);

                                if(today > cuponDate){
                                    alert('Cupón no válido: Es posible que el cupón esté expirado o haya alcanzado su limite.');
                                    cuponSeleccionado = 0;
                                    return;
                                }
                            }
                            else if(cupon['numUsos'] <= 0){
                                //sino entonces significa que expira por el numero de usos
                                alert('Cupón no válido: Es posible que el cupón esté expirado o haya alcanzado su limite.');
                                cuponSeleccionado = 0;
                                return;
                            }

                            //si existe un minimo de compra...
                            if(cupon['minimoCompra']){
                                //verifica que el total u el subtotal (en caso de que haya libros físicos) sea igual o mayor que el minimo de compra
                                if(subtotal < cupon['minimoCompra']){
                                    alert('Cupón no válido: Para aplicar este cupón es necesario que su compra sea de al menos $'+formatearNumero(cupon['minimoCompra']));
                                    cuponSeleccionado = 0;
                                    return;
                                }
                            }

                            //aqui se verifica lo de si es reusable
                            if(cupon['reusable'] == 0){
                                if(cupon['id'] && cuponesUsuario && cuponesUsuario[cupon['id']]){
                                    alert('Cupón no válido: Este cupón solamente puede usarse una vez y ya ha sido utilizado en anteriores compras.');
                                    cuponSeleccionado = 0;
                                    return;
                                }
                            }

                            //window.location = "/prueba/" + cupon["id"];

                            //aqui se verifica si aplica en nuevos
                            if(cupon['nuevos'] == 1 && !hayNuevo){
                                alert('Cupón no válido: Este cupón solamente puede usarse si hay libros nuevos en el carrito. ¡Puedes verlos en la sección de NOVEDADES!');
                                cuponSeleccionado = 0;
                                return;
                            }

                            //---------------SI LLEGAMOS A ESTE PUNTO ENTONCES EL CUPON ES VALIDO-----------------------
                            cuponSeleccionado = cupon["id"];
                            //------------------------PROCESO DE APLICACIÓN------------------------

                            //obtenemos el envio
                            var envio = document.getElementById("envio");
                            var totalEnvio = document.getElementById("envio-totales");

                            //si no existe el subotal entonces se muestra
                            if(!hayFisico){
                                cuponHTML = document.getElementById("subtotalHTML");
                                cuponHTML.style.display = "flex";          
                            }
                            else{
                                if(envio){
                                    //verifica que el tipo de envio exista
                                    if(envio.value != ""){
                                        //se obtiene el envio de la BD
                                        envioData = getEnvio(envio.value);
                                    }
                                    else{
                                        return alert('Cupón no válido: Para aplicar este cupón es necesario que selecciones un envío.');
                                    }
                                }
                            }

                            var total = document.getElementById("total");

                            //se realiza el descuento
                            switch(cupon['tipo']){
                                case 'total':
                                    //se realiza el descuento en el total...
                                    //si es porcentaje entonces se realiza el descuento con porcentaje
                                    if(cupon['porcentajeDesc']){

                                        if(!hayFisico){
                                            //se pone la cantidad a descontar
                                            document.getElementById("cuponDescuento").innerHTML = "-$"+formatearNumero(subtotal*(cupon['porcentajeDesc']/100));

                                            //se actualiza el total
                                            total.innerHTML = "$"+formatearNumero(totalCosto - subtotal*(cupon['porcentajeDesc']/100));

                                            //se actualiza el hidden
                                            $('#totalHidden').val(totalCosto - subtotal*(cupon['porcentajeDesc']/100));
                                            $('#cuponHidden').val(subtotal*(cupon['porcentajeDesc']/100));
                                            $('#cupSelHidden').val(cuponSeleccionado);
                                            alert('Cupón aplicado: Se ha descontado el '+cupon['porcentajeDesc']+'% del total de tu compra!' );
                                        }
                                        else{
                                            if(envioData["costo"]){
                                                oldTotal = subtotal + envioData["costo"];

                                                //se pone la cantidad a descontar
                                                document.getElementById("cuponDescuento").innerHTML = "-$"+formatearNumero(oldTotal*(cupon['porcentajeDesc']/100));

                                                //se actualiza el total
                                                total.innerHTML = "$"+formatearNumero(oldTotal - oldTotal*(cupon['porcentajeDesc']/100));

                                                //se actualiza el hidden
                                                $('#totalHidden').val(oldTotal - oldTotal*(cupon['porcentajeDesc']/100));
                                                $('#cuponHidden').val(oldTotal*(cupon['porcentajeDesc']/100));
                                                $('#cupSelHidden').val(cuponSeleccionado);
                                                alert('Cupón aplicado: Se ha descontado el '+cupon['porcentajeDesc']+'% del total de tu compra!' );
                                            }
                                        }
                                    }
                                    else{
                                        //si no entonces se descuenta una cierta cantidad
                                        if(!hayFisico){
                                            //se calcula el total
                                            var nuevoTotal = totalCosto - cupon['valorDesc'];
                                            //se verifica que el costo no sea cero
                                            if(nuevoTotal > 0){
                                                //se pone la cantidad a descontar
                                                document.getElementById("cuponDescuento").innerHTML = "-$"+formatearNumero(cupon['valorDesc']);

                                                //se actualiza el total
                                                total.innerHTML = "$"+formatearNumero(totalCosto - cupon['valorDesc']);

                                                //se actualiza el hidden
                                                $('#totalHidden').val(totalCosto - cupon['valorDesc']);
                                                $('#cuponHidden').val(cupon['valorDesc']);
                                                $('#cupSelHidden').val(cuponSeleccionado);
                                                alert('Cupón aplicado: Se ha descontado la cantidad de $'+ formatearNumero(cupon['valorDesc']) +' del total de tu compra!' );
                                            }
                                            else{
                                                //se pone la cantidad a descontar
                                                document.getElementById("cuponDescuento").innerHTML = "-$"+formatearNumero(totalCosto);

                                                //se actualiza el total
                                                total.innerHTML = "$"+formatearNumero(0);

                                                //se actualiza el hidden
                                                $('#totalHidden').val(0);
                                                $('#cuponHidden').val(cupon['valorDesc']);
                                                $('#cupSelHidden').val(cuponSeleccionado);
                                                alert('Cupón aplicado: Se ha descontado la cantidad de $'+ formatearNumero(cupon['valorDesc']) +' del total de tu compra!' );
                                            }
                                        }
                                        else{
                                            if(envioData["costo"]){
                                                oldTotal = subtotal + envioData["costo"];

                                                //se calcula el total
                                                var nuevoTotal = oldTotal - cupon['valorDesc'];

                                               //se verifica que el costo no sea cero
                                                if(nuevoTotal > 0){
                                                    //se pone la cantidad a descontar
                                                    document.getElementById("cuponDescuento").innerHTML = "-$"+formatearNumero(cupon['valorDesc']);

                                                    //se actualiza el total
                                                    total.innerHTML = "$"+formatearNumero(oldTotal - cupon['valorDesc']);

                                                    //se actualiza el hidden
                                                    $('#totalHidden').val(oldTotal - cupon['valorDesc']);
                                                    $('#cuponHidden').val(cupon['valorDesc']);
                                                    $('#cupSelHidden').val(cuponSeleccionado);
                                                    alert('Cupón aplicado: Se ha descontado la cantidad de $'+ formatearNumero(cupon['valorDesc']) +' del total de tu compra!' );
                                                }
                                                else{
                                                    //se pone la cantidad a descontar
                                                    document.getElementById("cuponDescuento").innerHTML = "-$"+formatearNumero(oldTotal);

                                                    //se actualiza el total
                                                    total.innerHTML = "$"+formatearNumero(0);

                                                    //se actualiza el hidden
                                                    $('#totalHidden').val(0);
                                                    $('#cuponHidden').val(cupon['valorDesc']);
                                                    $('#cupSelHidden').val(cuponSeleccionado);
                                                    alert('Cupón aplicado: Se ha descontado la cantidad de $'+ formatearNumero(cupon['valorDesc']) +' del total de tu compra!' );
                                                }
                                            }
                                        }
                                    }
                                    break;
                                case 'envio':
                                    //se realiza el descuento en el envio...
                                    //se comprueba que haya envio...
                                    if(hayFisico){
                                        //si es porcentaje entonces se realiza el descuento con porcentaje
                                        if(cupon['porcentajeDesc']){

                                            if(envioData["costo"]){
                                                descuentoEnvioP = envioData["costo"] - (envioData["costo"]*(cupon['porcentajeDesc']/100));

                                                //se pone la cantidad a descontar
                                                document.getElementById("cuponDescuento").innerHTML = "-$"+formatearNumero(descuentoEnvioP);

                                                //se actualiza el total
                                                total.innerHTML = "$"+formatearNumero(subtotal + descuentoEnvioP);

                                                //se actualiza el hidden
                                                $('#totalHidden').val(subtotal + descuentoEnvioP);
                                                $('#cuponHidden').val(descuentoEnvioP);
                                                $('#cupSelHidden').val(cuponSeleccionado);
                                                alert('Cupón aplicado: Se ha descontado el '+cupon['porcentajeDesc']+'% del costo de envío de tu compra!' );
                                            }
                                        }
                                        else{
                                            //si no entonces se descuenta una cierta cantidad
                                            if(envioData["costo"]){
                                                //se calcula el total
                                                var nuevoTotal = envioData["costo"] - cupon['valorDesc'];

                                                //se verifica que el costo no sea cero
                                                if(nuevoTotal > 0){
                                                    //se pone la cantidad a descontar
                                                    document.getElementById("cuponDescuento").innerHTML = "-$"+formatearNumero(cupon['valorDesc']);

                                                    //se actualiza el total
                                                    total.innerHTML = "$"+formatearNumero(totalCosto + envioData["costo"] - cupon['valorDesc']);

                                                    //se actualiza el hidden
                                                    $('#totalHidden').val(totalCosto + envioData["costo"] - cupon['valorDesc']);
                                                    $('#cuponHidden').val(cupon['valorDesc']);
                                                    $('#cupSelHidden').val(cuponSeleccionado);
                                                    alert('Cupón aplicado: Se ha descontado la cantidad de $'+ formatearNumero(cupon['valorDesc']) +' del costo de envío de tu compra!' );
                                                }
                                                else{
                                                    //se pone la cantidad a descontar
                                                    document.getElementById("cuponDescuento").innerHTML = "-$"+formatearNumero(envioData["costo"]);

                                                    //se actualiza el total
                                                    total.innerHTML = "$"+formatearNumero(totalCosto);

                                                    //se actualiza el hidden
                                                    $('#totalHidden').val(totalCosto);
                                                    $('#cuponHidden').val(envioData["costo"]);
                                                    $('#cupSelHidden').val(cuponSeleccionado);
                                                    alert('Cupón aplicado: Se ha descontado la cantidad de $'+ formatearNumero(envioData["costo"]) +' del costo de envío de tu compra!' );
                                                }
                                            }
                                        }
                                    }
                                    else{
                                        return alert("Cupón no válido: Para poder aplicar este cupón es necesario que tenga libros físicos en su carrito y que seleccione un tipo de envío.");
                                    }
                                    break;
                                case 'compra':
                                    //se realiza el descuento en el total...
                                    //si es porcentaje entonces se realiza el descuento con porcentaje
                                    if(cupon['porcentajeDesc']){

                                        if(!hayFisico){
                                            var totalCompraDesc = subtotal - (subtotal*(cupon['porcentajeDesc']/100));

                                            //se pone la cantidad a descontar
                                            document.getElementById("cuponDescuento").innerHTML = "-$"+formatearNumero(subtotal*(cupon['porcentajeDesc']/100));

                                            //se actualiza el total
                                            total.innerHTML = "$"+formatearNumero(totalCompraDesc);

                                            //se actualiza el hidden
                                            $('#totalHidden').val(totalCompraDesc);
                                            $('#cuponHidden').val(subtotal*(cupon['porcentajeDesc']/100));
                                            $('#cupSelHidden').val(cuponSeleccionado);
                                            alert('Cupón aplicado: Se ha descontado el '+cupon['porcentajeDesc']+'% del total de tu compra!' );
                                        }
                                        else{
                                            if(envioData["costo"]){
                                                var totalCompraDesc = subtotal - (subtotal*(cupon['porcentajeDesc']/100));

                                                //se pone la cantidad a descontar
                                                document.getElementById("cuponDescuento").innerHTML = "-$"+formatearNumero(subtotal*(cupon['porcentajeDesc']/100));

                                                //se actualiza el total
                                                total.innerHTML = "$"+formatearNumero(totalCompraDesc + envioData["costo"]);

                                                //se actualiza el hidden
                                                $('#totalHidden').val(totalCompraDesc + envioData["costo"]);
                                                $('#cuponHidden').val(subtotal*(cupon['porcentajeDesc']/100));
                                                $('#cupSelHidden').val(cuponSeleccionado);
                                                alert('Cupón aplicado: Se ha descontado el '+cupon['porcentajeDesc']+'% del subtotal de tu compra!' );
                                            }
                                        }
                                    }
                                    else{
                                    //si no entonces se descuenta una cierta cantidad
                                        if(!hayFisico){
                                            //se calcula el total
                                            var nuevoTotal = totalCosto - cupon['valorDesc'];
                                            //se verifica que el costo no sea cero
                                            if(nuevoTotal > 0){
                                                //se pone la cantidad a descontar
                                                document.getElementById("cuponDescuento").innerHTML = "-$"+formatearNumero(cupon['valorDesc']);

                                                //se actualiza el total
                                                total.innerHTML = "$"+formatearNumero(totalCosto - cupon['valorDesc']);

                                                //se actualiza el hidden
                                                $('#totalHidden').val(totalCosto - cupon['valorDesc']);
                                                $('#cuponHidden').val(cupon['valorDesc']);
                                                $('#cupSelHidden').val(cuponSeleccionado);
                                                alert('Cupón aplicado: Se ha descontado la cantidad de $'+ formatearNumero(cupon['valorDesc']) +' del subtotal de tu compra!' );
                                            }
                                            else{
                                                //se pone la cantidad a descontar
                                                document.getElementById("cuponDescuento").innerHTML = "-$"+formatearNumero(totalCosto);

                                                //se actualiza el total
                                                total.innerHTML = "$"+formatearNumero(0);

                                                //se actualiza el hidden
                                                $('#totalHidden').val(0);
                                                $('#cuponHidden').val(totalCosto);
                                                $('#cupSelHidden').val(cuponSeleccionado);
                                                alert('Cupón aplicado: Se ha descontado la cantidad de $'+ formatearNumero(totalCosto) +' del subtotal de tu compra!' );
                                            }
                                        }
                                        else{
                                            if(envioData["costo"]){
                                                //se calcula el total
                                                var nuevoTotal = subtotal - cupon['valorDesc'];
                                                //se verifica que el costo no sea cero
                                                if(nuevoTotal > 0){
                                                    //se pone la cantidad a descontar
                                                    document.getElementById("cuponDescuento").innerHTML = "-$"+formatearNumero(cupon['valorDesc']);

                                                    //se actualiza el total
                                                    total.innerHTML = "$"+formatearNumero(nuevoTotal + envioData["costo"]);

                                                    //se actualiza el hidden
                                                    $('#totalHidden').val(nuevoTotal + envioData["costo"]);
                                                    $('#cuponHidden').val(cupon['valorDesc']);
                                                    $('#cupSelHidden').val(cuponSeleccionado);
                                                    alert('Cupón aplicado: Se ha descontado la cantidad de $'+ formatearNumero(cupon['valorDesc']) +' del subtotal de tu compra!' );
                                                }
                                                else{
                                                    //se pone la cantidad a descontar
                                                    document.getElementById("cuponDescuento").innerHTML = "-$"+formatearNumero(totalCosto);

                                                    //se actualiza el total
                                                    total.innerHTML = "$"+formatearNumero(envioData["costo"]);

                                                    //se actualiza el hidden
                                                    $('#totalHidden').val(envioData["costo"]);
                                                    $('#cuponHidden').val(totalCosto);
                                                    $('#cupSelHidden').val(cuponSeleccionado);
                                                    alert('Cupón aplicado: Se ha descontado la cantidad de $'+ formatearNumero(cupon['valorDesc']) +' del subtotal de tu compra!' );
                                                }
                                            }
                                        }
                                    }
                                    break;
                                case 'descargas':
                                    //se pone la cantidad a descontar
                                    document.getElementById("cuponDescuento").innerHTML = "Descargas ilimitadas";
                                    $('#cuponHidden').val('descargas');
                                    $('#cupSelHidden').val(cuponSeleccionado);
                                    alert('Cupón aplicado: Puedes descargar los libros digitales de manera ilimitada.');
                                    break;
                            }
                            //se muestra el descuento en la compra
                            cuponHTML = document.getElementById("cuponHTML");
                            cuponHTML.style.display = "flex";

                            return;
                        }
                        alert('Cupón no válido.'); 
                    }
                }
            }
            
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
                if(envio){
                    //ya no es valido el cupon
                    if(cuponSeleccionado != 0){
                        cuponSeleccionado = 0;
                        document.getElementById("cuponDescuento").innerHTML = "$0";
                        $('#cuponHidden').val(0);
                    }
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

                            $('#totalHidden').val(totalCosto + envioData["costo"]);
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
            }
        </script>
    </body>
</html>
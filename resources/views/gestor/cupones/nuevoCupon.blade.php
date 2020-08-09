@extends('layouts.menuGestor')

@section('importOwl')
    <link rel="stylesheet" type="text/css" href="/assets/css/gestorAutores.css">
    <link rel="stylesheet" type="text/css" href="/assets/css/gestorBlogs.css">
    <link rel="stylesheet" type="text/css" href="/assets/css/gestorCupones.css">
@endsection

@section('menu')
    <a href="{{Route('verCupones')}}">Cupones</a> | Nuevo cupón
@endsection

@section('contenido')

@if($errors->any())
    <div class="alert alert-danger" role="alert">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
@endif
    <div class="div_containerAuthor">
        <div class="div_datosAuthor">
            <form action="{{ route('nuevoCupon') }}" style="width:100%;" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="div_elementosAuthor50">
                    <p class="txt_datosAuthor">Código:</p>
                    <input name="codigo" class="input_datosAuthor margin_cupones" type="text" value="{{old('codigo')}}" required autofocus>
                </div>
                <p class="txt_datosAuthor">Tipo:</p>
                <select id="tipoSelect" name="tipo" class="select_tipoCupon" value="{{old('tipo')}}" required>
                    <option value="" disabled selected>Selecciona un tipo</option>
                    <option value="compra">Compra</option>
                    <option value="envio">Envío</option>
                    <option value="total">Total</option>
                    <option value="descargas">Descargas Ilimitadas</option>
                </select>
                <div class="div_radioCupones">
                    <div class="">
                        <input type="radio" id="fecha" name="expira" value="fecha" onclick="checkFecha()" required>
                        <label for="fecha">Fecha</label>
                    </div>
                    <div class="">
                        <input type="radio" id="usos" name="expira" value="usos" onclick="checkUsos()" required>
                        <label for="usos">Usos</label>
                    </div>
                </div>
                <div id="div_fechaVencimiento" style="display:none;" class="div_elementosAuthor50">
                    <p class="txt_datosAuthor">Fecha Vencinciento:</p>
                    <input id="limiteFecha" name="limiteFecha" style="margin-left: 0px" class="input_datosAuthor margin_cupones10" type="date" value="{{old('limiteFecha')}}">
                </div>
                <div id="div_limiteUsos" style="display:none;" class="div_elementosAuthor50">
                    <p class="txt_datosAuthor">Número de usos:</p>
                    <input id="limiteUsos" name="limiteUsos" class="input_datosAuthor input_datosAuthor50 margin_cupones10" type="number" min="1" value="{{old('limiteUsos')}}" pattern="^[0-9]+" 
                    onpaste="return false;" onDrop="return false;" autocomplete=off step="1"
                    onkeypress="return solonumeros(event)">
                </div>
                <div class="div_elementosAuthor50">
                    <p class="txt_datosAuthor">Mínimo de compra:</p>
                    <input name="minimoCompra" class="input_datosAuthor input_datosAuthor50 margin_cupones10" type="number" min="1" value="{{old('minimoCompra')}}" pattern="^[0-9]+" 
                    onpaste="return false;" onDrop="return false;" autocomplete=off step="1"
                    onkeypress="return solonumerosdecimales(event)">
                </div> 
                <label class= "txt_datosAuthor" for="reusable">Reusable</label>
                <input name="reusable" value="reusable" id="reusable" type="checkbox" class="switch"><br>
                <label class= "txt_datosAuthor" for="nuevos">¿Solo aplica en nuevos?</label>
                <input name="nuevos" value="nuevos" id="nuevos" type="checkbox" class="switch">
                <br>

                <div class="div_radioCupones">
                    <div class="">
                        <input type="radio" style="display:none;" id="porcentaje" name="tipoCantidad" value="porcentaje" onclick="checkPorcentaje()">
                        <label  style="display:none;" id="labelPorcentaje" for="porcentaje">Porcentaje</label>
                    </div>
                    <div class="">
                        <input type="radio"  style="display:none;" id="valor" name="tipoCantidad" value="valor" onclick="checkValor()">
                        <label  style="display:none;" id="labelValor" for="valor">Valor</label>
                    </div>
                </div>

                <div id="div_porcentajeDescuento" style="display:none;" class="div_elementosAuthor50">
                    <p id="pPorcentajeDesc" class="txt_datosAuthor">Porcentaje Descuento:</p>
                    <input id="porcentajeDescuento" name="porcentajeDescuento" class="input_datosAuthor input_datosAuthor50 margin_cupones10" type="number" min="1" value="{{old('porcentajeDescuento')}}" pattern="^[0-9]+" 
                    onpaste="return false;" onDrop="return false;" autocomplete=off step="1"
                    onkeypress="return solonumerosdecimales(event)">
                </div> 
                <div id="div_valorDescuento" style="display:none;" class="div_elementosAuthor50">
                    <p id="pValorDesc" class="txt_datosAuthor">Valor Descuento:</p>
                    <input id="valorDescuento" name="valorDescuento" class="input_datosAuthor input_datosAuthor50 margin_cupones10" type="number" min="1" value="{{old('valorDescuento')}}" pattern="^[0-9]+" 
                    onpaste="return false;" onDrop="return false;" autocomplete=off step="1"
                    onkeypress="return solonumerosdecimales(event)">
                </div> 

                <div class="botones_blog_100">
                    <div class="botones_blog_derecha">
                        <a class="gestor_blog_cancelar" href="javascript:history.back(-1);">Cancelar</a>
                        <input class="gestor_blog_guardar" type="submit" value="Guardar">	
                    </div>
                </div>
            </form>
        </div>
    </div>
    <br>
    <br>

    <script>
        function solonumeros(e){
            key=e.keyCode || e.which;
            teclado=String.fromCharCode(key);
            numeros="0123456789";
            especiales=[8];
            teclado_especial=false;
    
            for(var i in especiales){
                if(key==especiales[i]){
                    teclado_especial=true;
                }
            }
            if(numeros.indexOf(teclado)==-1 && !teclado_especial){
                return false;
            }
        }
        function solonumerosdecimales(e){
            key=e.keyCode || e.which;
            teclado=String.fromCharCode(key);
            numeros="0123456789";
            especiales=[8,46];
            teclado_especial=false;

            for(var i in especiales){
                if(key==especiales[i]){
                    teclado_especial=true;
                }
            }
            if(numeros.indexOf(teclado)==-1 && !teclado_especial){
                return false;
            }
        }
    </script>
    <script>
        var valor="";
         $(document).ready(function() {
            $('#tipoSelect').change(function () {
                if(this.value!='descargas'){
                    $('#porcentaje').show();
                    $('#valor').show();
                    $('#labelPorcentaje').show();
                    $('#labelValor').show();
                    $('#porcentaje').prop("required", true);
                    $('#valor').prop("required", true);
                }
                else{
                    $('#porcentaje').hide();
                    $('#valor').hide();
                    $('#labelPorcentaje').hide();
                    $('#labelValor').hide();
                    $('#div_valorDescuento').hide();
                    $('#div_porcentajeDescuento').hide();
                    $('#porcentaje').prop("checked", false);
                    $('#valor').prop("checked", false);
                    $('#porcentaje').prop("required", false);
                    $('#valor').prop("required", false);
                    $('#porcentajeDescuento').prop("required", false);
                    $('#valorDescuento').prop("required", false);
                    document.getElementById('valorDescuento').value=valor;
                    document.getElementById('porcentajeDescuento').value=valor;

                }
            });
        });
        function checkFecha() {
            var valor="";
            $('#div_fechaVencimiento').show();
            $('#div_limiteUsos').hide();
            document.getElementById('limiteUsos').value=valor;
            $('#limiteFecha').prop("required", true);
            $('#limiteUsos').prop("required", false);
        }
        function checkUsos() {
            var valor="";
            $('#div_fechaVencimiento').hide();
            $('#div_limiteUsos').show();
            document.getElementById('limiteFecha').value=valor;
            $('#limiteFecha').prop("required", false);
            $('#limiteUsos').prop("required", true);
        }
        function checkPorcentaje() {
            var valor="";
            $('#div_porcentajeDescuento').show();
            $('#div_valorDescuento').hide();
            document.getElementById('valorDescuento').value=valor;
            $('#porcentajeDescuento').prop("required", true);
            $('#valorDescuento').prop("required", false);
        }
        function checkValor() {
            var valor="";
            $('#div_porcentajeDescuento').hide();
            $('#div_valorDescuento').show();
            document.getElementById('porcentajeDescuento').value=valor;
            $('#porcentajeDescuento').prop("required", false);
            $('#valorDescuento').prop("required", true);
        }
    </script>
@endsection


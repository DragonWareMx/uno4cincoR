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
                <div class="div_elementosAuthor">
                    <p class="txt_datosAuthor">Código:</p>
                    <input name="codigo" class="input_datosAuthor" type="text" value="{{old('codigo')}}" required autofocus>
                </div>
                <input type="radio" id="fecha" name="expira" value="fecha">
                <label for="fecha">Fecha</label>
                <input type="radio" id="usos" name="expira" value="usos">
                <label for="usos">Usos</label>
                <div class="div_elementosAuthor">
                    <p class="txt_datosAuthor">Fecha Nacimiento:</p>
                    <input name="limiteFecha" style="margin-left: 0px" class="input_datosAuthor dateAuthor" type="date" value="{{old('limiteFecha')}}">
                </div>
                <div class="div_elementosAuthor50">
                    <p class="txt_datosAuthor">Número de usos:</p>
                    <input name="limiteUsos" class="input_datosAuthor input_datosAuthor50" type="number" min="1" value="{{old('paginas')}}" pattern="^[0-9]+" 
                    onpaste="return false;" onDrop="return false;" autocomplete=off step="1"
                    onkeypress="return solonumeros(event)">
                </div>
                <div class="div_elementosAuthor50">
                    <p class="txt_datosAuthor">Mínimo de compra:</p>
                    <input name="limiteUsos" class="input_datosAuthor input_datosAuthor50" type="number" min="1" value="{{old('paginas')}}" pattern="^[0-9]+" 
                    onpaste="return false;" onDrop="return false;" autocomplete=off step="1"
                    onkeypress="return solonumerosdecimales(event)">
                </div> 
                <label class= "txt_datosAuthor" for="reusable">Reusable</label>
                <input name="reusable" value="reusable" id="reusable" type="checkbox" class="switch"><br>
                <label class= "txt_datosAuthor" for="nuevos">¿Solo aplica en nuevos?</label>
                <input name="nuevos" value="nuevos" id="nuevos" type="checkbox" class="switch">

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
@endsection


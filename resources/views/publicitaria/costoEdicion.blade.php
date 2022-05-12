@extends('layouts.layoutPubli')

@section('header')
<title>Costo Edición | ElBooke</title>

<link rel="stylesheet" type="text/css" href="/assets/css/style_SobreNosotros.css">
<link rel="stylesheet" type="text/css" href="/assets/css/contacto.css">
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>

<link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Karla&display=swap" rel="stylesheet">

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<style>
    .titlulo-ce{
        font-family:'Montserrat';
        font-weight:bold;
        font-size:25px;
        color:#362358;
        width:100%;
        margin-top:15px;
        text-align:center;
    }
    .descripcion-ce{
        font-family:'Montserrat';
        font-weight:Medium;
        font-size:15px;
        color:#362358;
        width:50%;
        margin-top:13px;
        text-align:center;
        margin:auto;
    }
    .text-checkbox-ce{
        margin-right:15px !important;
        font-family:'Montserrat';
        font-weight:600;
        font-size:18px;
        color:#362358;
    }
    .div-checkbox-ce{
        margin-top:10px;
        margin-left:25px !important;
    }
    .input-ce{
        outline: none;
        border: 1px solid #707070;
        border-radius:5px;
        padding:3px;
    }

    #ex1RangePicker .rangepicker-selection {
        background: #1FC6AC !important;
    }

    .cj-button {
        width: 200px;
        background-color: #1FC6AC;

        font-family: 'Montserrat';
        font-style: normal;
        font-weight: bold;
        font-size: 15px;
        line-height: 19px;
        text-align:center;

        border: none;
        color: white;

        padding-top: 12px;
        /* padding-left:25px;
        padding-right:25px; */
        padding-bottom: 12px;

        box-sizing: border-box;
        border-radius: 25px;
        outline: none;
        transition-duration: .1s, .1s;
        -webkit-transition-timing-function: ease-out, cubic-bezier(.82, .1, .14, 1.12);
        transition-timing-function: ease-out, cubic-bezier(.82, .1, .14, 1.12);
        -webkit-box-shadow: 0px 3px 6px 0px rgb(0 0 0 / 16%);
        -moz-box-shadow: 0px 3px 6px 0px rgba(0, 0, 0, 0.16);
        box-shadow: 0px 3px 6px 0px rgb(0 0 0 / 16%);
    }
    .cj-button:hover {
        width: 190px;
        font-size: 14px;
        transition-duration: .1s, .1s;
    }
    .range-ce{
        width:60%;
    }
    @media(max-width:1000px){
        .range-ce{
        width:90%;
        }
        .descripcion-ce{
            width:70%;
        }
    }
    @media(max-width:600px){
        .text-checkbox-ce{
            font-size:15px !important;
        }
        .descripcion-ce{
            font-size:13px;
        }
        .titlulo-ce{
            font-size:22px;
        }
    }
</style>
@endsection

@section('content')
<section class="section" id="about" style="width:100%; height:100%;">
    <div class="container">
        <p class="titlulo-ce">Calcula el costo de tu edición</p>

        <div style="width:100%; display:flex; justify-content:center; margin:60px 0px 40px 0px; flex-wrap:wrap">
            <div class="form-check form-check-inline div-checkbox-ce">
                <label class="form-check-label text-checkbox-ce" for="impresion">Impresión</label>
                <input class="form-check-input" type="checkbox" id="impresion">
                
            </div>
            <div class="form-check form-check-inline div-checkbox-ce">
                <label class="form-check-label text-checkbox-ce" for="ebook">Ebook</label>
                <input class="form-check-input" type="checkbox" id="ebook">
            </div>
            <div class="form-check form-check-inline div-checkbox-ce">
                <label class="form-check-label text-checkbox-ce" for="correccion">Correción</label>
                <input class="form-check-input" type="checkbox" id="correccion">
            </div>
            <div class="form-check form-check-inline div-checkbox-ce">
                <label class="form-check-label text-checkbox-ce" for="diseño">Diseño</label>
                <input class="form-check-input" type="checkbox" id="diseño">
            </div>
            <div class="form-check form-check-inline div-checkbox-ce">
                <label class="form-check-label text-checkbox-ce" for="todo">Todo</label>
                <input class="form-check-input" type="checkbox" id="todo">
            </div>
        </div>

        <div style="display:flex; align-items:center; justify-content:center; margin-bottom:40px; flex-wrap:wrap">
            <p class="text-checkbox-ce" style="font-size:20px; font-weight:bold">Número de palabras</p>
            <input class="input-ce" type="number" min="0" name="palabras" required>
        </div>

        <div class="range-ce" style="margin:auto; margin-bottom:40px">
            <input class="form-range" style="width:100%" id="customRange1"  type="range" data-min="0"  data-step="1"  data-max="60000" data-value="24957"/>
            <p class="text-checkbox-ce" style="font-size:20px; font-weight:bold">24,957</p>
        </div>
        
        <p class="titlulo-ce" style="margin-bottom:40px">175 páginas &nbsp;&nbsp;&nbsp;&nbsp;    $ 21,700 mx</p>
        <p class="descripcion-ce" style="margin-bottom:40px">El costo y número de páginas es aproximado, puede variar según tu proyecto. Por favor contacta a un agente* </p>
    
        <div style="width:100%; display:flex; align-items:center; justify-content:center;">
            <a href="#!" class="cj-button shrink"  style="text-decoration: none; color: white;">Contactar Agente</a>
        </div>
    </div>
</section>
@endsection
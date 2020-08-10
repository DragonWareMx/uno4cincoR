@extends('layouts.layoutPubli')

@section('header')
<title>Descarga | Editorial uno4cinco</title>

<link rel="stylesheet" type="text/css" href="/assets/css/style_SobreNosotros.css">

<link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Karla&display=swap" rel="stylesheet">
@endsection

@section('content')

<section class="section" id="about" style="width:100%; height:100%; background-color:#F2ECD5">
    {{-- TITTLE --}}
    <p class="txt-TitulosApartados">Gracias por tu compra en uno4cinco</p>
    <hr class="hr-Titulos-long">
    <hr class="hr-Titulos-small">
    {{-- BANNER IMAGE --}}

    

    <p class="p-txt-content">
        Tu descarga debería empezar automaticamente. <br> En caso de que no se haya descargado, por favor use <a href="{{asset('/public/storage/descargas/'.$libro->linkDescarga)}}" download>este enlace </a>. 
    </p>
</section>
@endsection
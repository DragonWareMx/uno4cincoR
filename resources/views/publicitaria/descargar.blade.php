@extends('layouts.layoutPubli')

@section('header')
<title>Descarga | ElBooke</title>

<link rel="stylesheet" type="text/css" href="/assets/css/style_SobreNosotros.css">

<link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Karla&display=swap" rel="stylesheet">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
@endsection

@section('content')

<section class="section" id="about" style="width:100%; height:100%; background-color:#F2ECD5">
    {{-- TITTLE --}}
    <p class="txt-TitulosApartados">Gracias por tu compra en uno4cinco</p>
    <hr class="hr-Titulos-long">
    <hr class="hr-Titulos-small">
    {{-- BANNER IMAGE --}}

    

    <p class="p-txt-content">
        Tu descarga debería empezar automaticamente. <br> En caso de que no se haya descargado, por favor use <a id="downloadLink" href="{{Storage::url('descargas/'.$libro->linkDescarga)}}" download>este enlace </a>. 
    </p>
    <div style="align-items: center; align-content:center;width: 100%;text-align:center;">
        <img src="/img/quienessomos/6007.png" style="width: 250px; margin-left: auto;
    margin-right: auto;">
    </div>

    
</section>

<script type="text/javascript"> 
    $(document).ready(function () { 
        setTimeout(
        function() 
        {
            $("#downloadLink")[0].click();
        }, 2000); 
    }); 
</script> 
@endsection
@extends('layouts.layoutPubli')

@section('header')
<title>Quiénes somos | Editorial uno4cinco</title>

<link rel="stylesheet" type="text/css" href="/assets/css/style_SobreNosotros.css">
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>

<link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Karla&display=swap" rel="stylesheet">
@endsection

@section('content')

<section class="section" id="about" style="width:100%; height:100%; background-color:#F2ECD5">
    {{-- TITTLE --}}
    <p class="txt-TitulosApartados">¿QUIÉNES SOMOS?</p>
    <hr class="hr-Titulos-long">
    <hr class="hr-Titulos-small">
    {{-- BANNER IMAGE --}}
    <img src="/img/quienessomos/slogan.png" class="img-banne-quienessomos">

    <p class="txt-SubtitulosApartados">Nosotros</p>

    <p class="p-txt-content">
        Como empresa creemos que <b>el arte humaniza</b>, por lo que nos es preciso recuperar el clásico 
        proceso editorial y el <b>sagrado vínculo espiritual entre escritora editora lectora</b>, que ha 
        dado como resultado los libros más emblemáticos de la historia, bajo la cíclica mirada del siglo 
        XXI. 
    </p>
    <p class="p-txt-content">
        Esto implica, por supuesto, una adecuada corrección de estilo, un diseño editorial elegante y un 
        preciso maquetado para que el lanzamiento digital y/o la impresión se den en las mejores condiciones, 
        asegurando así, que estos lleguen siempre ti a través de nuestro sistema CCS: <b>Calidad en la obra, 
        Comodidad en la compra y Seguridad en la entrega.</b>
    </p>

    <p class="txt-SubtitulosApartados" style="margin-top: 35px">Misión</p>

    <div class="div-mision-vision">
        <div class="img-quienessomos" style="width: 30%">
            <img src="/img/quienessomos/6007.png" style="width: 80%; margin-left:10%; margin-right:10%">
        </div>
        <div class="div-txt-quienessomos" style="border-left: 4px solid #29B390; padding-left: 2%;">
            <p class="p-txt-mision-vision">Servir como medio para la edición y divulgación de obras artísticas literarias de valor 
                humano que contribuyan siempre al crecimiento, sostenimiento y vinculación de la comunidad 
                lectoescritora.
            </p>
        </div>
    </div>

    <p class="txt-SubtitulosApartados" style="margin-top: 20px">Visión</p>

    <div class="div-mision-vision">
        <div class="div-txt-quienessomos" style="padding-right: 2%; border-right: 4px solid #29B390;">
            <p class="p-txt-mision-vision" >Sentar las bases necesarias para la creación de una nueva forma 
                de entender el concepto de consumo de literatura, teniendo siempre en cuenta a la ser humano 
                como origen y fin de toda actividad artística. 
            </p>
        </div>
        <div class="img-quienessomos" style="width: 30%; ">
            <img src="/img/quienessomos/4715.png" style="width: 80%;">
        </div>
    </div>

</section>
@endsection
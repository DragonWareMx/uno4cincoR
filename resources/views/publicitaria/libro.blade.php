@extends('layouts.layoutPubli')

@section('header')
<title>Libro | Editorial uno4cinco</title>

<link rel="stylesheet" type="text/css" href="/assets/css/style_SobreNosotros.css">
<link rel="stylesheet" type="text/css" href="/assets/css/libro.css">

<link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Karla&display=swap" rel="stylesheet">
@endsection

@section('content')

<section class="section" id="about" style="width:100%; height:100%; background-color:#F2ECD5">
    {{-- TITTLE --}}
    <p class="txt-TitulosApartados">Tienda | Estos poemas culeros que son lo menos culero que tengo</p>
    <hr class="hr-Titulos-long">
    <hr class="hr-Titulos-small">
    
    <div class="container-fluid">
        {{-- INFORMACIÓN DEL LIBRO --}}
        <div class="row">
            <div class="libro-tabla">
                <div class="libro-cell libro-cell-md libro-cell-head">
                    <div class="libro-fotos">
                        <img src="{{asset('storage/libros/agustinC.JPG')}}">
                        {{-- Aqui debe ir el slider --}}
                    </div>
                </div>
                <div class="libro-cell libro-cell-lg libro-cell-footer">
                    <div class="libro-info">
                        <p><b>Autor: </b>José Agustín Solórzano</p>
                        <p><b>Género: </b>Comedia :v</p>
                        <p><b>Fecha de publicación: </b>2 de Agoso de 2019</p>
                        <p><b>Número de páginas: </b>523</p>
                        <p><b>Editorial: </b>uno4cinco</p>
                        <p><b>Formato: </b>Físico</p>

                        {{-- Contenido del libro --}}
                        <p>
                            << Lorem ipsum dolor sit amet consectetur adipiscing elit, 
                            quis at sollicitudin magna phasellus lacus tempus hac, primis ad morbi tortor interdum placerat. 
                            Tellus platea eros dictum maecenas cubilia cursus pellentesque dictumst at, sagittis ad tortor 
                            massa torquent tincidunt ante ultrices fringilla vitae, per pharetra rhoncus congue gravida 
                            feugiat laoreet nisl. Fames congue rutrum montes velit imperdiet euismod neque mollis, vehicula 
                            convallis aptent massa >>
                        </p>
                        <p class="leer-mas">
                            Leer más
                        </p>
                    </div>
                </div>
                <div class="libro-cell libro-cell-md libro-cell-middle">
                    <div class="libro-comprar">
                        <div class="comprar">
                            {{-- PRECIOS --}}
                            {{-- FISICO --}}

                            <div class="precio">
                                <div class="oferta">
                                    $278.57
                                </div>

                                $240.00
                            </div>

                            {{-- AHORRO (EN CASO DE OFERTA) --}}
                            <div class="ahorro">
                                <p>Ahorras: $38.57</p>
                            </div>

                            {{-- DISPONIBILIDAD --}}
                            <div class="disponibilidad">
                                <p style="color: #29B390;">Disponible</p>
                            </div>

                            {{-- EN CASO DE QUE EL LIBRO ESTÉ DISPONIBLE SE MUESTRA EL SIGUIENTE MENSAJE --}}
                            <div class="mensaje">
                                <p>
                                    Pueden aplicarse gastos de envío,
                                </p>
                                <a href="#">
                                    detalles
                                </a>
                            </div>

                            {{-- BOTONES DE COMPRA --}}
                            <button class="carrito-button shrink"><img src="{{asset('img/ico/carrito.PNG')}}"> Agregar al carrito</button>
                            <button class="comprar-button shrink">Comprar ahora</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    

</section>
@endsection
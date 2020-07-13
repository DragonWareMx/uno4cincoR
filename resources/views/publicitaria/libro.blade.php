@extends('layouts.layoutPubli')

@section('header')
<title>Libro | Editorial uno4cinco</title>

<link rel="stylesheet" type="text/css" href="/assets/css/style_SobreNosotros.css">
<link rel="stylesheet" type="text/css" href="/assets/css/libro.css">

<link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Karla&display=swap" rel="stylesheet">

<link rel="stylesheet" href="css/owl.theme.default.min.css">
@endsection

@section('content')

<section class="section" id="about" style="width:100%; height:100%; background-color:#F2ECD5">
    {{-- TITTLE --}}
    <p class="txt-TitulosApartados">Tienda | {{ $book->titulo }}</p>
    <hr class="hr-Titulos-long">
    <hr class="hr-Titulos-small">
    
    <div class="container-fluid">
        {{-- INFORMACIÓN DEL LIBRO --}}
        <div class="row">
            <div class="libro-tabla">
                <div class="libro-cell libro-cell-md libro-cell-head">
                    <div class="libro-fotos">
                        <img src="{{asset('storage/libros/'.$book->tiendaImagen)}}">
                        {{-- Aqui debe ir el slider --}}
                        <div class="owl-carousel">
                            <div> Your Content </div>
                            <div> Your Content </div>
                            <div> Your Content </div>
                            <div> Your Content </div>
                            <div> Your Content </div>
                            <div> Your Content </div>
                            <div> Your Content </div>
                        </div>
                    </div>
                </div>
                <div class="libro-cell libro-cell-lg libro-cell-footer">
                    <div class="libro-info">
                        @if (count($book->authors) > 1)
                            <p><b>Autores: </b>
                        @else
                            <p><b>Autor: </b>
                        @endif
                            @php
                                $contador = 1;
                                $cantAutores = count($book->authors);
                            @endphp
                            @foreach ($book->authors as $author)
                                @if ($contador == 1)
                                    {{$author->nombre}}
                                @elseif($contador == $cantAutores)
                                    y {{$author->nombre}}
                                @else
                                    , {{$author->nombre}}
                                @endif
                                @php
                                    $contador++;
                                @endphp
                            @endforeach
                        </p>
                        @if (count($book->genres) > 1)
                            <p><b>Géneros: </b>
                        @else
                            <p><b>Género: </b>
                        @endif
                            @php
                                $contador = 1;
                                $cantGeneros = count($book->genres);
                            @endphp
                            @foreach ($book->genres as $genre)
                                @if ($contador == 1)
                                    {{$genre->nombre}}
                                @elseif($contador == $cantGeneros)
                                    y {{$genre->nombre}}
                                @else
                                    , {{$genre->nombre}}
                                @endif
                                @php
                                    $contador++;
                                @endphp
                            @endforeach
                        </p>
                        <p><b>Fecha de publicación: </b>2 de Agoso de 2019</p>
                        <p><b>Número de páginas: </b>523</p>
                        <p><b>Editorial: </b>{{ $book->sello->nombre }}</p>
                        <p><b>Edición: </b>{{ $book->numEdicion }}</p>
                        <p><b>Formato: </b>
                            @if ($book->stockFisico > 0 && $book->stockDigital > 0)
                                Físico y Digital
                            @elseif($book->stockFisico > 0)
                                Físico
                            @elseif($book->stockDigital > 0)
                                Digital
                            @else
                                No disponible en ningún formato
                            @endif
                        </p>

                        <p><b>Sinopsis</b></p>

                        {{-- Contenido del libro --}}
                        <p>
                            @if (strlen($book->sinopsis) > 460)
                                <span id="dots1"><< </span>
                            @endif
                            {{-- DISCULPEN LA BASURA DE IDENTACION EN ESTA PARTE PERO ES NECESARIO QUE ESTE EN UNA SOLA LINEA XD --}}
                            {{ Str::limit($book->sinopsis, 460, '') }}@if (strlen($book->sinopsis) > 460)<span id="dots2"> >></span><span id="more">{{ substr($book->sinopsis, 460) }}</span>
                            @endif
                        </p>
                        @if (strlen($book->sinopsis) > 460)
                            <button onclick="myFunction()" id="myBtn" class="leer-mas">Leer más</button>
                        @endif
                    </div>
                </div>
                <div class="libro-cell libro-cell-md libro-cell-middle">
                    <div class="libro-comprar">
                        <div class="comprar">
                            {{-- PRECIOS --}}
                            {{-- FISICO --}}
                            <div class="formato">
                                <p style="padding-top: 20px;">Formato Físico:</p>
                            </div>
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

                            {{-- DIGITAL --}}
                            <div class="formato">
                                <p style="padding-top: 7px;">Formato Digital:</p>
                            </div>
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

<script>
    function myFunction() {
        var dots1 = document.getElementById("dots1");
        var dots2 = document.getElementById("dots2");
        var moreText = document.getElementById("more");
        var btnText = document.getElementById("myBtn");

        if (dots1.style.display === "none") {
            dots1.style.display = "inline";
            dots2.style.display = "inline";
            btnText.innerHTML = "Leer más";
            moreText.style.display = "none";
        } else {
            dots1.style.display = "none";
            dots2.style.display = "none";
            btnText.innerHTML = "Leer menos";
            moreText.style.display = "inline";
        }
    }
</script>
@endsection
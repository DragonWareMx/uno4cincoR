@extends('layouts.layoutPubli')

@section('header')
<title>Libro | Editorial uno4cinco</title>

<link rel="stylesheet" type="text/css" href="{{asset('/assets/css/style_SobreNosotros.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('/assets/css/libro.css')}}">

<link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Karla&display=swap" rel="stylesheet">

<link rel="stylesheet" href="{{asset('/css/owl.theme.default.min.css')}}">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.0/jquery.min.js"></script>

{{-- Carrusel --}}
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<link rel="stylesheet" type="text/css" href="/assets/css/style_Autores.css">

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
                        <img id="imagen-seleccionada" src="{{asset('storage/libros/'.$book->tiendaImagen)}}" onmousemove="zoomIn(event)" onmouseout="zoomOut()">
                        {{-- Aqui debe ir el slider --}}
                        @if (count($book->images) > 0)
                            <div class="owl-carousel">
                                <div class="imagen-carrusel">
                                    <img src="{{asset('storage/libros/'.$book->tiendaImagen)}}" onclick="clickImagen('{{asset('storage/libros/'.$book->tiendaImagen)}}')">
                                </div>
                                @foreach($book->images as $imagen)
                                <div class="imagen-carrusel">
                                    <img src="{{asset('storage/libros/'.$imagen->imagen)}}" onclick="clickImagen('{{asset('storage/libros/'.$imagen->imagen)}}')">
                                </div>
                                @endforeach
                            </div>
                        @endif
                    </div>
                </div>
                <div class="libro-cell libro-cell-lg libro-cell-footer">
                    <div class="libro-info">
                        @if (count($book->authors) > 1)
                            <p class="libro-info-res"><b>Autores: </b>
                        @else
                            <p class="libro-info-res"><b>Autor: </b>
                        @endif
                            @php
                                $contador = 1;
                                $cantAutores = count($book->authors);
                            @endphp
                            @foreach ($book->authors as $author)
                                @if ($contador == 1)
                                    <a href="{{ route('autor', ['id' => $author->id]) }}" class="sm-link sm-link3 sm-link_padding-bottom"><span class="sm-link__label">{{$author->nombre}}</span></a>
                                @elseif($contador == $cantAutores)
                                    y <a href="{{ route('autor', ['id' => $author->id]) }}" class="sm-link sm-link3 sm-link_padding-bottom"><span class="sm-link__label">{{$author->nombre}}</span></a>
                                @else
                                    , <a href="{{ route('autor', ['id' => $author->id]) }}" class="sm-link sm-link3 sm-link_padding-bottom"><span class="sm-link__label">{{$author->nombre}}</span></a>
                                @endif
                                @php
                                    $contador++;
                                @endphp
                            @endforeach
                        </p>
                        @if (count($book->genres) > 1)
                            <p class="libro-info-res"><b>Géneros: </b>
                        @else
                            <p class="libro-info-res"><b>Género: </b>
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
                        <p class="libro-info-res"><b>Fecha de publicación: </b>2 de Agoso de 2019</p>
                        <p class="libro-info-res"><b>Número de páginas: </b>523</p>
                        <p class="libro-info-res"><b>Editorial: </b>{{ $book->sello->nombre }}</p>
                        <p class="libro-info-res"><b>Edición: </b>{{ $book->numEdicion }}</p>
                        <p class="libro-info-res"><b>Formato: </b>
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

                        <p class="libro-info-res"><b>Sinopsis</b></p>

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
                            {{-- SI LOS PRECIOS SON MAYORES A CERO SE MUESTRAN, SI NO SE MUESTRA EL MENSAJE "NO DISPONIBLE" --}}
                            @if($book->precioFisico > 0 || $book->precioDigital > 0)
                                {{-- FISICO --}}
                                {{-- SI EL PRECIO DEL FORMATO FÍSICO ES MAYOR A CERO SE MUESTRA--}}
                                @if($book->precioFisico > 0)
                                    <div class="formato">
                                        <p style="padding-top: 20px;">Formato Físico:</p>
                                    </div>
                                    <div class="precio">
                                        @if($book->descuentoFisico > 0)
                                            <div class="oferta">
                                                ${{ $book->precioFisico }}
                                            </div>

                                            ${{ $book->precioFisico - $book->precioFisico*($book->descuentoFisico/100) }}
                                        @else
                                            ${{ $book->precioFisico }}
                                        @endif
                                    </div>

                                    {{-- AHORRO (EN CASO DE OFERTA) --}}
                                    @if ($book->descuentoFisico > 0)
                                        <div class="ahorro">
                                            <p>Ahorras: ${{ $book->precioFisico*($book->descuentoFisico/100) }}</p>
                                        </div>
                                    @endif

                                    {{-- DISPONIBILIDAD --}}
                                    @if ($book->stockFisico > 0)
                                        <div class="disponibilidad">
                                            <p style="color: #29B390;">Disponible</p>
                                        </div>
                                    @else
                                        <div class="disponibilidad">
                                            <p style="color: #BA1F00;">No Disponible</p>
                                        </div>
                                    @endif
                                @endif

                                {{-- DIGITAL --}}
                                {{-- SI EL PRECIO DEL FORMATO DIGITAL ES MAYOR A CERO SE MUESTRA--}}
                                @if($book->precioDigital > 0)
                                    <div class="formato">
                                        <p style="padding-top: 7px;">Formato Digital:</p>
                                    </div>
                                    <div class="precio">
                                        @if($book->descuentoDigital > 0)
                                            <div class="oferta">
                                                ${{ $book->precioDigital }}
                                            </div>

                                            ${{ $book->precioDigital - $book->precioDigital*($book->descuentoDigital/100) }}
                                        @else
                                            ${{ $book->precioDigital }}
                                        @endif
                                    </div>

                                    {{-- AHORRO (EN CASO DE OFERTA) --}}
                                    @if ($book->descuentoDigital > 0)
                                        <div class="ahorro">
                                            <p>Ahorras: ${{ $book->precioDigital*($book->descuentoDigital/100) }}</p>
                                        </div>
                                    @endif

                                    {{-- DISPONIBILIDAD --}}
                                    @if ($book->stockDigital > 0)
                                        <div class="disponibilidad">
                                            <p style="color: #29B390;">Disponible</p>
                                        </div>
                                    @else
                                        <div class="disponibilidad">
                                            <p style="color: #BA1F00;">No Disponible</p>
                                        </div>
                                    @endif
                                @endif

                                @if($book->stockFisico > 0 || $book->stockDigital > 0)
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
                                @endif
                            @else
                                {{-- DISPONIBILIDAD --}}
                                <div class="disponibilidad">
                                    <p style="color: #BA1F00;">Producto No Disponible</p>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <hr class="hr-tienda">
        {{-- <div class="container"> --}}
            <div class="row">
                <div class="MultiCarousel" data-items="1,3,3,3" data-slide="1" id="MultiCarousel"  data-interval="1000">
                    <div class="MultiCarousel-inner">@foreach ($autor->books as $book)
                        <div class="item">
                            <div class="pad15">
                                <div class="div_portadapad15">
                                <img alt="{{$book->images[0]->imagen}}" src="{{asset('storage/libros/'.$book->images[0]->imagen)}}">
                                </div>
                                <div class="div_infoCarrusel">
                                    <p class="txt-infoCarrusel"><b>Nombre:</b>&nbsp;
                                        <i>{{$book->titulo}}</i>
                                    </p>
                                    <p class="txt-infoCarrusel" style="margin-top: 4%"><b>Género:</b>&nbsp;
                                        
                                        <i>{{$book->genres[0]->nombre}}</i>
                                    </p>
                                    
                                </div>
    
                            </div>
                        </div>
                        @endforeach
                                        
                        
                    </div>
                    <button class="btn  leftLst"><i class="fas fa-chevron-left" style="color:gray"></i></button>
                    <button class="btn  rightLst"><i class="fas fa-chevron-right" style="color:gray"></i></button>
                </div>
            </div>
        {{-- </div> --}}
        <hr class="hr-tienda">

        <div class="libro-regresar">
            <div class="boton">
            <button onclick="location.href='{{ route('tiendaNovedades') }}'">
                <div class="row" style="margin-right:0px; margin-left: auto;">
                    <img src="{{ asset('img/ico/blackarrow.png') }}">
                </div>
                <div class="row" style="margin-right:0px; margin-left: auto;">
                    Regresar
                </div>
            </button>
            </div>
        </div>
    </div>
    

</section>

<script>
    var pre = document.getElementById("imagen-seleccionada");
    var imagen = pre.src;

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

    function clickImagen(nuevaImagen){
        var imagen2 = document.getElementById("imagen-seleccionada");
        imagen2.src = nuevaImagen;
        imagen = imagen2.src;
    }

     function zoomIn(event) {
        if ($('#imagen-seleccionada').is(':hover')) {
                var img = document.getElementById("imagen-seleccionada");
                pre.style.backgroundImage = "url('" + imagen + "')";
                pre.src = "{{asset('img/ico/invisible.png')}}";
            }
        var posX = event.offsetX;
        var posY = event.offsetY;
        pre.style.backgroundPosition=(-posX*2.5)+"px "+(-posY*2.5)+"px";

    }
    function zoomOut() {
        pre.src = imagen;
        pre.style.backgroundImage = "";
    }
</script>

<script>
    $(document).ready(function(){
  
        $('.owl-carousel').owlCarousel({
            loop:true,
            margin:2.5,
            nav:true,
            items:3,
            navText : ['<i class="fa fa-angle-left fa-2x" aria-hidden="true"></i>','<i class="fa fa-angle-right fa-2x" aria-hidden="true"></i>']
        })
    });

    $(document).ready(function () {
    var itemsMainDiv = ('.MultiCarousel');
    var itemsDiv = ('.MultiCarousel-inner');
    var itemWidth = "";

    $('.leftLst, .rightLst').click(function () {
        var condition = $(this).hasClass("leftLst");
        if (condition)
            click(0, this);
        else
            click(1, this)
    });

    ResCarouselSize();




    $(window).resize(function () {
        ResCarouselSize();
    });

    //this function define the size of the items
    function ResCarouselSize() {
        var incno = 0;
        var dataItems = ("data-items");
        var itemClass = ('.item');
        var id = 0;
        var btnParentSb = '';
        var itemsSplit = '';
        var sampwidth = $(itemsMainDiv).width();
        var bodyWidth = $('body').width();
        $(itemsDiv).each(function () {
            id = id + 1;
            var itemNumbers = $(this).find(itemClass).length;
            btnParentSb = $(this).parent().attr(dataItems);
            itemsSplit = btnParentSb.split(',');
            $(this).parent().attr("id", "MultiCarousel" + id);


            if (bodyWidth >= 1200) {
                incno = itemsSplit[3];
                itemWidth = sampwidth / incno;
            }
            else if (bodyWidth >= 992) {
                incno = itemsSplit[2];
                itemWidth = sampwidth / incno;
            }
            else if (bodyWidth >= 768) {
                incno = itemsSplit[1];
                itemWidth = sampwidth / incno;
            }
            else {
                incno = itemsSplit[0];
                itemWidth = sampwidth / incno;
            }
            $(this).css({ 'transform': 'translateX(0px)', 'width': itemWidth * itemNumbers });
            $(this).find(itemClass).each(function () {
                $(this).outerWidth(itemWidth);
            });

            $(".leftLst").addClass("over");
            $(".rightLst").removeClass("over");

        });
    }


    //this function used to move the items
    function ResCarousel(e, el, s) {
        var leftBtn = ('.leftLst');
        var rightBtn = ('.rightLst');
        var translateXval = '';
        var divStyle = $(el + ' ' + itemsDiv).css('transform');
        var values = divStyle.match(/-?[\d\.]+/g);
        var xds = Math.abs(values[4]);
        if (e == 0) {
            translateXval = parseInt(xds) - parseInt(itemWidth * s);
            $(el + ' ' + rightBtn).removeClass("over");

            if (translateXval <= itemWidth / 2) {
                translateXval = 0;
                $(el + ' ' + leftBtn).addClass("over");
            }
        }
        else if (e == 1) {
            var itemsCondition = $(el).find(itemsDiv).width() - $(el).width();
            translateXval = parseInt(xds) + parseInt(itemWidth * s);
            $(el + ' ' + leftBtn).removeClass("over");

            if (translateXval >= itemsCondition - itemWidth / 2) {
                translateXval = itemsCondition;
                $(el + ' ' + rightBtn).addClass("over");
            }
        }
        $(el + ' ' + itemsDiv).css('transform', 'translateX(' + -translateXval + 'px)');
    }

    //It is used to get some elements from btn
    function click(ell, ee) {
        var Parent = "#" + $(ee).parent().attr("id");
        var slide = $(Parent).attr("data-slide");
        ResCarousel(ell, Parent, slide);
    }

});
</script>
@endsection
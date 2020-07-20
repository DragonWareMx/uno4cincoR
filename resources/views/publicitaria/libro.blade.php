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
                        {{-- AUTORES --}}
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

                        {{-- GENEROS --}}
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

                        {{-- FECHA --}}
                        <p class="libro-info-res"><b>Fecha de publicación: </b>
                            @php
                                    $separa=explode("-",$book->fechaPublicacion);
                                    $anio=$separa[0];
                                    $mes=$separa[1];
                                    $dia=$separa[2];
                                @endphp
                                {{$dia}}&nbsp;de
                                @switch($mes)
                                    @case('01')
                                        Enero&nbsp;de
                                        @break
                                    @case('02')
                                        Febrero&nbsp;de
                                        @break
                                    @case('03')
                                        Marzo&nbsp;de
                                        @break
                                    @case('04')
                                        Abril&nbsp;de
                                        @break
                                    @case('05')
                                        Mayo&nbsp;de
                                        @break
                                    @case('06')
                                        Junio&nbsp;de
                                        @break
                                    @case('07')
                                        Julio&nbsp;de
                                        @break
                                    @case('08')
                                        Agosto&nbsp;de
                                        @break
                                    @case('09')
                                        Septiembre&nbsp;de
                                        @break
                                    @case('10')
                                        Octubre&nbsp;de
                                        @break
                                    @case('11')
                                        Noviembre&nbsp;de
                                        @break
                                    @case('12')
                                        Diciembre&nbsp;de
                                        @break
                                @endswitch
                                {{$anio}}
                        </p>

                        {{-- PAGAINAS --}}
                        <p class="libro-info-res"><b>Número de páginas: </b>523</p>

                        {{-- EDITORIAL --}}
                        <p class="libro-info-res"><b>Editorial: </b>{{ $book->sello->nombre }}</p>

                        {{-- EDICION --}}
                        <p class="libro-info-res"><b>Edición: </b>{{ $book->numEdicion }}</p>

                        {{-- FORMATO --}}
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
                                    <button class="carrito-button shrink" data-toggle="modal" data-target="#comprarFormato"><img src="{{asset('img/ico/carrito.PNG')}}"> Agregar al carrito</button>
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

<div class="modal fade" id="comprarFormato" tabindex="-1" role="dialog" aria-labelledby="comprarFormatoTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle" style="width: 100%; text-align:center;">{{ $book->titulo }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <div class="modal-body">
            <h6 style="width: 100%; text-align:center; padding-bottom: 7px;">Elige el formato:</h6>
            <div style="display: table; width:100%;">
                <div class="formato-comprar">
                    <div class="formato-container shrink" style="height: 213.8px">
                        <div class="boton-formato" id="botonFisico" data-toggle="modal" data-target="">
                            <div class="formato">
                                <p style="padding-top: 20px;">Formato Físico:</p>
                            </div>
                            <div class="precio" id="precioFisico">
                                @if($book->descuentoFisico > 0)
                                    <div class="oferta">
                                        ${{ $book->precioFisico }}
                                    </div>

                                    ${{ $book->precioFisico - $book->precioFisico*($book->descuentoFisico/100) }}
                                @else
                                    ${{ $book->precioFisico }}
                                @endif
                            </div>
                            <div class="ahorro" id="ahorroFisico">
                                @if ($book->descuentoFisico > 0)
                                    <p>Ahorras: ${{ $book->precioFisico*($book->descuentoFisico/100) }}</p>
                                @endif
                            </div>
                            <div class="disponibilidad" id="disponibleFisico">
                                @if ($book->stockFisico > 0)
                                    <p style="color: #29B390;">Disponible</p>
                                @else
                                    <p style="color: #BA1F00;">No Disponible</p>
                                @endif
                            </div>
                        </div>
                        <div class="cantidad" style="padding-bottom: 20px; height: 71px;">
                            @if ($book->stockFisico > 0)
                                <p id="cantidad-p">Cantidad: </p>
                                @php
                                    $min = 0;
                                @endphp
                                @if (session('cart'))
                                    @foreach(session('cart') as $id => $details)
                                        @if ($id == $book->id && $details['cantidadFisico'] > 0)
                                            @php
                                                $min = $details['cantidadFisico'];
                                            @endphp
                                        @endif
                                    @endforeach
                                    @if ($min == 0)
                                        @php
                                            $min = 1;
                                        @endphp
                                    @endif
                                @endif
                                @if ($book->stockFisico > 1)
                                    <div role="button" tabindex="0" class="qty qty-minus botonCantidad" id="menosCarrito">-</div>
                                    <input type="numeric" id="cantidadFisico" value="{{ $min }}" />
                                    <div role="button" tabindex="0" class="qty qty-plus botonCantidad" id="masCarrito">+</div>
                                @else
                                    <input type="numeric" id="cantidadFisico" value="1" />
                                @endif
                            @endif
                        </div>
                    </div>
                </div>
                <div class="formato-comprar" id="botonDigital" data-toggle="modal" data-target="">
                    <div class="formato-container shrink" style="height: 213.8px">
                        <div class="formato">
                            <p style="padding-top: 20px;">Formato Digital:</p>
                        </div>
                        <div class="precio" id="precioDigital">
                            @if($book->descuentoDigital > 0)
                                <div class="oferta">
                                    ${{ $book->precioDigital }}
                                </div>

                                ${{ $book->precioDigital - $book->precioDigital*($book->descuentoDigital/100) }}
                            @else
                                ${{ $book->precioDigital }}
                            @endif
                        </div>
                        <div class="ahorro" id="ahorroDigital">
                            @if ($book->descuentoDigital > 0)
                                <p>Ahorras: ${{ $book->precioDigital*($book->descuentoDigital/100) }}</p>
                            @endif
                        </div>
                        <div class="disponibilidad" id="disponibleDigital">
                            @if ($book->stockDigital > 0)
                                <p style="color: #29B390;">Disponible</p>
                            @else
                                <p style="color: #BA1F00;">No Disponible</p>
                            @endif
                        </div>
                        <div class="cantidad" style="padding-bottom: 20px; height: 71px;" id="cantidadDigital">
                            @if ($book->stockDigital > 0)
                                <p id="cantidad-p">Cantidad: </p>
                                <p>1</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
      </div>
    </div>
</div>

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

    var seleccionado = {{ $book->id }};
    //cada vez que se recarga la página obtenemos el carrito
    var carrito = @json(session()->get('cart'));
    var tooltipTimeout;

    //CANTIDAD, BOTON MENOS
    $('#menosCarrito').click(function(){            
        //se obtiene el numero del input y se hace la resta
        var number = document.getElementById("cantidadFisico").value;
        
        number--;
        
        //no se deja que la cantidad sea menor a 0
        if(number < 1){
            number = 1;
        }

        document.getElementById("cantidadFisico").value = number;
    });

    //CANTIDAD, BOTON MAS
    $('#masCarrito').click(function(){
        var libro = @json($book);
        var max = libro['stockFisico'];

        //se obtiene el numero del input y se hace la resta
        var number = document.getElementById("cantidadFisico").value;
        
        number++;
        
        //no se deja que la cantidad sea menor a 0
        if(number > max){
            number = max;
        }

        document.getElementById("cantidadFisico").value = number;
    });

    //CANTIDAD, INPUT ENTER
    $("#cantidadFisico").keypress(function(event) { 
        // Only ASCII charactar in that range allowed 
        var ASCIICode = (event.which) ? event.which : event.keyCode 
        if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57)) 
            return false;

        if (event.keyCode === 13) { 
            var libro = @json($book);
            var max = libro['stockFisico'];

            //se obtiene el numero del input
            var number = document.getElementById("cantidadFisico").value;

            if(number > max){
                number = max;
            }
            else if(number < 1){
                number = 1;
            }

            document.getElementById("cantidadFisico").value = number;
        } 
    });

    //CUANDO SE SELECCIONA EL FORMATO SE GUARDA EN LA COOKIE
    $("#botonFisico").click(function (e) {
        e.preventDefault();
        
        //SE OBTIENE LA CANTIDAD
        var cantidad = $("#cantidadFisico").val();

        var libro = @json($book);
        var max = libro['stockFisico'];

        if(cantidad > max)
            cantidad = max;

        if(cantidad > 0){
            var x = window.matchMedia("(max-width: 991px)");
            $.ajax({
                url: '/agregar-a-carrito/'+seleccionado+'/'+cantidad+'/fisico',
                method: "get",
                success: function (response) {
                    if(carrito){
                        if(carrito[seleccionado]){
                            if(carrito[seleccionado]['cantidadFisico'] > 0){
                                if(carrito[seleccionado]['cantidadFisico'] != cantidad)
                                    showTooltip("Producto actualizado");
                                else
                                    showTooltip("Producto ya en el carrito");
                            }
                            else{
                                showTooltip("Producto agregado");
                            }
                            carrito[seleccionado]['cantidadFisico'] = cantidad;
                        }
                        else{
                            carrito[seleccionado] = {"cantidadFisico": cantidad, "cantidadDigital": 0};
                            showTooltip("Producto agregado");
                        }
                    }
                    else{
                        var jsonSt = '{"'+seleccionado+'": {"cantidadFisico": "'+cantidad+'","cantidadDigital": "0"}}';
                        carrito = JSON.parse(jsonSt);
                        showTooltip("Producto agregado");
                    }
                    carritoCant(x);
                    setTimeout(hideTooltip, 2000);
                    return;
                }
            });
        }
    });

    $("#botonDigital").click(function (e) {
        e.preventDefault();

        var libro = @json($book);
        var cantidad = libro['stockDigital'];

        if(cantidad > 0){
            var x = window.matchMedia("(max-width: 991px)");
            $.ajax({
                url: '/agregar-a-carrito/'+seleccionado+'/1/digital',
                method: "get",
                success: function (response) {
                    if(carrito){
                        if(carrito[seleccionado]){
                            if(carrito[seleccionado]['cantidadDigital'] > 0){
                                if(carrito[seleccionado]['cantidadDigital'] != cantidad)
                                    showTooltip("Producto actualizado");
                                else
                                    showTooltip("Producto ya en el carrito");
                            }
                            else{
                                showTooltip("Producto agregado");
                            }
                            carrito[seleccionado]['cantidadDigital'] = cantidad;
                        }
                        else{
                            carrito[seleccionado] = {"cantidadFisico": 0, "cantidadDigital": cantidad};
                            showTooltip("Producto agregado");
                        }
                    }
                    else{
                        var jsonSt = '{"'+seleccionado+'": {"cantidadFisico": "0","cantidadDigital": "'+cantidad+'"}}';
                        carrito = JSON.parse(jsonSt);
                        showTooltip("Producto agregado");
                    }
                    carritoCant(x);
                    setTimeout(hideTooltip, 2000);
                    return;
                },
            });
        }
    });

    function carritoCant(x1) {
        $(".cargar-info").load(" .cargar-info");
        $(".cargar-info2").load(" .cargar-info2");
        if (x1.matches) { // If media query matches
            $(".contador-carrito-value2").load(" .contador-carrito-value2");
        } else {
            $(".contador-carrito-value").load(" .contador-carrito-value");
        }
    }

    var x1 = window.matchMedia("(max-width: 991px)");
    carritoCant(x1); // Call listener function at run time
    x1.addListener(carritoCant); // Attach listener function on state changes

    function showTooltip(mensaje)
    {
        var tooltip = $("<div id='tooltip-carrito2' class='tooltip-carrito'>"+mensaje+"</div>");
        var tooltip2 = $("<div id='tooltip-carrito' class='tooltip-carrito'>"+mensaje+"</div>");
        tooltip.appendTo($(".menu-carrito"));
        tooltip2.appendTo($(".carritoli"));

        var tooltipC = document.getElementById('tooltip-carrito');
        var tooltipC2 = document.getElementById('tooltip-carrito2');
        var height = tooltipC.clientHeight;
        var width = tooltipC.clientWidth;

        tooltipC.style.visibility = 'visible';
        tooltipC2.style.visibility = 'visible';
        //hint.style.opacity = '1';
        tooltipC.style.top = "45px";
        tooltipC2.style.top = "60px";
    }

    function hideTooltip()
    {
        var tooltipC = document.getElementById('tooltip-carrito');
        var tooltipC2 = document.getElementById('tooltip-carrito2');
        var height = tooltipC.clientHeight;
        var width = tooltipC.clientWidth;

        tooltipC.style.visibility = 'visible';
        tooltipC2.style.visibility = 'visible';
        //hint.style.opacity = '1';
        tooltipC.style.top = "-80px";
        tooltipC2.style.top = "-80px";
        setTimeout(function () {
            $("#tooltip-carrito").fadeOut().remove();
            $("#tooltip-carrito2").fadeOut().remove();
        }, 500);
    }
</script>
@endsection
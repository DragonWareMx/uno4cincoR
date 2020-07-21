@extends('layouts.layoutPubli')

@section('header')
<title>Autores | Leer</title>

<link rel="stylesheet" type="text/css" href="/assets/css/style_SobreNosotros.css">
<link rel="stylesheet" type="text/css" href="/assets/css/style_Autores.css">
<link rel="stylesheet" type="text/css" href="/assets/css/blogs.css">

<link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Karla&display=swap" rel="stylesheet">

{{-- Carrusel --}}

<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
@endsection

@section('content')

<section class="section" id="about" style="width:100%; height:100%; background-color:#F2ECD5">
    {{-- TITTLE --}}
    <p class="txt-TitulosApartados">Autores | José Agustín Aguilar Solórzano</p>
    <hr class="hr-Titulos-long">
    <hr class="hr-Titulos-small">
    


    <div class="div_contenidoAutor">
        <div class="div_imagenAutor">
            <div class="div_apartadoimgAutor">
                <div class="div_marcoimgAutor">
                </div>
                <div class="imagenAutor"  style="background: url('{{asset('storage/autores/'.$autor->foto)}}') center center no-repeat;
                background-size: cover;
                -moz-background-size: cover;
                -o-background-size: cover;
                -webkit-background-size: cover;">
                </div>
                
            </div>
            <p class="div_fechaNacAutor">
                @php
                    $separa=explode("-",$autor->fechaNac);
                    $anio=$separa[0];
                    $mes=$separa[1];
                    $dia=$separa[2];
                
                @endphp
                {{$dia}}-
                @switch($mes)
                    @case('01')
                        Enero-
                        @break
                    @case('02')
                        Febrero-
                        @break
                    @case('03')
                        Marzo-
                        @break
                    @case('04')
                        Abril-
                        @break
                    @case('05')
                        Mayo-
                        @break
                    @case('06')
                        Junio-
                        @break
                    @case('07')
                        Julio-
                        @break
                    @case('08')
                        Agosto-
                        @break
                    @case('09')
                        Septiembre-
                        @break
                    @case('10')
                        Octubre-
                        @break
                    @case('11')
                        Noviembre-
                        @break
                    @case('12')
                        Diciembre-
                        @break
                @endswitch
                {{$anio}}
            </p>
            
        </div>
        <div class="div_infoAutor">
            {{-- Autor de uno4cinco <br><br> --}}
            {{$autor->descripcion}}       
        </div>
    </div>
    <p class="txt_obrasAutor">Obras</p>


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
        <div class="row">
            <div class="col-md-12 text-center">
                <hr style="width: 90%">
            </div>
        </div>
    {{-- </div> --}}


</section>

<script>
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

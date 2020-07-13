@extends('layouts.layoutPubli')

@section('header')
<title>Autores | Leer</title>

<link rel="stylesheet" type="text/css" href="/assets/css/style_SobreNosotros.css">
<link rel="stylesheet" type="text/css" href="/assets/css/style_Autores.css">
<link rel="stylesheet" type="text/css" href="/assets/css/blogs.css">

<link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Karla&display=swap" rel="stylesheet">
@endsection

@section('content')

<section class="section" id="about" style="width:100%; height:100%; background-color:#F2ECD5">
    {{-- TITTLE --}}
    <p class="txt-TitulosApartados">Autores | José Agustín Aguilar Solórzano</p>
    <hr class="hr-Titulos-long">
    <hr class="hr-Titulos-small">
    
    @foreach ($autor as $author)

    <div class="div_contenidoAutor">
        <div class="div_imagenAutor">
            <div class="div_apartadoimgAutor">
                <div class="div_marcoimgAutor">
                </div>
                <div class="imagenAutor"  style="background: url('{{asset('storage/autores/'.$author->foto)}}') center center no-repeat;
                background-size: cover;
                -moz-background-size: cover;
                -o-background-size: cover;
                -webkit-background-size: cover;">
                    
                </div>
                {{-- <img src="/storage/autores/aguscolores.jpg"> --}}
                
            </div>
            <p class="div_fechaNacAutor">
                @php
                    $separa=explode("-",$author->fechaNac);
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

                al<br>

                @php
                    $separa2=explode("-",$author->fechaMuerte);
                    $anio=$separa2[0];
                    $mes=$separa2[1];
                    $dia=$separa2[2];
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
            {{$author->descripcion}}     
            {{$author->descripcion}}    
            {{$author->descripcion}}    
        </div>
    </div>
    <p class="txt_obrasAutor">Obras</p>
    <hr class="hr_finalPag">


    @endforeach
</section>
@endsection
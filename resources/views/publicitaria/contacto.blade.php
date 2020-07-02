@extends('layouts.layoutPubli')

@section('header')
<title>Contacto | Editorial uno4cinco</title>

<link rel="stylesheet" type="text/css" href="/assets/css/style_SobreNosotros.css">
<link rel="stylesheet" type="text/css" href="/assets/css/contacto.css">

<link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Karla&display=swap" rel="stylesheet">
@endsection

@section('content')
<section class="section" id="about" style="width:100%; height:100%; background-color:#F2ECD5">
    {{-- TITTLE --}}
    <p class="txt-TitulosApartados">CONTACTO</p>
    <hr class="hr-Titulos-long">
    <hr class="hr-Titulos-small">

    {{-- CARRUSEL --}}
    <div class="p-txt-content">
        <div class="border-contacto">
            <div class="div-contacto">
                <img src="{{ asset('img/logos/logo.png') }}" alt="" srcset="">
                <div class="slideshow-container">

                    <div id="first" class="mySlides fade">
                        <div class="textContacto" style="margin-bottom: 36px;">
                            <h1>
                                <img src="{{asset('img/ico/phone.png')}}">
                                 Teléfono
                            </h1>
                            <p>
                                <a href="tel:7221834383" class="linkContacto llamarContacto">
                                    <span>
                                        +52 722-183-4383
                                    </span>
                                </a>
                            </p>
                            <h1>
                                <img src="{{asset('img/ico/gps.png')}}">
                                 Ubicación
                            </h1>
                            <p>
                                <a href="https://www.google.com/maps/place/Toluca+de+Lerdo,+M%C3%A9x./@19.294109,-99.6662331,13z/data=!3m1!4b1!4m5!3m4!1s0x85cd89892a50ebb9:0xad3f4ad5550208c4!8m2!3d19.2826098!4d-99.6556653" target="_blank"  class="linkContacto ubicacionContacto">
                                    <span>
                                        Toluca, México
                                    </span>
                                </a>
                            </p>
                            <h1>
                                <img src="{{asset('img/ico/email.png')}}">
                                 Correo
                            </h1>
                            <p>
                                <a href="mailto: contacto@uno4cinco.com" class="linkContacto mailContacto">
                                    <span>contacto@uno4cinco.com</span>
                                </a>
                            </p>
                            <h1>
                                Síguenos
                            </h1>
                            <div class="contactoRedes">
                                <a href="https://www.youtube.com/channel/UCuYHXFV2FXf76TyP3aKSEqQ" target="_blank" class="sm-link sm-link_padding-bottom sm-link3">
                                    <span class="sm-link__label">
                                        <img src="{{asset('img/ico/ytb.png')}}">
                                    </span>
                                </a>
                                <a href="https://www.facebook.com/uno4cinco/" target="_blank" class="sm-link sm-link_padding-bottom sm-link3" style="margin-left: 27px;">
                                    <span class="sm-link__label">
                                        <img src="{{asset('img/ico/fb.png')}}" style="margin-bottom: 4px;">
                                    </span>
                                </a>
                                <a href="https://www.instagram.com/uno4cinco/" target="_blank" class="sm-link sm-link_padding-bottom sm-link3" style="margin-left: 27px;">
                                    <span class="sm-link__label">
                                        <img src="{{asset('img/ico/ig.png')}}" style="margin-bottom: 4px;">
                                    </span>
                                </a>
                            </div>
                        </div>
                    </div>
                    
                    <div id="second" class="mySlides fade">
                        <div class="textContacto">
                            <h1>¿Te interesa publicar con nosotros?</h1>
                            <div class="contenidoPagDosContacto">
                                <p style="margin: 0px">
                                    Envíanos:
                                </p>
                                <div style="width: fit-content; height:fit-content; margin:auto; text-align:justify; margin-top:19px; margin-bottom:19px;">
                                    <ol>
                                        <li>1. Un resumen de tu obra (máximo una cuartilla).</li>
                                        <li>2. Una propuesta editorial (máximo una cuartilla) que incluya:</li>
                                        <ul>
                                            <li><b>-</b> Los datos personales del autor.</li> 
                                            <li><b>-</b> Índice (si aplica).</li>
                                            <li><b>-</b> Mercado editorial (a quién va dirigido).</li>  
                                            <li><b>-</b> Difusión de la obra (cómo puedes llegar a ellos).</li>
                                        </ul>
                                    </ol>
                                </div>
                                <p>
                                    Al correo
                                        <a href="mailto: manuscritos@uno4cinco.com">
                                            <b>manuscritos@uno4cinco.com</b>
                                        </a>
                                    <br>
                                </p>
                                <p style="font-size:14px; text-align:justify;">
                                    <b>Nota:</b> NO RECIBIMOS MANUSCRITOS, en caso de que la propuesta editorial nos interese
                                    nos comunicaremos contigo.
                                </p>
                            </div>
                            <img src="{{asset('img/quienessomos/6007.png')}}" style="position: relative;width: 196px; height:auto; top:-60px; margin:0px;">
                        </div>
                    </div>
                
                    
                    <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                    <a class="next" onclick="plusSlides(1)">&#10095;</a>
                
                </div>
            </div>
        </div>
    </div>
    <div style="text-align:center; margin-top:33px; margin-left: 16px;">
        <span class="dot" onclick="currentSlide(1)"></span> 
        <span class="dot" onclick="currentSlide(2)"></span> 
    </div>
</section>

<script type="text/javascript">
    window.onload = function () {
        var slides = document.getElementsByClassName("mySlides");
        slides[0].style.display = "block"; 
        slides[1].style.display = "block"; 
        var left=document.getElementById('first').clientHeight;
        var right=document.getElementById('second').clientHeight;
        if(left>right) {
            var diferencia = (left-right)/2;
            document.getElementById('second').style.height=left+"px";
            document.getElementById('first').style.padding = diferencia + "px 0";
        }
        else {
            var diferencia = (right-left)/2;
            document.getElementById('first').style.height=right+"px";
            document.getElementById('first').style.padding = diferencia + "px 0";
        }
        slides[0].style.display = "block"; 
        slides[1].style.display = "none"; 
    };
</script>

<script>
    var slideIndex = 1;
    showSlides(slideIndex);
    
    function plusSlides(n) {
      showSlides(slideIndex += n);
    }
    
    function currentSlide(n) {
      showSlides(slideIndex = n);
    }
    
    function showSlides(n) {
      var i;
      var slides = document.getElementsByClassName("mySlides");
      var dots = document.getElementsByClassName("dot");
      if (n > slides.length) {slideIndex = 1}    
      if (n < 1) {slideIndex = slides.length}
      for (i = 0; i < slides.length; i++) {
          slides[i].style.display = "none";  
      }
      for (i = 0; i < dots.length; i++) {
          dots[i].className = dots[i].className.replace(" active", "");
      }
      slides[slideIndex-1].style.display = "block";  
      dots[slideIndex-1].className += " active";
    }
    </script>
@endsection
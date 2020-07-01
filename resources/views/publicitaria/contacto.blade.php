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

                    <div class="mySlides fade">
                        <div id="first" class="textContacto" style="margin-bottom: 36px;">
                            <h1><img src="{{asset('img/ico/phone.png')}}"> Teléfono</h1>
                            <p>+524432209371</p>
                            <h1><img src="{{asset('img/ico/gps.png')}}"> Domicilio</h1>
                            <p>Morelia, Col. Centro, #13, CP. 58770</p>
                            <h1><img src="{{asset('img/ico/email.png')}}"> Correo</h1>
                            <p>correo@gmail.com</p>
                            <h1>Síguenos</h1>
                            <div class="contactoRedes">
                                <img src="{{asset('img/ico/twt.png')}}">
                                <img src="{{asset('img/ico/fb.png')}}" style="margin-left: 27px;">
                                <img src="{{asset('img/ico/ig.png')}}" style="margin-left: 27px;">
                            </div>
                        </div>
                    </div>
                    
                    <div class="mySlides fade">
                        <div id="second" class="textContacto" style="margin-bottom: 36px;">
                            <h1 style="margin-top: 26px">Manuscritos</h1>
                            <div class="contenidoPagDosContacto">
                                <p style="margin: 0px">Lorem ipsum dolor sit amet consectetur, adipiscing elit volutpat torquent magna, congue in odio ornare. Curabitur donec parturient est porttitor conubia facilisi fusce, torquent magnis dapibus libero fames bibendum habitasse facilisis, senectus vitae arcu suscipit hendrerit leo interdum, ligula integer accumsan volutpat ultricies neque.</p>
                            </div>
                            <img src="{{asset('img/quienessomos/6007.png')}}" style="width: 196px; height:auto; top:-10px">
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
    window.onload = function() {
        var left=document.getElementById('first').clientHeight;
        var right=document.getElementById('second').clientHeight;
        if(left>right) {
            document.getElementById('second').style.height=left+"px";
        }
        else {
            document.getElementById('first').style.height=right+"px";
        }
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
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
    
    <div class="div_contenidoAutor">
        <div class="div_imagenAutor">
            <div class="div_apartadoimgAutor">
                <div class="div_marcoimgAutor">
                </div>
                <div class="imagenAutor"  style="background: url('/storage/autores/aguscolores.jpg')center center no-repeat;
                background-size: cover;
                -moz-background-size: cover;
                -o-background-size: cover;
                -webkit-background-size: cover;">
                    
                </div>
                {{-- <img src="/storage/autores/aguscolores.jpg"> --}}
                
            </div>
            <p class="div_fechaNacAutor">
                31 de enero de 1978
            </p>
            
        </div>
        <div class="div_infoAutor">
            Lorem ipsum dolor sit amet consectetur adipiscing elit, proin vestibulum justo curae litora 
            ad risus maecenas, nostra conubia sem cursus nulla mi. Non donec rutrum nec mollis scelerisque 
            arcu morbi posuere bibendum, velit justo potenti tortor hendrerit aliquam auctor congue ad, 
            praesent dignissim vulputate ultricies lectus tempus enim feugiat. Interdum placerat litora 
            eleifend vestibulum neque montes velit aliquet tellus lectus enim magnis, elementum varius 
            inceptos eu est et metus habitasse phasellus sem congue curabitur morbi, arcu aptent parturient 
            penatibus duis dictumst aliquam ut at diam ante.
            <br><br>
            Natoque litora venenatis suspendisse dapibus massa himenaeos placerat aliquet turpis, class arcu 
            penatibus aptent faucibus enim duis gravida, quisque vehicula condimentum sed blandit tellus sociis 
            risus.
            <br><br>
            Imperdiet habitasse in interdum diam tellus nec convallis sem, luctus massa dapibus cum condimentum 
            eget fames, est sed curae nibh tincidunt sagittis fusce. Sociis eleifend dui vulputate velit 
            fringilla ad odio mauris justo, aliquet conubia ante volutpat nisl nullam malesuada nibh mus, 
            proin pellentesque condimentum rutrum metus parturient vitae faucibus.            
        </div>
    </div>
    <p class="txt_obrasAutor">Obras</p>
    <hr class="hr_finalPag">
</section>
@endsection
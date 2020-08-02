@extends('layouts.menuGestor')

@section('importOwl')
    <script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
    <link rel="stylesheet" href="{{ asset('assets/css/index.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/css/gestorSlider.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/css/gestorBlogs.css') }}" type="text/css">
    <link rel="stylesheet" type="text/css" href="/assets/css/gestorAutores.css">
    <script type="text/javascript" src='/assets/js/tags.js'></script>
    <link href="https://fonts.googleapis.com/css2?family=Karla&display=swap" rel="stylesheet">

@endsection

@section('menu')
<a href="{{ route('verSliders') }}" class="txt-titulosGestor">Sliders</a>
    @if ($aux)
    | Nuevo banner libro
    @else
    | Nuevo banner autor
    @endif     
@endsection


@section('contenido')
<div class="contenido_sliders">
        
    <div class="datos_slider">
       <form action="##" style="width:100%;" method="POST" enctype="multipart/form-data">
       @csrf
       <div class="elementos_slider_100">
        <div class="elementos_slider_imagen">
            <p class="txt_datosAuthor">Imagen PC (horizontal):</p>
            <input id="imagenPC" class="img_datosAuthor" style="margin-top:0px" type="file" name="imagen" required>
        </div>
        </div>
        <div class="elementos_slider_100">
            <div class="elementos_slider_imagen">
                <p class="txt_datosAuthor">Imagen celular (vertical):</p>
                <input id="imagenCell" class="img_datosAuthor" style="margin-top:0px" type="file" name="imagen" required>
            </div>
        </div>
        <div class="div_empareja_elementos">
        <div id="select_relacion" class="elementos_slider_50">
            <p class="elementos_slider txt-AutorLibroBlog">Relacionado con: </p>
            <select class="select_slider" name="relacionBanner" style="margin-left: 0px" required>
                <option disable selected="selected" value="" hidden> &nbsp; selecciona</option>
                @foreach ($relaciones as $relacion)
                    
                    @if ($aux)
                        <option value="{{$relacion->id}}">{{$relacion->titulo}}</option>
                    @else
                        <option value="{{$relacion->id}}">{{$relacion->nombre}}</option>
                    @endif
                    
                @endforeach
            </select>
        </div>
        <div class="elementos_slider_50">
            <div id="banner_existente" class="gestor_slider_cancelar">Elegir banner existente</div>
        </div>
        </div>

        <div id="div_existentes" class="imagenes_slider_100" style="display: none">    
                @foreach ($banners as $banner)
                <div id="{{$banner->id}}" class="img_banner">
                    <img src="{{asset('storage/banners/'.$banner->imagenPC)}}" style="width: 100%">
                </div>
                @endforeach
        </div>

        <div class="botones_slider_100">
            <div class="botones_slider_derecha">
                <a class="gestor_slider_cancelar" href="{{ route('verSliders')}}">Cancelar</a>
            </div>
                <input class="gestor_slider_guardar" type="submit" value="Guardar">	    
        </div>   
       </form>
   </div>
   
</div>

<script>
    const inpFile = document.getElementById("imagenPC");
    const inpFile = document.getElementById("imagenCell");
    //const previewContainer= document.getElementById("preview_imagen");
    //const previewImage = previewContainer.querySelector(".preview_imagen_imagen");
    //const previewDefaultText = previewContainer.querySelector(".preview_imagen_default");

    inpFile.addEventListener("change", function(){
        const file = this.files[0];

        if(file){
            const reader = new FileReader();

            previewDefaultText.style.display="none";
            previewImage.style.display="block";

            reader.addEventListener("load", function(){
                //previewImage.setAttribute("src", this.result);
                //previewContainer.style.width="auto";
                //previewContainer.style.height="auto";
                //previewContainer.style.border="none";

            });
            reader.readAsDataURL(file);
        }
    });
</script>

{{--script para mostrar div con banners ya existentes--}}
<script>
    var clickBanner=false;
    var clickSelect=false;
    var control;
    
     $(document).ready(function() {

        $('#banner_existente').on('click', function () {
            if(clickBanner){
                $('#div_existentes').hide();
                $('.elementos_slider_100').show();
                $('#select_relacion').show();
                $('#banner_existente').html('Elegir banner existente');
                $('#imagenPC').prop('required', true);
                $('#imagenCell').prop('required', true); 
                $('.select_slider').prop('required', true); 
                $('#'+control+"").css({'opacity':'1','border':'none'}); 
                clickBanner=false;
                clickSelect=false;
                control=0;
            }
            else{
                $('#div_existentes').show();
                $('.elementos_slider_100').hide();
                $('#select_relacion').hide();
                $('#banner_existente').html('Agregar nuevo');
                $('#imagenPC').removeAttr('required');
                $('#imagenCell').removeAttr('required'); 
                $('.select_slider').removeAttr('required'); 
                clickBanner=true;
            }
        });

        $('.img_banner').on('click', function () {
            
            if(clickSelect){
                if (control==this.id){
                    $('#'+this.id+"").css({'opacity':'1','border':'none'});
                    control=0;
                    clickSelect=false;
                }
                else{
                    $('#'+control+"").css({'opacity':'1','border':'none'});
                    $('#'+this.id+"").css({'opacity':'0.6','border':'solid blue'});
                    control=this.id;
                    clickSelect=true;
                }
            }
            else{
                $('#'+this.id+"").css({'opacity':'0.6','border':'solid blue'});
                control=this.id;
                clickSelect=true;
            }   
        });

     });
</script>

    
@endsection
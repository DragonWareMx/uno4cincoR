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
<a href="{{ route('verSliders') }}" class="txt-titulosGestor">Publicidad</a>
<!-- @if ($aux)
    | Nuevo banner libro
    @else
    | Nuevo banner autor
    @endif      -->
@endsection


@section('contenido')
<div class="contenido_sliders">

    <div class="datos_slider">

        @if ($aux)
        <form action="{{ route('nuevoSlider', ['tipo' => 'libro'])}}" style="width:100%;" method="POST"
            enctype="multipart/form-data">
            @else
            <form action="{{ route('nuevoSlider', ['tipo' => 'autor'])}}" style="width:100%;" method="POST"
                enctype="multipart/form-data">
                @endif

                @csrf
                <div class="elementos_slider_100">
                    <div class="elementos_slider_imagen">
                        <p class="slidertxt">Imagen PC (vertical):</p>
                        <input id="imagenPC" class="img_datosAuthor" style="margin-top:-1px" type="file" name="imagenPC"
                            required>
                    </div>
                </div>
                <div class="elementos_slider_100">
                    <div class="elementos_slider_imagen">
                        <p class="slidertxt">Imagen celular (horizontal):</p>
                        <input id="imagenCell" class="img_datosAuthor" style="margin-top:-1px" type="file"
                            name="imagenCell" required>
                    </div>
                </div>
                <div class="elementos_slider_100">
                    <div class="elementos_slider_imagen">
                        <p class="slidertxt">Link slider (opcional):</p>
                        <input class="img_datosAuthor" style="margin-top:-1px" type="text" name="link">
                    </div>
                </div>
                <div class="div_empareja_elementos">

                    <!-- <div class="elementos_slider_100">
            <div class="elementos_slider_imagen">
                <p class="slidertxt" style="width: 120px">Relacionado con: </p>
                <select class="select_slider img_datosAuthor" name="relacionBanner" style="margin-left: 0px" required>
                    <option disable selected="selected" value="" hidden> &nbsp; Selecciona</option>
                    @foreach ($relaciones as $relacion)

                        @if ($aux)
                            <option value="{{$relacion->id}}">{{$relacion->titulo}}</option>
                        @else
                            <option value="{{$relacion->id}}">{{$relacion->nombre}}</option>
                        @endif

                    @endforeach
                </select>
            </div>
        </div> -->

                    <!-- <a id="banner_existente" style="color: #29B390; text-decoration:underline">Elegir banner existente</a> -->

                </div>

                <div id="div_existentes" class="imagenes_slider_100" style="display: none">
                    @foreach ($banners as $banner)
                    <div id="{{$banner->id}}" class="img_banner">
                        <img src="{{asset('storage/banners/'.$banner->imagenPC)}}" style="width: 100%">
                    </div>
                    @endforeach
                    <input class="input_invisible" name="imgSelected" style="display: none" value="">
                </div>

                <div class="botones_blog_100">
                    <div class="botones_blog_derecha">
                        <a class="gestor_blog_cancelar" href="{{ route('verSliders')}}">Cancelar</a>
                        <input class="gestor_blog_guardar" type="submit" value="Guardar">
                    </div>
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
                $('.input_invisible').removeAttr('required');
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
                $('.input_invisible').prop('required', true);
                clickBanner=true;
            }
        });

        $('.img_banner').on('click', function () {

            if(clickSelect){
                if (control==this.id){
                    $('#'+this.id+"").css({'opacity':'1','border':'none'});
                    $('.input_invisible').val(null);
                    control=0;
                    clickSelect=false;
                }
                else{
                    $('#'+control+"").css({'opacity':'1','border':'none'});
                    $('#'+this.id+"").css({'opacity':'0.6','border':'solid blue'});
                    $('.input_invisible').val(this.id);
                    control=this.id;
                    clickSelect=true;
                }
            }
            else{
                $('#'+this.id+"").css({'opacity':'0.6','border':'solid blue'});
                $('.input_invisible').val(this.id);
                control=this.id;
                clickSelect=true;
            }
        });

     });
</script>


@endsection
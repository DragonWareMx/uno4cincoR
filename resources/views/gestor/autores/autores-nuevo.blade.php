@extends('layouts.menuGestor')

@section('importOwl')
    <link rel="stylesheet" type="text/css" href="/assets/css/gestorAutores.css">
    <link rel="stylesheet" type="text/css" href="/assets/css/gestorBlogs.css">
    <link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Karla&display=swap" rel="stylesheet">
@endsection

@section('menu')
    Autores | Nuevo Autor
@endsection

@section('contenido')

@if($errors->any())
    <div class="alert alert-danger" role="alert">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
@endif

    <div class="div_containerAuthor">
        <div class="div_datosAuthor">
            <form action="{{ route('autores-nuevo') }}" style="width:100%;" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="div_elementosAuthor">
                    <p class="txt_datosAuthor">Nombre:</p>
                    <input name="nombre" class="input_datosAuthor" type="text" value="{{old('nombre')}}" required autofocus>
                </div>

                <div class="div_elementosAuthor" style="margin-bottom: 25px">
                    <p class="txt_datosAuthor">Biografía:</p>
                    <textarea class="textarea_biografia"type="text" name="biografia" value="" required >{{old('biografia')}}</textarea>
                </div>

                <div class="div_elementosAuthor">
                    <p class="txt_datosAuthor">Link red social:</p>
                    <input name="link" class="input_datosAuthor" type="url" value="{{old('link')}}" required autofocus>
                </div>

                <div class="div_elementosAuthor">
                    <p class="txt_datosAuthor">Fecha Nacimiento:</p>
                    <input name="nacimiento" style="margin-left: 0px" class="input_datosAuthor dateAuthor" type="date" value="{{old('nacimiento')}}" autofocus>
                </div>

                <div class="div_elementosAuthor" style="margin-bottom: 25px">
                    <p class="txt_datosAuthor">Fecha Muerte:</p>
                    <input name="muerte" style="margin-left: 0px" class="input_datosAuthor dateAuthor dateMuerteAuthor" type="date" value="{{old('muerte')}}"  autofocus>
                </div>

                <div class="div_elementosAuthor">
                    <p class="txt_datosAuthor">Foto grupal:</p>
                    <input id="imagen" class="img_datosAuthor" type="file" name="imagen" required>
                </div>

                <div class="div_elementosAuthor">
                    <p class="txt_datosAuthor">Foto perfil:</p>
                    <input id="fotoPerfil" class="img_datosAuthor" type="file" name="fotoPerfil" required>
                </div>

                <div class="botones_blog_100">
                    <div class="botones_blog_derecha">
                        <a class="gestor_blog_cancelar" href="javascript:history.back(-1);">Cancelar</a>
                        <input class="gestor_blog_guardar" type="submit" value="Guardar">	
                    </div>
                </div>

            </form>
        </div>
        <div class="preview_imagen_blog">
            <div id="preview_imagen" class="gestor_blog_mostrar_imagen">
                <img src="" alt="Imagen" class="preview_imagen_imagen">
                <span class="preview_imagen_default">Imagen</span>
            </div>
        </div>


    </div>
    <br>
    <br>
    <script>
        const inpFile = document.getElementById("imagen");
        const previewContainer= document.getElementById("preview_imagen");
        const previewImage = previewContainer.querySelector(".preview_imagen_imagen");
        const previewDefaultText = previewContainer.querySelector(".preview_imagen_default");

        inpFile.addEventListener("change", function(){
            const file = this.files[0];

            if(file){
                const reader = new FileReader();

                previewDefaultText.style.display="none";
                previewImage.style.display="block";

                reader.addEventListener("load", function(){
                    previewImage.setAttribute("src", this.result);
                    previewContainer.style.width="auto";
                    previewContainer.style.height="auto";
                    previewContainer.style.border="none";

                });
                reader.readAsDataURL(file);
            }
        });
    </script>

@endsection
@extends('layouts.menuGestor')

@section('importOwl')
    <link rel="stylesheet" type="text/css" href="/assets/css/gestorAutores.css">
    <link rel="stylesheet" type="text/css" href="/assets/css/gestorBlogs.css">
    <link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Karla&display=swap" rel="stylesheet">
@endsection

@section('menu')
<a href="{{ route('verLibros') }}" class="txt-titulosGestor">Libros</a> | Nuevo libro
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
            <form action="" style="width:100%;" method="POST" enctype="multipart/form-data">
                @method("PATCH")
                @csrf
                <div class="div_elementosAuthor">
                    <p class="txt_datosAuthor">Título:</p>
                    <input name="titulo" class="input_datosAuthor" type="text" value="" required autofocus>
                </div>

                <div class="div_elementosAuthor">
                    <p class="txt_datosAuthor" >Autor:</p>
                    <select name="autor" class="input_datosAuthor">
                        <option value="value1">Value 1</option> 
                        <option value="value2" selected>Value 2</option>
                        <option value="value3">Value 3</option>
                    </select>
                </div>

                <div class="div_elementosAuthor">
                    <div class="div_elementosAuthor50">
                        <p class="txt_datosAuthor" style="width:auto">Sello:</p>
                        <select name="sello" class="input_datosAuthor50">
                            <option value="value1">Value 1</option> 
                            <option value="value2" selected>Value 2</option>
                            <option value="value3">Value 3</option>
                        </select>
                    </div>
                    <div class="div_elementosAuthor50">
                        <div class="div_space">&nbsp;&nbsp;</div>
                        <p class="txt_datosAuthor">Formato:</p>
                        <select name="formato" class="input_datosAuthor50">
                            <option value="value1">Físico</option> 
                            <option value="value2" selected>Físico/Dígital</option>
                            <option value="value3">Dígital</option>
                        </select>
                    </div>
                </div>

                <div class="div_elementosAuthor">
                    <div class="div_elementosAuthor50">
                        <p class="txt_datosAuthor" style="width:auto">Estatus:</p>
                        <select name="estatus" class="input_datosAuthor50">
                            <option value="value1">Dispoible</option> 
                            <option value="value2" selected>No disponible</option>
                        </select>
                    </div>
                    <div class="div_elementosAuthor50">
                        <div class="div_space">&nbsp;&nbsp;</div>
                        <p class="txt_datosAuthor">Ejemplares:</p>
                        <input name="ejemplares" class="input_datosAuthor input_datosAuthor50" type="number" value="" required autofocus>
                    </div>
                </div>

                <div class="div_elementosAuthor">
                    <div class="div_elementosAuthor50">
                        <p class="txt_datosAuthor" style="width:auto">Precio:</p>
                        <input name="estatus" class="input_datosAuthor input_datosAuthor50" type="number" value="" required autofocus>
                    </div>
                    <div class="div_elementosAuthor50">
                        <div class="div_space">&nbsp;&nbsp;</div>
                        <p class="txt_datosAuthor">Oferta %:</p>
                        <input name="ejemplares" class="input_datosAuthor input_datosAuthor50" type="number" value="" required autofocus>
                    </div>
                </div>

                <div class="div_elementosAuthor">
                    <div class="div_elementosAuthor50">
                        <p class="txt_datosAuthor">Páginas:</p>
                        <input name="ejemplares" class="input_datosAuthor input_datosAuthor50" type="number" value="" required autofocus>
                    </div>
                    <div class="div_elementosAuthor50">
                        <div class="div_space">&nbsp;&nbsp;</div>
                        <p class="txt_datosAuthor">Edición:</p>
                        <input name="edicion" class="input_datosAuthor input_datosAuthor50" type="number" value="" required autofocus>
                    </div>
                </div>

                <div class="div_elementosAuthor">
                    <div class="div_elementosAuthor50">
                        <p class="txt_datosAuthor" style="width:auto">Género:</p>
                        <select name="genero" class="input_datosAuthor50">
                            <option value="value1">Value 1</option> 
                            <option value="value2" selected>Value 2</option>
                            <option value="value3">Value 3</option>
                        </select>
                    </div>
                </div>

                <div class="div_elementosAuthor">
                    <p class="txt_datosAuthor txt_datosAuthorFECHA">Fecha de publicación:</p>
                    <input name="publicacion" class="input_datosAuthor dateAuthor" type="date" value="" required autofocus>
                </div>

                <div class="div_elementosAuthor" style="margin-bottom: 25px">
                    <p class="txt_datosAuthor">Sinopsis:</p>
                    <textarea class="textarea_biografia"type="text" style="resize:vertical" name="sinopsis" value="" required ></textarea>
                </div>

                <div class="div_elementosAuthor">
                    <p class="txt_datosAuthor">Imagen:</p>
                    <input id="imagen" class="img_datosAuthor" type="file" name="imagen" >
                </div>

                <div class="botones_blog_100">
                    <div class="botones_blog_derecha">
                        <a class="gestor_blog_cancelar" href="javascript:history.back(-1);">Cancelar</a>
                        <input class="gestor_blog_guardar" type="submit" value="Agregar">	
                    </div>
                </div>
                
            </form>
        </div>
        <div class="preview_imagen_blog">
            <div id="preview_imagen" class="gestor_blog_mostrar_imagen">
                <img src="" alt="Imagen" class="preview_imagen_imagen">
                <span class="preview_imagen_default" style="display: none">Imagen</span>
                <img src="#" alt="Imagen" class="imagen_actual">
            </div>
        </div>


    </div>

    <br> 
    <br>
    
    <script>
        const inpFile = document.getElementById("imagen");
        const previewContainer= document.getElementById("preview_imagen");
        const previewImage = previewContainer.querySelector(".preview_imagen_imagen");
        const previewImageAnterior = previewContainer.querySelector(".imagen_actual");
        const previewDefaultText = previewContainer.querySelector(".preview_imagen_default");

        inpFile.addEventListener("change", function(){
            const file = this.files[0];

            if(file){
                const reader = new FileReader();

                previewDefaultText.style.display="none";
                previewImageAnterior.style.display="none";
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
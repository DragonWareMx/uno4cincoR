@extends('layouts.menuGestor')

@section('importOwl')
    <script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
    <link rel="stylesheet" type="text/css" href="/assets/css/gestorBlogs.css">
    <link rel="stylesheet" type="text/css" href="{{asset('/assets/css/tags.css')}}">
    <script type="text/javascript" src='/assets/js/tags.js'></script>
    <script>
        $(function() {
            $("#testInput_tags_blog").tags({
                unique: true,
                max:10
            });
        });
    </script>
@endsection

@section('menu')
    <a href="{{route('gestorInicio')}}">Blog</a>&nbsp;| Nuevo blog
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
    <div class="contenido_blogs">
        
         <div class="datos_blog">
            <form action="" style="width:100%;" method="POST" enctype="multipart/form-data">
            @csrf

                <div class="elementos_blog_100">
                    <p class="elementos_blog">Título:</p>
                    <input name="titulo" class="input_blog_titulo" type="text" value="{{old('titulo')}}" required autofocus>
                </div>

                <div class="div_empareja_elementos">
                    <div class="elementos_blog_50">
                        <p class="elementos_blog">Autor blog:</p>
                        <select class="select_blog" name="autorBlog">
                            <option disable selected="selected" value="" hidden> &nbsp; Autor de blog</option>
                            @foreach ($autoresBlog as $autor)
                                <option>{{$autor->autor}}</option>
                            @endforeach
                        </select>
                        <div class="div_nuevo_autor_blog">
                            ¿Nuevo autor?
                        </div>
                    </div>
                    <div {{-- id="DESAPARECER"--}} class="elementos_blog_50" {{--style="display:none;"--}}> 
                        <p class="elementos_blog">Nuevo autor:</p>
                        <input type="text" class="input_blog_autor" name="autorBlogNuevo" >
                    </div>
    
                    <div class="elementos_blog_50">
                        <p class="elementos_blog">Autor libro:</p>
                        <select class="select_blog" name="autorLibro" >
                            <option disable selected="selected" value="" hidden> &nbsp; Autor de libro</option>
                            @foreach ($autoresLibro as $autor)
                                <option>{{$autor->nombre}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="elementos_blog_50">
                        <p class="elementos_blog">Tags:</p>
                        <input type="text"  value="josué,nunito,dulcecitaDeLimón,noEraPenal,"id="testInput_tags_blog" class="input_blog_tag" name="tags" >
                    </div>
                </div>

                <div class="elementos_blog_100">
                    <p class="elementos_blog">Contenido:</p>
                </div>
                <div class="elementos_blog_100">
                    <div class="contenido_gestor_blog">
                        <textarea class="blog_text_area"type="text" name="contenido" value="" required >{{old('contenido')}}</textarea>
                        <script>
                                CKEDITOR.replace( 'contenido' );
                        </script>
                    </div>
                </div>

                <div class="elementos_blog_100">
                    <div class="elementos_blog_imagen">
                        <p class="elementos_blog centrar_texto_blog">Imagen:</p>
                        <input id="imagen" class="gestor_blog_imagen" type="file" name="imagen" required>
                    </div>
                </div>

                <div class="botones_blog_100">
                    <div class="botones_blog_derecha">
                        <a class="gestor_blog_cancelar" href="#">Cancelar</a>
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
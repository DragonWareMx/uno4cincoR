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
                maxTags: 5
            });
        });
    </script>
@endsection

@section('menu')
    <a href="{{route('gestorInicio')}}">Blog</a>&nbsp;| Editar
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
            <form action="{{ route('editarBlog', ['id'=>$blog->id]) }}" style="width:100%;" method="POST" enctype="multipart/form-data">
            @csrf
            @method('patch')

                <div class="elementos_blog_100">
                    <p class="elementos_blog">Título:</p>
                    <input name="titulo" class="input_blog_titulo" type="text" value="{{$blog->titulo}}" required autofocus>
                </div>

                <div class="div_empareja_elementos">
                    <div class="elementos_blog_50">
                        <p class="elementos_blog">Autor blog:</p>
                        <select class="select_blog" name="autorBlog">
                            <option disable selected="selected" value="" hidden> &nbsp; Autor de blog</option>
                            @foreach ($autoresBlog as $autor)
                                @if ($blog->autor == $autor->autor)
                                <option selected>{{$autor->autor}}</option>        
                                @else
                                <option>{{$autor->autor}}</option>
                                @endif
                            @endforeach
                        </select>
                        <div class="div_nuevo_autor_blog">
                            ¿Nuevo autor?
                        </div>
                    </div>
                    <div id="nvo_autor" class="elementos_blog_50" style="display:none;"> 
                        <p class="elementos_blog">Nuevo autor:</p>
                        <input type="text" id="nvoAutor_blog" class="input_blog_autor" name="autorBlogNuevo" >
                    </div>
    
                    <div class="elementos_blog_50">
                        <p class="elementos_blog">Autor libro:</p>
                        <select class="select_blog" name="autorLibro" >
                            <option disable selected="selected" value="" hidden> &nbsp; Autor de libro</option>
                            @foreach ($autoresLibro as $autor)
                                @if ($blog->author_id)
                                    @if ($blog->author->nombre == $autor->nombre)
                                    <option value="{{$autor->id}}" selected>{{$autor->nombre}}</option>        
                                    @else
                                    <option value="{{$autor->id}}">{{$autor->nombre}}</option>
                                    @endif
                                @else
                                <option value="{{$autor->id}}">{{$autor->nombre}}</option>
                                @endif

                            @endforeach
                        </select>
                    </div>
                    <div class="elementos_blog_50">
                        <p class="elementos_blog">Tags:</p>
                        <input type="text"  id="testInput_tags_blog" class="input_blog_tag" name="tags" value="{{$tagsActuales}}">
                    </div>
                </div>

                <div class="elementos_blog_100">
                    <p class="elementos_blog">Contenido:</p>
                </div>
                <div class="elementos_blog_100">
                    <div class="contenido_gestor_blog">
                        <textarea class="blog_text_area"type="text" name="contenido" value="" required >{{$blog->contenido}}</textarea>
                        <script>
                                CKEDITOR.replace( 'contenido' );
                        </script>
                    </div>
                </div>

                <div class="elementos_blog_100">
                    <div class="elementos_blog_imagen">
                        <p class="elementos_blog">Imagen:</p>
                        <input id="imagen" class="gestor_blog_imagen" type="file" name="imagen">
                    </div>
                </div>

                <div class="botones_blog_100">
                    <div class="botones_blog_derecha">
                        <a class="gestor_blog_cancelar" href="{{ route('verBlogs')}}">Cancelar</a>
                        <input class="gestor_blog_guardar" type="submit" value="Guardar">	
                    </div>
                </div>
                <a href="#" data-toggle="modal" data-target="#logoutModal"  style="color: #b30000">Eliminar</a>
            </form>
        </div>
        <div class="preview_imagen_blog">
            <div id="preview_imagen" class="gestor_blog_mostrar_imagen">
                <img src="" alt="Imagen" class="preview_imagen_imagen">
                <span class="preview_imagen_default" style="display: none">Imagen</span>
                <img src="{{asset('/storage/blogs/'.$blog->imagen)}}" alt="Imagen" class="imagen_actual">
            </div>
        </div>
    </div>
    <br>
    <br>
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Eliminar entrada</h5>
              <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body"><p style="text-align:center">¿Estás seguro de que deseas eliminar esta entrada?</p></div>
            <div class="modal-footer">
              <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                <form action="{{ route('eliminarBlog', ['id'=>$blog->id]) }}" method="POST">
                    {{csrf_field()}}
                    @method('DELETE')
                    <button class="btn bg-danger text-white">Eliminar</button>
                </form>
            </div>
          </div>
        </div>
      </div>
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
    <script>
        var clickNvoAutor=false;
        var valor="";
         $(document).ready(function() {

            $('.div_nuevo_autor_blog').on('click', function () {
                if(clickNvoAutor){
                    $('#nvo_autor').hide();
                    document.getElementById('nvoAutor_blog').value= valor;
                    clickNvoAutor=false;
                }
                else{
                    $('#nvo_autor').show();
                    clickNvoAutor=true;
                }
                
            });

         });
    </script>
@endsection
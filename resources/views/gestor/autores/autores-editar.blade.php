@extends('layouts.menuGestor')

@section('importOwl')
    <link rel="stylesheet" type="text/css" href="/assets/css/gestorAutores.css">
    <link rel="stylesheet" type="text/css" href="/assets/css/gestorBlogs.css">
    <link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Karla&display=swap" rel="stylesheet">
@endsection

@section('menu')
    Autores | Editar Autor
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
            <form action="{{ route('autores-editar', ['id'=>$id]) }}" style="width:100%;" method="POST" enctype="multipart/form-data">
                @method("PATCH")
                @csrf
                <div class="div_elementosAuthor">
                    <p class="txt_datosAuthor">Nombre:</p>
                    <input name="nombre" class="input_datosAuthor" type="text" value="{{$autor->nombre}}" required autofocus>
                </div>

                <div class="div_elementosAuthor" style="margin-bottom: 25px">
                    <p class="txt_datosAuthor">Biografía:</p>
                    <textarea class="textarea_biografia"type="text" name="biografia" value="" required >{{$autor->descripcion}}</textarea>
                </div>

                <div class="div_elementosAuthor">
                    <p class="txt_datosAuthor">Fecha Nacimiento:</p>
                    <input name="nacimiento" style="margin-left: 0px" class="input_datosAuthor dateAuthor" type="date" value="{{$autor->fechaNac}}" autofocus>
                </div>

                <div class="div_elementosAuthor" style="margin-bottom: 25px">
                    <p class="txt_datosAuthor">Fecha Muerte:</p>
                    <input name="muerte" style="margin-left: 0px" class="input_datosAuthor dateAuthor dateMuerteAuthor" type="date" value="{{$autor->fechaMuerte}}"  autofocus>
                </div>

                <div class="div_elementosAuthor">
                    <p class="txt_datosAuthor">Imagen:</p>
                    <input id="imagen" class="img_datosAuthor" type="file" name="imagen" >
                </div>

                <div class="botones_blog_100">
                    <div class="botones_blog_derecha">
                        <a class="gestor_blog_cancelar" href="javascript:history.back(-1);">Cancelar</a>
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
                <img src="{{asset('/storage/autores/'.$autor->foto)}}" alt="Imagen" class="imagen_actual">
            </div>
        </div>


    </div>

    <br> 
    <br>
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Eliminar autor</h5>
              <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body"><p style="text-align:center">¿Estás seguro de que deseas eliminar este autor?</p></div>
            <div class="modal-footer">
              <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                <form action="{{ route('autores-delete', ['id'=>$id]) }}" method="POST">
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

@endsection
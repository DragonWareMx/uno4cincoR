@extends('layouts.menuGestor')

@section('importOwl')
    <link rel="stylesheet" type="text/css" href="/assets/css/gestorAutores.css">
    <link rel="stylesheet" type="text/css" href="/assets/css/gestorBlogs.css">
    <link rel="stylesheet" type="text/css" href="/assets/css/tags.css">
    <link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Karla&display=swap" rel="stylesheet">
    <script type="text/javascript" src='/assets/js/tags.js'></script>
    <script type="text/javascript" src='/assets/js/autofill.js'></script>
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
                @csrf
                <div class="div_elementosAuthor">
                    <p class="txt_datosAuthor">Título:</p>
                    <input name="titulo" class="input_datosAuthor" type="text" value="" required autofocus>
                </div>

                <div class="div_elementosAuthor">
                    {{-- .--------------------------------------------....................-------------------.................. --}}
                    <p class="txt_datosAuthor" >Autor:</p>
                    <input type="text" name="autor" class="input_datosAuthor" id="AutoresTags">
                </div>

                <div class="div_elementosAuthor">
                    <div class="div_elementosAuthor50">
                        <p class="txt_datosAuthor" style="width:auto">Sello:</p>
                        <select name="sello" class="input_datosAuthor50">
                            <option value="1">uno4cinco</option> 
                            <option value="2" selected>145</option>
                        </select>
                    </div>
                    <div class="div_elementosAuthor50">
                        <div class="div_space">&nbsp;&nbsp;</div>
                        <p class="txt_datosAuthor">Formato:</p>
                        <select name="formato" class="input_datosAuthor50">
                            <option value="fisico">Físico</option> 
                            <option value="fisico/digital" selected>Físico/Digital</option>
                            <option value="digital">Digital</option>
                        </select>
                    </div>
                </div>

                <div class="div_elementosAuthor">
                    <div class="div_elementosAuthor50">
                        <p class="txt_datosAuthor" style="width:auto">Estatus:</p>
                        <select name="estatus" class="input_datosAuthor50">
                            <option value="1">Disponible</option> 
                            <option value="0" selected>No disponible</option>
                        </select>
                    </div>
                    <div class="div_elementosAuthor50">
                        <div class="div_space">&nbsp;&nbsp;</div>
                        <p class="txt_datosAuthor">Ejemplares:</p>
                        <input name="ejemplares" class="input_datosAuthor input_datosAuthor50" type="number"  min="0" pattern="^[0-9]+" 
                            onpaste="return false;" onDrop="return false;" autocomplete=off step="1" value="" 
                            onkeypress="return solonumeros(event)" required >
                    </div>
                </div>

                <div class="div_elementosAuthor">
                    <div class="div_elementosAuthor50">
                        <p class="txt_datosAuthor" style="width:auto">Precio Físico:</p>
                        <input name="preciofisico" class="input_datosAuthor input_datosAuthor50" type="number" min="0" pattern="^[0-9]+" 
                        onpaste="return false;" onDrop="return false;" autocomplete=off 
                        onkeypress="return solonumerosdecimales(event)" step="any" value=""  >
                    </div>
                    <div class="div_elementosAuthor50">
                        <div class="div_space">&nbsp;&nbsp;</div>
                        <p class="txt_datosAuthor">Oferta Físico%:</p>
                        <input name="ofertafisico" class="input_datosAuthor input_datosAuthor50" type="number" min="0" pattern="^[0-9]+" 
                        onpaste="return false;" onDrop="return false;" autocomplete=off
                        onkeypress="return solonumerosdecimales(event)" step="any" value=""  >
                    </div>
                </div>

                <div class="div_elementosAuthor">
                    <div class="div_elementosAuthor50">
                        <p class="txt_datosAuthor" style="width:auto">Precio Digital:</p>
                        <input name="preciodigital" class="input_datosAuthor input_datosAuthor50" type="number" min="0" pattern="^[0-9]+" 
                        onpaste="return false;" onDrop="return false;" autocomplete=off
                        onkeypress="return solonumerosdecimales(event)" step="any" value=""  >
                    </div>
                    <div class="div_elementosAuthor50">
                        <div class="div_space">&nbsp;&nbsp;</div>
                        <p class="txt_datosAuthor">Oferta Digital%:</p>
                        <input name="ofertadigital" class="input_datosAuthor input_datosAuthor50" type="number" min="0" pattern="^[0-9]+" 
                        onpaste="return false;" onDrop="return false;" autocomplete=off
                        onkeypress="return solonumerosdecimales(event)" step="any" value=""  >
                    </div>
                </div>

                <div class="div_elementosAuthor">
                    <div class="div_elementosAuthor50">
                        <p class="txt_datosAuthor">Páginas:</p>
                        <input name="paginas" class="input_datosAuthor input_datosAuthor50" type="number" min="1" value="" pattern="^[0-9]+" 
                        onpaste="return false;" onDrop="return false;" autocomplete=off step="1"
                        onkeypress="return solonumeros(event)" required>
                    </div>
                    <div class="div_elementosAuthor50">
                        <div class="div_space">&nbsp;&nbsp;</div>
                        <p class="txt_datosAuthor">Edición:</p>
                        <input name="edicion" class="input_datosAuthor input_datosAuthor50" type="number" min="1" value="" pattern="^[0-9]+" 
                        onpaste="return false;" onDrop="return false;" autocomplete=off  step="1" 
                        onkeypress="return solonumeros(event)" required >
                    </div>
                </div>

                <div class="div_elementosAuthor">
                    <div class="div_elementosAuthor50">
                        <p class="txt_datosAuthor" style="width:auto">Género:</p>
                        <select name="genero" class="input_datosAuthor50">
                            <option value="poesía">Poesía</option> 
                            <option value="cuento" selected>Cuento</option>
                            <option value="ensayo">Ensayo</option>
                            <option value="novela">Novela</option>
                        </select>
                    </div>
                    <div class="div_elementosAuthor50">
                        <div class="div_space">&nbsp;&nbsp;</div>
                        <p class="txt_datosAuthor">ISBN:</p>
                        <input name="isbn" class="input_datosAuthor input_datosAuthor50" type="text" value="" required >
                    </div>
                </div>

                <div style="margin-top:25px; margin-bottom:25px;" class="div_elementosAuthor">
                    <p class="txt_datosAuthor txt_datosAuthorFECHA">Fecha de publicación:</p>
                    <input name="publicacion" class="input_datosAuthor dateAuthor" type="date" value="" required >
                </div>

                <div class="div_elementosAuthor" style="margin-bottom: 25px">
                    <p class="txt_datosAuthor">Sinopsis:</p>
                    <textarea style="height:200px;resize:vertical" class="textarea_biografia"type="text" name="sinopsis" value="" required ></textarea>
                </div>

                <div class="div_elementosAuthor">
                    <p class="txt_datosAuthor">Imagen:</p>
                    <input id="imagen" class="img_datosAuthor" type="file"  name="imagen" multiple="multiple" >
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
    <script>
        function solonumeros(e){
            key=e.keyCode || e.which;
            teclado=String.fromCharCode(key);
            numeros="0123456789";
            especiales=[8];
            teclado_especial=false;

            for(var i in especiales){
                if(key==especiales[i]){
                    teclado_especial=true;
                }
            }
            if(numeros.indexOf(teclado)==-1 && !teclado_especial){
                return false;
            }
        }
    </script>
    <script>
        function solonumerosdecimales(e){
            key=e.keyCode || e.which;
            teclado=String.fromCharCode(key);
            numeros="0123456789";
            especiales=[8,46];
            teclado_especial=false;

            for(var i in especiales){
                if(key==especiales[i]){
                    teclado_especial=true;
                }
            }
            if(numeros.indexOf(teclado)==-1 && !teclado_especial){
                return false;
            }
        }
    </script>
    <script>
        $(function() {
            const author = @json($authors);    
            var autores = {!! json_encode($authors->toArray()) !!};
            alert(autores);      
            $("#AutoresTags").tags({
                requireData:true,
                unique:true
            }).autofill({
                data: ["javascript","jquery","mysql","sean","clark"]
            });
        });
    </script>
    

@endsection
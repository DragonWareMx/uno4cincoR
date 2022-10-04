@extends('layouts.menuGestor')

@section('importOwl')
    <script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
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

    @if ($errors->any())
        <div class="alert alert-danger" role="alert">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="div_containerAuthor">
        <div class="div_datosAuthor">
            <form action="{{ Route('libros-crear') }}" style="width:100%;" method="POST" enctype="multipart/form-data">
                @csrf
                <p style="color:#29b390; font-size:11px"><b>INFORMACIÓN GENERAL</b></p>
                <div class="div_elementosAuthor">
                    <p class="txt_datosAuthor">Título:</p>
                    <input name="titulo" class="input_datosAuthor" type="text" value="{{ old('titulo') }}" required
                        autofocus>
                </div>

                <div class="div_elementosAuthor">
                    <p class="txt_datosAuthor">Nombre URL:</p>
                    <input name="name" class="input_datosAuthor" type="text" value="{{ old('name') }}"
                        maxlength="150" required>
                </div>

                <div class="div_elementosAuthor">
                    {{--
                .--------------------------------------------....................-------------------..................
                --}}
                    <p class="txt_datosAuthor">Autor:</p>
                    <input type="text" name="autor" class="input_datosAuthor" id="AutoresTags" value="" required>
                </div>

                <div class="div_elementosAuthor">
                    <div class="div_elementosAuthor50">
                        <p class="txt_datosAuthor" style="width:auto">Género:</p>
                        <select name="genero" class="input_datosAuthor50" value="{{ old('genero') }}">
                            <option selected value='' disabled>Selecciona una opción</option>
                            @foreach ($generos as $g)
                                <option value="{{ $g->id }}"> {{ $g->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="div_elementosAuthor50">
                        <div class="div_space">&nbsp;&nbsp;</div>
                        <p class="txt_datosAuthor">ISBN:</p>
                        <input name="isbn" class="input_datosAuthor input_datosAuthor50" type="text"
                            value="{{ old('isbn') }}">
                    </div>
                </div>

                <div class="div_elementosAuthor">
                    <div class="div_elementosAuthor50">
                        <p class="txt_datosAuthor">Páginas:</p>
                        <input name="paginas" class="input_datosAuthor input_datosAuthor50" type="number" min="1"
                            value="{{ old('paginas') }}" pattern="^[0-9]+" onpaste="return false;" onDrop="return false;"
                            autocomplete=off step="1" onkeypress="return solonumeros(event)" required>
                    </div>
                    <div class="div_elementosAuthor50">
                        <div class="div_space">&nbsp;&nbsp;</div>
                        <p class="txt_datosAuthor">Edición:</p>
                        <input name="edicion" class="input_datosAuthor input_datosAuthor50" type="number" min="1"
                            value="1" value="{{ old('edicion') }}" pattern="^[0-9]+" onpaste="return false;"
                            onDrop="return false;" autocomplete=off step="1" onkeypress="return solonumeros(event)"
                            required>
                    </div>
                </div>

                <div style="margin-top:25px; margin-bottom:25px;" class="div_elementosAuthor">
                    <p class="txt_datosAuthor txt_datosAuthorFECHA">Fecha de publicación:</p>
                    <input name="publicacion" class="input_datosAuthor dateAuthor" type="date"
                        value="{{ old('publicacion') }}" required>
                </div>

                <div class="div_elementosAuthor">
                    <p class="txt_datosAuthor">Costo de envío:</p>
                    <input name="envio" class="input_datosAuthor" type="number" value="" required autofocus>
                </div>

                <p style="color:#29b390; font-size:11px"><b>FORMATO FÍSICO</b></p>

                <div class="div_elementosAuthor">

                    <div id="ejemplares" class="div_elementosAuthor50">
                        <div class="div_space" id="espacio">&nbsp;&nbsp;</div>
                        <p class="txt_datosAuthor">Ejemplares:</p>
                        <input id="ejemplaresValor" name="ejemplares" class="input_datosAuthor input_datosAuthor50"
                            type="number" min="0" pattern="^[0-9]+" onpaste="return false;"
                            onDrop="return false;" autocomplete=off step="1" value="{{ old('ejemplares') }}"
                            onkeypress="return solonumeros(event)">
                    </div>
                </div>

                <div class="div_elementosAuthor" id="fisico">
                    <div class="div_elementosAuthor50">
                        <p class="txt_datosAuthor" style="width:auto">Precio Físico:</p>
                        <input id="preciofisico" name="preciofisico" class="input_datosAuthor input_datosAuthor50"
                            type="number" min="0" pattern="^[0-9]+" onpaste="return false;"
                            onDrop="return false;" autocomplete=off onkeypress="return solonumerosdecimales(event)"
                            step="any" value="{{ old('preciofisico') }}">
                    </div>
                    <div class="div_elementosAuthor50">
                        <div class="div_space">&nbsp;&nbsp;</div>
                        <p class="txt_datosAuthor">Oferta Físico %:</p>
                        <input id="ofertafisico" name="ofertafisico" class="input_datosAuthor input_datosAuthor50"
                            type="number" min="0" pattern="^[0-9]+" onpaste="return false;"
                            onDrop="return false;" autocomplete=off onkeypress="return solonumerosdecimales(event)"
                            step="any" value="{{ old('ofertafisico') }}">
                    </div>
                </div>

                <p style="color:#29b390; font-size:11px"><b>FORMATO DÍGITAL</b></p>
                <div class="div_elementosAuthor50" id="estatus">
                    <p class="txt_datosAuthor" style="width:auto">Estatus:</p>
                    <select id="estatusValor" name="estatus" class="input_datosAuthor50" value="{{ old('estatus') }}"
                        required>
                        <option value="1">Disponible</option>
                        <option selected value="0">No disponible</option>
                    </select>
                </div>

                {{-- <div class="div_elementosAuthor">
                <p class="txt_datosAuthor">Link de compra:</p>
                <input name="link-digital" class="input_datosAuthor" type="text" value="" autofocus>
            </div> --}}

                <div class="div_elementosAuthor">
                    <p class="txt_datosAuthor">Link de Amazon:</p>
                    <input name="linkAmazon" class="input_datosAuthor" type="text" value="" autofocus>
                </div>

                <div class="div_elementosAuthor">
                    <p class="txt_datosAuthor">Link de Google:</p>
                    <input name="linkGoogle" class="input_datosAuthor" type="text" value="" autofocus>
                </div>

                <div class="div_elementosAuthor" id="digital">
                    <div class="div_elementosAuthor50">
                        <p class="txt_datosAuthor" style="width:auto">Precio Digital:</p>
                        <input id="preciodigital" name="preciodigital" class="input_datosAuthor input_datosAuthor50"
                            type="number" min="0" pattern="^[0-9]+" onpaste="return false;"
                            onDrop="return false;" autocomplete=off onkeypress="return solonumerosdecimales(event)"
                            step="any" value="{{ old('preciodigital') }}">
                    </div>
                    <div class="div_elementosAuthor50">
                        <div class="div_space">&nbsp;&nbsp;</div>
                        <p class="txt_datosAuthor">Oferta Digital %:</p>
                        <input id="ofertadigital" name="ofertadigital" class="input_datosAuthor input_datosAuthor50"
                            type="number" min="0" pattern="^[0-9]+" onpaste="return false;"
                            onDrop="return false;" autocomplete=off onkeypress="return solonumerosdecimales(event)"
                            step="any" value="{{ old('ofertadigital') }}">
                    </div>
                </div>

                <p style="color:#29b390; font-size:11px"><b>FORMATO AUDIO LIBRO</b></p>

                <div class="div_elementosAuthor">
                    <p class="txt_datosAuthor">Link de compra:</p>
                    <input name="link-audiolibro" class="input_datosAuthor" type="text" value="" autofocus>
                </div>

                <div class="div_elementosAuthor" id="digital">
                    <div class="div_elementosAuthor50">
                        <p class="txt_datosAuthor" style="width:auto">Precio Audiolibro:</p>
                        <input id="precioaudiolibro" name="precioaudiolibro"
                            class="input_datosAuthor input_datosAuthor50" type="number" min="0"
                            pattern="^[0-9]+" onpaste="return false;" onDrop="return false;" autocomplete=off
                            onkeypress="return solonumerosdecimales(event)" step="any" value=" ">
                    </div>
                    <div class="div_elementosAuthor50">
                        <div class="div_space">&nbsp;&nbsp;</div>
                        <p class="txt_datosAuthor">Oferta Audiolibro %:</p>
                        <input id="ofertaaudiolibro" name="ofertaaudiolibro"
                            class="input_datosAuthor input_datosAuthor50" type="number" min="0"
                            pattern="^[0-9]+" onpaste="return false;" onDrop="return false;" autocomplete=off
                            onkeypress="return solonumerosdecimales(event)" step="any" value="">
                    </div>
                </div>

                <p style="color:#29b390; font-size:11px"><b>VISTA PREVIA</b></p>

                <div class="div_elementosAuthor">
                    <p class="txt_datosAuthor">Imagen en Tienda:</p>
                    <input id="imagenTienda" class="img_datosAuthor" type="file" name="imagenTienda"
                        value="{{ old('imagenTienda') }}" required>
                </div>

                <div class="div_elementosAuthor">
                    <p class="txt_datosAuthor">Imágenes extra:</p>
                    <input id="imagenExtra" class="img_datosAuthor" type="file" multiple="multiple"
                        name="imagenExtra[]" value="{{ old('imagenExtra[]') }}">
                </div>

                <div class="div_elementosAuthor" style="margin-bottom: 25px">
                    <p class="txt_datosAuthor">Sinopsis:</p>
                    <textarea style="height:200px;resize:vertical" class="textarea_biografia" type="text" name="sinopsis" required></textarea>
                    <script>
                        CKEDITOR.replace('sinopsis');
                    </script>
                </div>

                <div class="div_elementosAuthor" id="archivoLibroDiv"">
                    <p class=" txt_datosAuthor">Demo libro:</p>
                    <input id="archivoLibro" class="img_datosAuthor" type="file" name="archivoLibro"
                        value="{{ old('archivoLibro') }}">
                </div>

                <!-- <div class="div_elementosAuthor">
                        <div class="div_elementosAuthor50">
                            <p class="txt_datosAuthor" style="width:auto">Sello:</p>
                            <select name="sello" class="input_datosAuthor50" value="{{ old('sello') }}"required>
                                <option selected    value="1">uno4cinco</option>
                                <option value="2">145</option>
                            </select>
                        </div>
                        <div class="div_elementosAuthor50">
                            <div class="div_space">&nbsp;&nbsp;</div>
                            <p class="txt_datosAuthor">Formato:</p>
                            <select id="formatoSelect" name="formato" class="input_datosAuthor50" value="{{ old('formato') }}" required>
                                <option value="fisico">Físico</option>
                                <option value="fisico/digital">Físico/Digital</option>
                                <option value="digital">Digital</option>
                                <option value="" selected="selected" hidden>Selecciona el formato</option>
                            </select>
                        </div>
                    </div> -->

                @if (sizeOf($collections) > 0)
                    <div style="margin-top:25px; margin-bottom:25px;" class="div_elementosAuthor">
                        <div class="div_elementosAuthor50">
                            <p class="txt_datosAuthor txt_datosAuthorFECHA">Colección:</p>
                            <select name="coleccion" class="input_datosAuthor50" value="{{ old('coleccion') }}">
                                <option value="" selected>Selecciona una colección</option>
                                @foreach ($collections as $collection)
                                    <option value="{{ $collection->id }}">{{ $collection->nombre }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                @endif

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
        const inpFile = document.getElementById("imagenTienda");
        const previewContainer = document.getElementById("preview_imagen");
        const previewImage = previewContainer.querySelector(".preview_imagen_imagen");
        const previewImageAnterior = previewContainer.querySelector(".imagen_actual");
        const previewDefaultText = previewContainer.querySelector(".preview_imagen_default");

        inpFile.addEventListener("change", function() {
            const file = this.files[0];

            if (file) {
                const reader = new FileReader();

                previewDefaultText.style.display = "none";
                previewImageAnterior.style.display = "none";
                previewImage.style.display = "block";

                reader.addEventListener("load", function() {
                    previewImage.setAttribute("src", this.result);
                    previewContainer.style.width = "auto";
                    previewContainer.style.height = "auto";
                    previewContainer.style.border = "none";

                });
                reader.readAsDataURL(file);
            }
        });
    </script>
    <script>
        function solonumeros(e) {
            key = e.keyCode || e.which;
            teclado = String.fromCharCode(key);
            numeros = "0123456789";
            especiales = [8];
            teclado_especial = false;

            for (var i in especiales) {
                if (key == especiales[i]) {
                    teclado_especial = true;
                }
            }
            if (numeros.indexOf(teclado) == -1 && !teclado_especial) {
                return false;
            }
        }
    </script>
    <script>
        function solonumerosdecimales(e) {
            key = e.keyCode || e.which;
            teclado = String.fromCharCode(key);
            numeros = "0123456789";
            especiales = [8, 46];
            teclado_especial = false;

            for (var i in especiales) {
                if (key == especiales[i]) {
                    teclado_especial = true;
                }
            }
            if (numeros.indexOf(teclado) == -1 && !teclado_especial) {
                return false;
            }
        }
    </script>
    <script>
        $(function() {
            const authors = @json($authors);
            var i = 0;
            var datos = [];
            authors.forEach(element => {
                datos[i] = authors[i]['nombre'];
                i++;
            });
            $("#AutoresTags").tags({
                requireData: true,
                unique: true
            }).autofill({
                data: datos
            });
        });
    </script>

    <script>
        var valor = "";
        $(document).ready(function() {
            $('#formatoSelect').change(function() {
                if (this.value == 'fisico') {
                    $('#ejemplares').show();
                    $('#fisico').show();
                    $('#estatus').hide();
                    $('#digital').hide();
                    $('#archivoLibroDiv').hide();
                    document.getElementById('preciodigital').value = valor;
                    document.getElementById('ofertadigital').value = valor;
                    document.getElementById('estatusValor').value = 0;

                    $('#ejemplaresValor').prop("required", true);
                    document.getElementById("espacio").style.display = "none";
                    $('#preciofisico').prop("required", true);
                    $('#preciodigital').prop("required", false);
                    $('#estatusValor').prop("required", false);

                } else if (this.value == 'digital') {
                    $('#estatus').show();
                    $('#digital').show();
                    $('#archivoLibroDiv').show();
                    $('#ejemplares').hide();
                    $('#fisico').hide();
                    document.getElementById('preciofisico').value = valor;
                    document.getElementById('ofertafisico').value = valor;
                    document.getElementById('ejemplaresValor').value = valor;

                    $('#ejemplaresValor').prop("required", false);
                    $('#preciofisico').prop("required", false);
                    $('#preciodigital').prop("required", true);
                    $('#estatusValor').prop("required", true);
                } else if (this.value == 'fisico/digital') {
                    $('#estatus').show();
                    $('#ejemplares').show();
                    $('#archivoLibroDiv').show();
                    $('#fisico').show();
                    $('#digital').show();
                    document.getElementById("espacio").style.display = "flex";
                    $('#ejemplaresValor').prop("required", true);
                    $('#preciofisico').prop("required", true);
                    $('#preciodigital').prop("required", true);
                    $('#estatusValor').prop("required", true);
                }
            });
        });
    </script>

@endsection

<div class="container" id="loadBooks">
    <div class="row justify-content-start">
        @if (count($books) > 0)
            {{-- LIBRO --}}
            @foreach ($books as $book)
                <div class="col-lg-3 col-md-4 col-sm-6 col-6">
                    <div class="producto-tienda">
                        <!--imagen del producto-->
                        <div class="imagen">
                            <img src="{{asset('storage/libros/'.$book->tiendaImagen)}}">
                        </div>

                        <!-- informacion del libro -->
                        <div class="info-libro" onclick="clickLibro({{$book->id}})" id="{{$book->id}}" style="opacity: 0;">
                            <div class="info non-selectable">
                                {{-- DESCUENTOS --}}
                                @if($book->descuentoFisico == $book->descuentoDigital && $book->descuentoFisico > 0)
                                    <h1 style="margin-bottom: 10px;"><b>{{$book->descuentoFisico}}% de descuento en formato físico y digital</b></h1>
                                @elseif($book->descuentoFisico > 0 && $book->descuentoDigital > 0)
                                    <h1 style="margin-bottom: 10px;"><b>{{$book->descuentoFisico}}% de descuento en formato físico y {{$book->descuentoDigital}}% en formato digital</b></h1>
                                @elseif($book->descuentoFisico > 0)
                                    <h1 style="margin-bottom: 10px;"><b>{{$book->descuentoFisico}}% de descuento en formato físico</b></h1>
                                @elseif($book->descuentoDigital > 0)
                                    <h1 style="margin-bottom: 10px;"><b>{{$book->descuentoDigital}}% de descuento en formato digital</b></h1>
                                @endif

                                {{-- AUTOR --}}
                                <h1>Autor:</h1>
                                <p>{{$book->authors[0]->nombre}}</p>

                                {{-- NUM EDICION --}}
                                <h1>Num. Edición:</h1>
                                <p>{{$book->numEdicion}}</p>

                                {{-- SELLO --}}
                                <h1>Sello:</h1>
                                <p>{{$book->sello->nombre}}</p>
                            </div>
                        </div>

                        <!--icono de oferta-->
                        @if($book->descuentoFisico > 0 || $book->descuentoDigital > 0)
                            <div class="img-oferta">
                                @if ($book->sello->nombre == 'uno4cinco')
                                    <img src="{{asset('img/ico/oferta.png')}}">
                                @else
                                    <img src="{{asset('img/ico/oferta2.png')}}">
                                @endif
                            </div>
                        @endif

                        <!--titulo del libro-->
                        <a href="{{ route('libro', ['id' => $book->id])}}">
                            <div class="titulo">
                                <p>{{Str::limit($book->titulo,49)}}</p>
                            </div>
                        </a>

                        <!--precio e icono de nuevo-->
                        <div class="contenido-producto"  data-toggle="tooltip" data-placement="top" data-html="true" title="
                        Precio Físico: @if($book->precioFisico > 0) ${{ number_format($book->precioFisico - $book->precioFisico*($book->descuentoFisico/100), 2 , ".", "," ) }} @if($book->descuentoFisico > 0)(con descuento)@endif @else @if($book->stockFisico > 0)  Gratis @else No disponible @endif @endif
                        <br>
                        Precio Digital: @if($book->precioDigital > 0) ${{ number_format($book->precioDigital - $book->precioDigital*($book->descuentoDigital/100), 2 , ".", "," ) }} @if($book->descuentoDigital > 0)(con descuento)@endif @else @if($book->stockDigital > 0) Gratis @else No disponible @endif @endif
                        <br>
                        @if($book->nuevo == 1)
                            @if($book->sello->nombre == 'uno4cinco')
                                <p>Nuevo de uno4cinco</p>
                            @else
                                <h1>Nuevo de 145<h1>
                            @endif
                        @endif">
                            <div class="precio" style="cursor: default;">
                                {{-- SI EXISTE UN DESCUENTO FÍSICO Y DIGITAL MUESTRA EL RESULTADO CON MENOR COSTO --}}
                                @if($book->descuentoFisico > 0 && $book->descuentoDigital > 0)
                                    @php
                                        $precio1 = $book->precioFisico - $book->precioFisico*($book->descuentoFisico/100);
                                        $precio2 = $book->precioDigital - $book->precioDigital*($book->descuentoDigital/100);
                                    @endphp
                                    @if($precio1 < $precio2)
                                        @if($precio1 > 0)
                                            <div class="oferta">
                                                ${{ number_format($book->precioFisico, 2 , ".", "," ) }}
                                            </div>
                                            @php
                                                $precio = $book->precioFisico - ($book->precioFisico * ($book->descuentoFisico/100));
                                            @endphp
                                            ${{ number_format($precio, 2 , ".", "," ) }}
                                        @else
                                            @if($book->stockFisico > 0)
                                                Gratis
                                            @elseif($book->stockDigital > 0)
                                                @if($book->precioDigital > 0)
                                                    <div class="oferta">
                                                        ${{ number_format($book->precioDigital, 2 , ".", "," ) }}
                                                    </div>
                                                    @php
                                                        $precio = $book->precioDigital - ($book->precioDigital * ($book->descuentoDigital/100));
                                                    @endphp
                                                    ${{ number_format($precio, 2 , ".", "," ) }}
                                                @else
                                                    Gratis
                                                @endif
                                            @else
                                                No disponible
                                            @endif
                                        @endif
                                    @else
                                        @if($precio2 > 0)
                                            <div class="oferta">
                                                ${{ number_format($book->precioDigital, 2 , ".", "," ) }}
                                            </div>
                                            @php
                                                $precio = $book->precioDigital - ($book->precioDigital * ($book->descuentoDigital/100));
                                            @endphp
                                            ${{ number_format($precio, 2 , ".", "," ) }}
                                        @else
                                            @if($book->stockDigital > 0)
                                                Gratis
                                            @elseif($book->stockFisico > 0)
                                                @if($book->precioFisico > 0)
                                                    <div class="oferta">
                                                        ${{ number_format($book->precioFisico, 2 , ".", "," ) }}
                                                    </div>
                                                    @php
                                                        $precio = $book->precioFisico - ($book->precioFisico * ($book->descuentoFisico/100));
                                                    @endphp
                                                    ${{ number_format($precio, 2 , ".", "," ) }}
                                                @else
                                                    Gratis
                                                @endif
                                            @else
                                                No disponible
                                            @endif
                                        @endif
                                    @endif
                                @elseif($book->descuentoFisico > 0)
                                     @if($book->precioFisico > 0)
                                        <div class="oferta">
                                            ${{ number_format($book->precioFisico, 2 , ".", "," ) }}
                                        </div>
                                        @php
                                            $precio = $book->precioFisico - ($book->precioFisico * ($book->descuentoFisico/100));
                                        @endphp
                                        ${{ number_format($precio, 2 , ".", "," ) }}
                                    @else
                                        @if($book->stockFisico > 0)
                                            Gratis
                                        @elseif($book->stockDigital > 0)
                                            @if($book->precioDigital > 0)
                                                ${{ number_format($book->precioDigital, 2 , ".", "," ) }}
                                            @else
                                                Gratis
                                            @endif
                                        @else
                                            No disponible
                                        @endif
                                    @endif
                                @elseif($book->descuentoDigital > 0)
                                    @if($book->precioDigital)
                                        <div class="oferta">
                                            ${{ number_format($book->precioDigital, 2 , ".", "," ) }}
                                        </div>
                                        @php
                                            $precio = $book->precioDigital - ($book->precioDigital * ($book->descuentoDigital/100));
                                        @endphp
                                        ${{ number_format($precio, 2 , ".", "," ) }}
                                    @else
                                        @if($book->stockDigital > 0)
                                            Gratis
                                        @elseif($book->stockFisico > 0)
                                            @if($book->precioFisico > 0)
                                                ${{ number_format($book->precioFisico, 2 , ".", "," ) }}
                                            @else
                                                Gratis
                                            @endif
                                        @else
                                            No disponible
                                        @endif
                                    @endif
                                @else
                                    @php
                                        $precio1 = $book->precioFisico;
                                        $precio2 = $book->precioDigital;
                                    @endphp
                                    @if ($precio1 < $precio2)
                                        @if($precio1 > 0)
                                            ${{ number_format($precio1, 2 , ".", "," ) }}
                                        @else
                                            @if($book->stockFisico > 0)
                                                Gratis
                                            @elseif($book->stockDigital > 0)
                                                @if($precio2 > 0)
                                                    ${{ number_format($precio2, 2 , ".", "," ) }}
                                                @else
                                                    Gratis
                                                @endif
                                            @else
                                                No disponible
                                            @endif
                                        @endif
                                    @else
                                        @if($precio2 > 0)
                                            ${{ number_format($precio2, 2 , ".", "," ) }}
                                        @else
                                            @if($book->stockDigital > 0)
                                                Gratis
                                            @elseif($book->stockFisico > 0)
                                                @if($precio1 > 0)
                                                    ${{ number_format($precio1, 2 , ".", "," ) }}
                                                @else
                                                    Gratis
                                                @endif
                                            @else
                                                No disponible
                                            @endif
                                        @endif
                                    @endif
                                @endif
                            </div>

                            {{-- Muestra sello --}}
                            @if ($book->nuevo == 1)
                                @if ($book->sello->nombre == 'uno4cinco')
                                    <img src="{{asset('img/ico/signo!.png')}}">
                                @else
                                    <img src="{{asset('img/ico/signo2.png')}}">
                                @endif
                            @endif
                        </div>

                        <!--boton de carrito-->
                        <button class="shrink" onclick="comprarCarrito({{ $book->id }})" data-toggle="modal" data-target="#comprarFormato">
                            <img src="{{asset('img/ico/carrito.png')}}"> Agregar al carrito
                        </button>
                    </div>
                </div>
            @endforeach
        @else
            <div style="min-height: 413px; text-align: center; width:100%; font-weight: 500; z-index: -1;">
                <h5 style="padding-top:200px">No hay libros que mostrar</h5>
            </div>
        @endif
    </div>

    <div class="paginate-tienda">
        <div style="width: fit-content; margin:auto;">
        {{ $books->links() }}
        </div>
    </div>

    <hr class="hr-tienda">
</div>

<!--Muestra la info de los libros-->
<script>
    function clickLibro(id) {
        var x = document.getElementById(id);
        if (x.style.opacity === "0") {
            x.style.opacity = "1";
        } else {
            x.style.opacity = "0";
        }
    }
</script>

{{-- TOOLTIP QUE MUESTRA LOS PRECIOS --}}
<script>
    $(document).ready(function(){
        $('[data-toggle="tooltip"]').tooltip();
    });
</script>
<div class="container-md" id="loadBooks">
    <div class="row flex-wrap-reverse">
        <div class="col-lg-10 col-md-12" style="padding:0px">
            <div class="container-lg div-scroll-libros" style="max-height:670px;">
                <div class="row">
                    @if (count($books) > 0)
                    {{-- LIBRO --}}
                    @foreach ($books as $book)
                    <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6 col-6">
                        <div class="producto-tienda">
                            <a href="{{ route('libro', ['id' => $book->id])}}">
                                <!--imagen del producto-->
                                <div class="imagen">
                                    <img src="{{asset('storage/libros/'.$book->tiendaImagen)}}">
                                </div>

                                <!--titulo del libro-->
                                <div class="titulo" style="margin:25px 0px 15px 0px">
                                    <p>{{Str::limit($book->titulo,34)}}</p>
                                </div>

                                <p class="autor-limit hidden-512">{{Str::limit($book->authors[0]->nombre,45)}}</p>

                                <p class="autor-limit responsive-autor">{{Str::limit($book->authors[0]->nombre,33)}}</p>

                                <p class="precio-rango">{{$book->isbn}}</p>
                            </a>
                            <!--boton de bolsa-->
                            <button class="shrink" onclick="agregarLibro({{ $book->id }})">
                                Agregar a la bolsa
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
            </div>
            <!-- PAGINACION -->
            <div class="paginate-tienda">
                <div style="width: fit-content; margin:auto;">
                    {{ $books->links() }}
                </div>
            </div>
        </div>
        <!-- PUBLICIDAD -->
        <div class="col-lg-2 col-mg-12 justify-content-center d-flex" style="padding:0px">
            <!-- Slider 1520px  o 690, con el que queda mejor -->
            {{-- <div class="hidden-990" style="width:260px; height:690px;">
                <img src="{{asset('storage/banners/'.$banner[0]->imagenPC)}}"
                    style="width:100%; height:100%; border-radius: 22px; object-fit:cover ">
            </div> --}}
            <div class="hidden-990" style="width:260px; height:710px; padding-top: 20px">
                <div id="carruselBanner" class="carousel slide" data-ride="carousel"
                    style="margin-bottom:60px !important">
                    <div class="carousel-inner">
                        @php
                        $i=0;
                        @endphp
                        @foreach ($banner as $bann)
                        @if ($i==0)
                        <div class="carousel-item active">
                            <div class="transparente_libros">
                                <div id="img_carrusel" class="img_libros" style="background: url('{{asset('storage/banners/'.$bann->imagenPC)}}');
                                            background-size: cover;
                                            -moz-background-size: cover;
                                            -o-background-size: cover;
                                            -webkit-background-size: cover;">
                                    <a href="{{$bann->link}}" style="display: block; height: 100%"></a>
                                </div>
                            </div>
                        </div>
                        @else
                        <div class="carousel-item ">
                            <div class="transparente_libros">
                                <div id="img_carrusel" class="img_libros" style="background: url('{{asset('storage/banners/'.$bann->imagenPC)}}');
                                        background-size: cover;
                                        -moz-background-size: cover;
                                        -o-background-size: cover;
                                        -webkit-background-size: cover;">
                                    <a href="{{$bann->link}}" style="display: block; height: 100%"></a>
                                </div>
                            </div>

                        </div>
                        @endif
                        @php
                        $i++;
                        @endphp
                        @endforeach
                        <a class="carousel-control-prev flechasPosicion newPosition" data-target="#carruselBanner"
                            data-slide="prev" style="cursor: pointer; cursor:hand;">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next flechasPosicion newPosition" data-target="#carruselBanner"
                            data-slide="next" style="cursor: pointer; cursor:hand;">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="show-990" style="width:1000px; height:200px;display:none; margin-bottom:40px">
                <div id="carruselPhone" class="carousel slide" data-ride="carousel"
                    style="margin-bottom:60px !important">
                    <div class="carousel-inner">
                        @php
                        $i=0;
                        @endphp
                        @foreach ($banner as $bann)
                        @if ($i==0)
                        <div class="carousel-item active">
                            <div class="transparente_libros">
                                <div id="img_carrusel_cel" class="img_libros" style="background: url('{{asset('storage/banners/'.$bann->imagenCell)}}');
                                            background-size: contain;
                                            -moz-background-size: contain;
                                            background-repeat: no-repeat;
                                            -o-background-size: contain;
                                            -webkit-background-size: contain;">
                                    <a href="{{$bann->link}}" style="display: block; height: 100%"></a>
                                </div>
                            </div>
                        </div>
                        @else
                        <div class="carousel-item ">
                            <div class="transparente_libros">
                                <div id="img_carrusel_cel" class="img_libros" style="background: url('{{asset('storage/banners/'.$bann->imagenCell)}}');
                                        background-size: contain;
                                        -moz-background-size: contain;
                                        background-repeat: no-repeat;
                                        -o-background-size: contain;
                                        -webkit-background-size: contain;">
                                    <a href="{{$bann->link}}" style="display: block; height: 100%"></a>
                                </div>
                            </div>

                        </div>
                        @endif
                        @php
                        $i++;
                        @endphp
                        @endforeach
                        <a class="carousel-control-prev flechasPosicionCell newPosition" data-target="#carruselPhone"
                            data-slide="prev" style="cursor: pointer; cursor:hand;">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next flechasPosicionCell newPosition" data-target="#carruselPhone"
                            data-slide="next" style="cursor: pointer; cursor:hand;">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
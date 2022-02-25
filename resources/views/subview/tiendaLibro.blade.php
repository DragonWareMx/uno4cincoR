<div class="container-md" id="loadBooks">
    <div class="row flex-wrap-reverse">
        <div class="col-lg-10 col-md-12" style="padding:0px">
            <div class="container-lg div-scroll-libros" style="max-height:1520px;">
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

                                        <p class="precio-rango">$100 - $100</p>
                                    </a>
                                    <!--boton de bolsa-->
                                    <button class="shrink" onclick="comprarCarrito({{ $book->id }})" data-toggle="modal" data-target="#comprarFormato">
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
        </div>
        <!-- PUBLICIDAD -->
        <div class="col-lg-2 col-mg-12 justify-content-center d-flex" style="padding:0px">
            <div class="hidden-990" style="width:260px; height:1520px; background-color:blue">
                <img src="/img/ico/slider.png" style="width:100%; height:100%; ">    
            </div>
            <div class="show-990" style="width:1000px; height:260px; background-color:blue; display:none">
                <img src="/img/ico/slider.png" style="width:100%; height:100%; "> 
            </div>
        </div>
    </div>
    <div class="paginate-tienda">
        <div style="width: fit-content; margin:auto;">
        {{ $books->links() }}
        </div>
    </div>
</div>
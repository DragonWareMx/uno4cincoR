<div class="container" id="loadBooks">
    <div class="row justify-content-start">
            
        @if (count($books) > 0)
            {{-- LIBRO --}}
            @foreach ($books as $book)
                <div class="col-lg-3 col-md-4 col-sm-6 col-6">
                    <div class="producto-tienda">
                        <a href="{{ route('libro', ['id' => $book->id])}}">
                            <!--imagen del producto-->
                            <div class="imagen">
                                <img src="{{asset('storage/libros/'.$book->tiendaImagen)}}">
                            </div>

                            <!--titulo del libro-->
                            <div class="titulo" style="margin:25px 0px 15px 0px">
                                <p>{{Str::limit($book->titulo,42)}}</p>
                            </div>

                            <p class="autor-limit">{{Str::limit($book->authors[0]->nombre,56)}}</p>

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

    <div class="paginate-tienda">
        <div style="width: fit-content; margin:auto;">
        {{ $books->links() }}
        </div>
    </div>
</div>
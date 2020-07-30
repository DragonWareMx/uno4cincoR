@extends('layouts.menuGestor')
 
@section('importOwl')
    <link rel="stylesheet" type="text/css" href="{{asset('/assets/css/tienda.css')}}">
@endsection

@section('menu')
    <a href="{{ route('verColecciones') }}" class="txt-titulosGestor">Colecciones</a>
@endsection

@section('contenido') 
    <div class="all_blogs_80" style="margin-bottom: 15px">
        <a href="{{ route('nuevaColeccion') }}" class="a_agregarAutor" >Agregar colección</a>
     </div>
     <div class="container">
        @if (count($collections) > 0)
            {{-- Coleccion --}}

            @php
                $contador = 0;
            @endphp

            @foreach ($collections as $collection)
                
                @if ($contador == 0)
                    <div class="row justify-content-start"> 
                @endif


                <div class="col-lg-4 col-md-4  col-sm-4 collection-container shrink">
                    <img src="{{asset('storage/libros/'.$collection->books[0]->tiendaImagen)}}">
                    <a href="{{route('verLibros')}}?clasificacion=coleccion&busqueda={{$collection->id}}"><div class="name">
                        <p>{{ Str::limit($collection->nombre,49) }}</p>
                    </div></a>
                </div>
                <div class="all_blogs_80" style="margin-bottom: 15px">
                    <a href="{{ route('nuevaColeccion') }}" class="a_agregarAutor" ><i class="far fa-trash-alt"></i></a>
                    <a href="{{ route('nuevaColeccion') }}" class="a_agregarAutor" ><i class="far fa-edit"></i></a>
                 </div>

                @php
                    $contador++;
                @endphp


                @if ($contador == 2)
                    </div>
                    @php
                        $contador = 0;
                    @endphp
                @endif


            @endforeach

            @if ($contador < 2)
                </div>
            @endif
        @else
            <div style="min-height: 413px; text-align: center; width:100%; font-weight: 100;">
                <h5 style="padding-top:200px">No hay Colecciones que mostrar</h5>
            </div>
        @endif
    </div>

    <div class="paginate-tienda">
        <div style="width: fit-content; margin:auto;">
        {{ $collections->links() }}
        </div>
    </div>
@endsection
@extends('layouts.layoutTienda')

@section('seccionTienda')
    Colecciones
@endsection

@section('encabezadoTienda')
    Colecciones
@endsection

@section('contenidoTienda')

    {{-- TOOLTIP QUE MUESTRA LAS COLECCIONES --}}
    <script>
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>

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


                <div class="col-lg-4 col-md-4  col-sm-4 collection-container shrink" @if($collection->descripcion) data-toggle="tooltip" data-placement="top" data-html="true" title="{{ $collection->descripcion }}" @endif>
                    <img src="{{asset('storage/libros/'.$collection->books[0]->tiendaImagen)}}">
                    <a href="{{ route('coleccion', ['id'=>$collection->id]) }}"><div class="name">
                        <p>{{ Str::limit($collection->nombre,49) }}</p>
                    </div></a>
                </div>


                @php
                    $contador++;
                @endphp


                @if ($contador == 3)
                    </div>
                    @php
                        $contador = 0;
                    @endphp
                @endif


            @endforeach

            @if ($contador < 3)
                </div>
            @endif
        @else
            <div style="min-height: 413px; text-align: center; width:100%; font-weight: 100;">
                <h5 style="padding-top:200px">No hay colecciones que mostrar</h5>
            </div>
        @endif
    </div>

    <div class="paginate-tienda">
        <div style="width: fit-content; margin:auto;">
        {{ $collections->links() }}
        </div>
    </div>

    <hr class="hr-tienda">
@endsection
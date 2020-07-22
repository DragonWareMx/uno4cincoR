@extends('layouts.layoutPubli')

@section('header')
<title>Libro | Editorial uno4cinco</title>

<link rel="stylesheet" type="text/css" href="{{asset('/assets/css/style_SobreNosotros.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('/assets/css/carrito.css')}}">

<link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Karla&display=swap" rel="stylesheet">

<link rel="stylesheet" href="{{asset('/css/owl.theme.default.min.css')}}">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.0/jquery.min.js"></script>

@endsection

@section('content')

<section class="section" id="about" style="width:100%; height:100%; background-color:#F2ECD5">
    {{-- TITTLE --}}
    <p class="txt-TitulosApartados">Carrito</p>
    <hr class="hr-Titulos-long">
    <hr class="hr-Titulos-small">
    
    <div class="container-fluid">
        <div class="row">
            @if (session('cart'))
                @php
                    $total = 0; 
                @endphp
                <div class="carrito-table">
                    <div class="carrito-cell cell-80">
                        <div class="productos-container">
                            @foreach(session('cart') as $id => $details)
                                @foreach ($books as $libro)
                                    @if ($libro->id == $id)
                                        @if ($details['cantidadFisico'] > 0)
                                            <div class="producto">
                                                <div class="imagen">
                                                    <img src="{{ asset('/storage/libros/'.$libro->tiendaImagen) }}">
                                                </div>
                                                <div class="producto-cell">
                                                    <div style="display:table; width:100%;">
                                                        <div class="datos">
                                                            <div class="titulo">
                                                                <p><b>Título: </b><a href="{{ route('libro', ['id' => $id])}}">{{ $libro->titulo }}</a></p>
                                                                <a href="#" style="margin-left: auto" class="eliminar">Eliminar</a>
                                                            </div>
                                                            @if (count($libro->authors) > 1)
                                                                <p><b>Autores: </b>
                                                            @else
                                                                <p><b>Autor: </b>
                                                            @endif
                                                                @php
                                                                    $contador = 1;
                                                                    $cantAutores = count($libro->authors);
                                                                @endphp
                                                                @foreach ($libro->authors as $author)
                                                                    @if ($contador == 1)
                                                                    <a href="#">{{$author->nombre}}</a>
                                                                    @elseif($contador == $cantAutores)
                                                                        y <a href="#">{{$author->nombre}}</a>
                                                                    @else
                                                                        , <a href="#">{{$author->nombre}}</a>
                                                                    @endif
                                                                    @php
                                                                        $contador++;
                                                                    @endphp
                                                                @endforeach
                                                            </p>
                                                            <p><b>Formato: </b>Físico</p>
                                                        </div>
                                                        <div class="totales">
                                                            <div class="table-div">
                                                                <div class="row-div">
                                                                    <div class="cell-div">
                                                                        Precio
                                                                    </div>
                                                                    <div class="cell-div">
                                                                        Cantidad
                                                                    </div>
                                                                    <div class="cell-div">
                                                                        <b>Subtotal</b>
                                                                    </div>
                                                                </div>
                                                                <div class="row-div">
                                                                    <div class="cell-div">
                                                                        <div class="precio">
                                                                            @if($libro->descuentoFisico > 0)
                                                                                <div class="oferta">
                                                                                    ${{ $libro->precioFisico }}
                                                                                </div>
                                    
                                                                                ${{ $libro->precioFisico - $libro->precioFisico*($libro->descuentoFisico/100) }}
                                                                            @else
                                                                                ${{ $libro->precioFisico }}
                                                                            @endif
                                                                        </div>
                                                                    </div>
                                                                    <div class="cell-div">
                                                                        <div class="cantidades">
                                                                            <div role="button" tabindex="0" class="qty qty-minus" onclick="menosCantidad({{ $libro->id }})">-</div>
                                                                            <input type="numeric" id="cantidadFisico{{ $libro->id }}" value="{{ $details['cantidadFisico'] }}" />
                                                                            <div role="button" tabindex="0" class="qty qty-plus" onclick="masCantidad({{ $libro->id }})">+</div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="cell-div">
                                                                        <b id="{{ $libro->id }}fisico">${{ ($libro->precioFisico - $libro->precioFisico*($libro->descuentoFisico/100))*$details['cantidadFisico'] }}</b>
                                                                        @php
                                                                            $total += ($libro->precioFisico - $libro->precioFisico*($libro->descuentoFisico/100))*$details['cantidadFisico'];
                                                                        @endphp
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                        @if ($details['cantidadDigital'] > 0)
                                            <div class="producto">
                                                <div class="imagen">
                                                    <img src="{{ asset('/storage/libros/'.$libro->tiendaImagen) }}">
                                                </div>
                                                <div class="producto-cell">
                                                    <div style="display:table; width:100%;">
                                                        <div class="datos">
                                                            <div class="titulo">
                                                                <p><b>Título: </b><a href="{{ route('libro', ['id' => $id])}}">{{ $libro->titulo }}</a></p>
                                                                <a href="#" style="margin-left: auto" class="eliminar">Eliminar</a>
                                                            </div>
                                                            <p><b>Autor: </b><a href="#">{{ $libro->authors[0]->nombre }}</a></p>
                                                            <p><b>Formato: </b>Digital</p>
                                                        </div>
                                                        <div class="totales">
                                                            <div class="table-div">
                                                                <div class="row-div">
                                                                    <div class="cell-div">
                                                                        Precio
                                                                    </div>
                                                                    <div class="cell-div">
                                                                        Cantidad
                                                                    </div>
                                                                    <div class="cell-div">
                                                                        <b>Subtotal</b>
                                                                    </div>
                                                                </div>
                                                                <div class="row-div">
                                                                    <div class="cell-div">
                                                                        <div class="precio">
                                                                            @if($libro->descuentoDigital > 0)
                                                                                <div class="oferta">
                                                                                    ${{ $libro->precioDigital }}
                                                                                </div>
                                    
                                                                                ${{ $libro->precioDigital - $libro->precioDigital*($libro->descuentoDigital/100) }}
                                                                            @else
                                                                                ${{ $libro->precioDigital }}
                                                                            @endif
                                                                        </div>
                                                                    </div>
                                                                    <div class="cell-div">
                                                                        <div class="cantidades">
                                                                            1
                                                                        </div>
                                                                    </div>
                                                                    <div class="cell-div">
                                                                        <b>${{ ($libro->precioDigital - $libro->precioDigital*($libro->descuentoDigital/100)) }}</b>
                                                                        @php
                                                                            $total += ($libro->precioDigital - $libro->precioDigital*($libro->descuentoDigital/100));
                                                                        @endphp
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    @endif
                                @endforeach
                            @endforeach
                        </div>
                    </div>
                    <div class="carrito-cell cell-20">
                        <div class="compra-container">
                            <div style="width: 225px; margin:auto;">
                                <h1 id="total-carrito">Total : ${{ $total }}</h1>
                                <p>Pueden aplicarse gastos de envío,</p>
                                <a href="#">detalles</a>
                                <button class="tienda shrink" onclick="location.href='{{ route('tiendaCatalogo') }}'">Volver a la tienda</button>
                                <button class="comprar shrink">Comprar ahora</button>
                            </div>
                        </div>
                    </div>
                </div>
            @else
                <div class="carrito-vacio">
                    <p>No tienes productos en tu carrito</p>
                    <a href="{{ route('tiendaCatalogo') }}" class="shrink">Ir a la tienda</a>
                </div>
            @endif
        </div>
    </div>
    

</section>

<script>
    var libros = @json($books);
    var carrito = @json(session()->get('cart'));

    //obtiene los datos del libro en base al id
    function getLibro(id){
        var libro;

        for (var i = 0; i < libros.length; i++){
            var a = libros[i];
            if(a['id']==id){
                libro = a;
                break;
            }
        }

        return libro;
    }

    //suma la cantidad de un producto en el carrito
    function masCantidad(id){
        //cantidad actual en el carrito
        var cantidad = document.getElementById("cantidadFisico"+id).value;
        //obtiene los datos del libro
        var libro = getLibro(id);
        //cantidad maxima posible del producto
        var max = libro['stockFisico'];
        var subtotal = 0;

        cantidad++;

        if(cantidad > max)
            cantidad = max;

        $.ajax({
                url: 'agregar-a-carrito/'+id+'/'+cantidad+'/fisico',
                method: "get",
                success: function (){
                    //se actualiza la cantidad en el input
                    document.getElementById("cantidadFisico"+id).value = cantidad;

                    //se calula el subtotal del producto actual y se actualiza
                    subtotal = (libro['precioFisico']-libro['precioFisico']*(libro['descuentoFisico']/100))*cantidad;
                    document.getElementById(id+"fisico").innerHTML = "$"+subtotal;

                    //se actualiza el total en el carrito
                    actualizarCarrito(id);
                }
        });
    }

    //resta la cantidad de un producto en el carrito
    function menosCantidad(id){
        //cantidad actual en el carrito
        var cantidad = document.getElementById("cantidadFisico"+id).value;
        //obtiene los datos del libro
        var libro = getLibro(id);

        cantidad--;

        if(cantidad < 1)
            cantidad = 1;

        $.ajax({
            url: 'agregar-a-carrito/'+id+'/'+cantidad+'/fisico',
            method: "get",
            success: function (){
                //se actualiza la cantidad en el input
                document.getElementById("cantidadFisico"+id).value = cantidad;

                //se calula el subtotal del producto actual y se actualiza
                subtotal = (libro['precioFisico']-libro['precioFisico']*(libro['descuentoFisico']/100))*cantidad;
                document.getElementById(id+"fisico").innerHTML = "$"+subtotal;

                //se actualiza el total en el carrito
                actualizarCarrito(id);
            }
        });
    }

    function actualizarCarrito(){
        var totalDiv = document.getElementById("total-carrito");
        var total = 0;

        for(var id in carrito){
            var libro = getLibro(id);
            console.log(id);
            if(carrito[id]['cantidadFisico'] > 0){
                total += (libro['precioFisico']-libro['precioFisico']*(libro['descuentoFisico']/100))*document.getElementById("cantidadFisico"+id).value;
            }
            if(carrito[id]['cantidadDigital'] > 0){
                total += libro['precioDigital']-libro['precioDigital']*(libro['descuentoDigital']/100);
            }
        }

        document.getElementById("total-carrito").innerHTML = "Total : $"+total;
    }
</script>
@endsection
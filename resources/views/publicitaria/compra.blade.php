@extends('layouts.layoutPubli')

@section('header')
<title>Comprar | Editorial uno4cinco</title>

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
    <p class="txt-TitulosApartados">Compra</p>
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
                        {{-- <div class="productos-container">
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
                                                                <div role="button" tabindex="0" style="margin-left: auto" onclick="eliminarProducto({{ $libro->id }}, 'fisico')" class="eliminar">Eliminar</div>
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
                                                                    <a href="{{ route('autor', ['id' => $author->id]) }}">{{$author->nombre}}</a>
                                                                    @elseif($contador == $cantAutores)
                                                                        y <a href="{{ route('autor', ['id' => $author->id]) }}">{{$author->nombre}}</a>
                                                                    @else
                                                                        , <a href="{{ route('autor', ['id' => $author->id]) }}">{{$author->nombre}}</a>
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
                                                                                    <p>${{ number_format($libro->precioFisico, 2 , ".", "," ) }}</p>
                                                                                </div>
                                    
                                                                                <p>${{ number_format(($libro->precioFisico - $libro->precioFisico*($libro->descuentoFisico/100)), 2 , ".", "," ) }}</p>
                                                                            @else
                                                                                <p>${{ number_format($libro->precioFisico, 2 , ".", "," ) }}</p>
                                                                            @endif
                                                                        </div>
                                                                    </div>
                                                                    <div class="cell-div">
                                                                        <div class="cantidades">
                                                                            <div role="button" tabindex="0" class="qty qty-minus" onclick="menosCantidad({{ $libro->id }})">-</div>
                                                                            <input type="numeric" id="cantidadFisico{{ $libro->id }}" value="{{ $details['cantidadFisico'] }}" onfocus="this.oldvalue = this.value;" onkeypress="cantidadInput(event, {{ $libro->id }}, this)" />
                                                                            <div role="button" tabindex="0" class="qty qty-plus" onclick="masCantidad({{ $libro->id }})">+</div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="cell-div">
                                                                        <b id="{{ $libro->id }}fisico">${{ number_format(($libro->precioFisico - $libro->precioFisico*($libro->descuentoFisico/100))*$details['cantidadFisico'], 2 , ".", "," ) }}</b>
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
                                                                <div role="button" tabindex="0" style="margin-left: auto" onclick="eliminarProducto({{ $libro->id }}, 'digital')" class="eliminar">Eliminar</div>
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
                                                                    <a href="{{ route('autor', ['id' => $author->id]) }}">{{$author->nombre}}</a>
                                                                    @elseif($contador == $cantAutores)
                                                                        y <a href="{{ route('autor', ['id' => $author->id]) }}">{{$author->nombre}}</a>
                                                                    @else
                                                                        , <a href="{{ route('autor', ['id' => $author->id]) }}">{{$author->nombre}}</a>
                                                                    @endif
                                                                    @php
                                                                        $contador++;
                                                                    @endphp
                                                                @endforeach
                                                            </p>
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
                                                                                    <p>${{  number_format($libro->precioDigital, 2 , ".", "," ) }}</p>
                                                                                </div>
                                    
                                                                                <P>${{ number_format( ($libro->precioDigital - $libro->precioDigital*($libro->descuentoDigital/100)), 2 , ".", "," ) }}</P>
                                                                            @else
                                                                                <P>${{  number_format($libro->precioDigital, 2 , ".", "," ) }}</P>
                                                                            @endif
                                                                        </div>
                                                                    </div>
                                                                    <div class="cell-div">
                                                                        <div class="cantidades">
                                                                            1
                                                                        </div>
                                                                    </div>
                                                                    <div class="cell-div">
                                                                        <b>${{ number_format(($libro->precioDigital - $libro->precioDigital*($libro->descuentoDigital/100)), 2 , ".", "," ) }}</b>
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
                        </div> --}}

                        <form>
                            <label for="fname">Nombre(s):</label><br>
                            <input type="text" id="fname" name="fname"><br>
                            <label for="lname">Apellido(s):</label><br>
                            <input type="text" id="lname" name="lname"><br>
                            <label for="age">Edad:</label><br>
                            <input type="text" id="age" name="age"><br>
                            <label for="pais">País:</label><br>
                            <input type="text" id="pais" name="pais"><br>
                            <p>Género:</p>
                            <input type="radio" id="male" name="gender" value="male">
                            <label for="male">Hombre</label><br>
                            <input type="radio" id="female" name="gender" value="female">
                            <label for="female">Mujer</label><br>
                            <input type="radio" id="other" name="gender" value="other">
                            <label for="other">Otro</label><br>

                            <label for="ciudad">Ciudad:</label><br>
                            <input type="text" id="ciudad" name="ciudad"><br>

                            <label for="email">Correo electrónico:</label><br>
                            <input type="email" id="email" name="email"><br>

                            <label for="envio">Método de envío:</label><br>
                            <select id="envio" name="envio" form="envioForm"><br>
                                <option value="volvo">Volvo</option>
                                <option value="saab">Saab</option>
                                <option value="opel">Opel</option>
                                <option value="audi">Audi</option>
                            </select><br>

                            <input type="submit" value="Realizar compra">
                        </form>
                    </div>
                    <div class="carrito-cell cell-20">
                        <div class="compra-container">
                            <div style="width: 225px; margin:auto;">
                                <h1 id="total-carrito">Total : ${{ number_format($total, 2 , ".", "," ) }}</h1>
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

@endsection
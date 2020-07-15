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
            <div class="carrito-table">
                <div class="carrito-cell cell-80">
                    <div class="productos-container">
                        <div class="producto">
                            <div class="imagen">
                                <img src="{{ asset('/storage/libros/agustinC.jpg') }}">
                            </div>
                            <div class="producto-cell">
                                <div style="display:table; width:100%;">
                                    <div class="datos">
                                        <div class="titulo">
                                            <p><b>Título: </b><a href="#">Estos poemas culeros que son lo menos culero que tengo</a></p>
                                            <a href="#" style="margin-left: auto" class="eliminar">Eliminar</a>
                                        </div>
                                        <p><b>Autor: </b><a href="#">José Agustín Solórzano</a></p>
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
                                                    $1
                                                </div>
                                                <div class="cell-div">
                                                    <div class="cantidades">
                                                        <a href="#" class="qty qty-minus">-</a>
                                                          <input type="numeric" value="3" />
                                                        <a href="#" class="qty qty-plus">+</a>
                                                    </div>
                                                </div>
                                                <div class="cell-div">
                                                    <b>$3</b>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carrito-cell cell-20">
                    <div class="compra-container">
                        <div style="width: 225px; margin:auto;">
                            <h1>Total : $600</h1>
                            <p>Pueden aplicarse gastos de envío,</p>
                            <a href="#">detalles</a>
                            <button class="tienda">Volver a la tienda</button>
                            <button class="comprar">Comprar ahora</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    

</section>
@endsection
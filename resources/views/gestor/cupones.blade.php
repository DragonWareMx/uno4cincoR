@extends('layouts.menuGestor')
 
@section('importOwl')
    <link rel="stylesheet" type="text/css" href="/assets/css/gestorBlogs.css">
    <link rel="stylesheet" type="text/css" href="/assets/css/gestorAutores.css">
    <link rel="stylesheet" type="text/css" href="/assets/css/gestorCupones.css">
@endsection

@section('menu')
    <a href="{{ route('verCupones') }}" class="txt-titulosGestor">Cupones</a>
@endsection

@section('contenido') 
    <a href="{{Route('nuevoCupon')}}" class="a_agregarAutor" style="color:#29B390">Agregar cupón</a>
    <div class="div_contenedorgral">
        @foreach ($cupones as $cupon)
            <a class="a_cupones" href="#">
                <div class="div_encabezadoCupon">
                    Cupón: {{$cupon->codigo}} 
                </div>
                <div class="div_cupon">
                    @if ($cupon->limiteFecha)
                        fecha limite: {{$cupon->limiteFecha}} &nbsp;
                    @endif
                    @if ($cupon->numUsos)
                        usos Restantes: {{$cupon->numUsos}} &nbsp;
                    @endif
                    @if ($cupon->minimoCompra)
                        mínimo de compra: {{$cupon->minimoCompra}} &nbsp;
                    @endif
                    @if ($cupon->reusable == 1)
                        reusable &nbsp;
                    @else
                        no reusable
                    @endif
                    @if ($cupon->nuevos == 1)
                        solo aplica en nuevos  &nbsp;
                    @endif
                    @if ($cupon->porcentajeDesc)
                        porcentaje de descuento: {{$cupon->porcentajeDesc}} &nbsp;
                    @endif
                    @if ($cupon->valorDesc)
                        valor de descuento: {{$cupon->valorDesc}} &nbsp;
                    @endif
                    Tipo: {{$cupon->tipo}}
                </div>
            </a>
        @endforeach
        <div class="paginacion_css" style="margin-top:30px;">
            {{$cupones->links()}}
        </div>
    </div>
@endsection
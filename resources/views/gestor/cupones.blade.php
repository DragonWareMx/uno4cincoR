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
    <a href="{{Route('nuevoCupon')}}" class="a_agregarAutor" style="color:#ba1f00">Agregar cupón</a>
    <div class="div_cuponesTodos">
        @foreach ($cupones as $cupon)
        <a class="a_cupones" href="{{Route('editarCupon',['id'=>$cupon->id])}}">
                <div class="div_encabezadoCupon">
                    Cupón:  {{Str::limit($cupon->codigo,18)}}
                </div>
                <div class="div_cupon">
                    @if ($cupon->limiteFecha)
                        <div class="div_elementoCupon">Fecha limite: {{$cupon->limiteFecha}}</div>
                    @endif
                    @if ($cupon->numUsos)
                        <div class="div_elementoCupon">Usos Restantes: {{$cupon->numUsos}}</div>
                    @endif
                    @if ($cupon->minimoCompra)
                        <div class="div_elementoCupon">Mínimo de compra: {{$cupon->minimoCompra}}</div>
                    @endif
                    @if ($cupon->reusable == 1)
                        <div class="div_elementoCupon">Reusable</div>
                    @else
                        <div class="div_elementoCupon">No reusable</div>
                    @endif
                    @if ($cupon->nuevos == 1)
                        <div class="div_elementoCupon">Solo aplica en nuevos </div>
                    @endif
                    @if ($cupon->porcentajeDesc)
                        <div class="div_elementoCupon">Porcentaje de descuento: {{$cupon->porcentajeDesc}} </div>
                    @endif
                    @if ($cupon->valorDesc)
                        <div class="div_elementoCupon">Valor de descuento: {{$cupon->valorDesc}}</div>
                    @endif
                    <div class="div_elementoCupon">Tipo: {{$cupon->tipo}}</div>
                </div>
            </a>
        @endforeach
    </div>
    <div class="paginacion_css" style="margin-top:30px;">
        {{$cupones->links()}}
    </div>
    <br>
    <br>
@endsection
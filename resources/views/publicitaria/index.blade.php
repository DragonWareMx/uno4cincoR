@extends('layouts.layoutTienda')
@section('bannerinicio')
    <div class="" style="background-color: #83D7B5; width:100%;"> 
    <div class="container">
        <div class="hero__wrapper">
                <div class="row" style="">
                    <div class="col-lg-10 col-xs-offset-0 col-sm-offset-0 col-md-offset-0 col-lg-offset-1 "  >
                        <div class="hero__title_inner" ><img src="{{ asset('img/logos/logo.png') }}" alt="" srcset="">
                            <br>
                            <br>
                            <h4 id="viledruid" class="hero__text" style="color: #1D2120; font-family:Karla;">para todas, arte.</h4>
                            <br>
                            <div class="mesita_escondida" style=""> <img src="{{ asset('img/logos/escritorio.png') }}" style="width:100%"></div> 
                            
                            <a href="#ven" class="btn-leerMasIndex scroll-link" data-id="book-table">Leer más<img src="{{ asset('img/ico/puerta.png') }}"  ></a>
                                  
                        </div>
                          
                    </div>
                </div>
        </div>
    </div>
    <div class="mesita" style=""> <img src="{{ asset('img/logos/escritorio.png') }}" style="width:100%"></div> 
    </div>
@endsection
@section('seccionTienda')
    Catálogo
@endsection

@section('encabezadoTienda')
    Nuestros libros
@endsection

@section('contenidoTienda')
    <span id="ven"></span>
    @include('subview.tiendaLibro')
    
@if(session('status'))
<script>
    $( document ).ready(function() {
        bootbox.dialog({ 
            message: '<div class="text-center" style="padding:10px><i class="fas fa-check"></i>&nbsp {{session('status')}} </div>', 
            closeButton: true 
        })
    });
</script>
@endif
@endsection    

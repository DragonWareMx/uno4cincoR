@extends('layouts.layoutPubli')

@section('header')
<title>Error | ElBooke</title>

<link rel="stylesheet" type="text/css" href="/assets/css/style_SobreNosotros.css">

<link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Karla&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<link href="{{asset('temaGestor/css/app.css')}}" rel="stylesheet">
<link href='https://fonts.googleapis.com/css?family=Varela' rel='stylesheet' type='text/css'>

<style>
 .error-h1{
   font-family: Karla;
   font-size: 35px;
   color: black;
 }

 @media(max-width: 800px){
    .logo-error{
      width: 320px !important;
      height: 96.48px !important;
    }
 }
</style>
@endsection

@section('content')

<section class="section" id="about" style="width:100%; height:100%; background-color:#F2ECD5">
    {{-- TITTLE --}}
    
    {{-- BANNER IMAGE --}}

    <div class="text-center" style="margin: " >
      <img class="logo-error" src="{{asset('img/logos/coloresuno4cinco.png')}}" alt="" style="width: 400px;height:120.6px;margin-top:50px;margin-bottom:50px">
      <h1 class="error-h1">ERROR</h1>
      
      <p class="lead text-gray-800 mb-5">{{$messagi}}</p>
    <a href="{{ route('inicio') }}">&larr; Volver a Inicio</a>
    </div>

    
</section>
@endsection
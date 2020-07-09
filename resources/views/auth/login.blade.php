@extends('layouts.app')

@section('head')
<title>Iniciar Sesión | Editorial uno4cinco</title>
@endsection

@section('content')
<div class="container-fluid">
    <div class="row no-gutter">
      <div class="d-none d-md-flex col-md-4 col-lg-6 bg-image">
        <div class="div-grandote" >
          <img src="{{ asset('img/logos/coloresuno4cinco.png') }}" class="logo-login">
          <div class="linea-login"></div>
          <p class="parrafo-login">
            Lorem ipsum dolor sit amet consectetur adipiscing elit massa dictum
          </p>
          <img src="{{ asset('img/quienessomos/6007.png') }}" class="libro-login">
        </div>
      </div>
      <div class="col-md-8 col-lg-6 cont-der" >
        <div class="login d-flex align-items-center py-5">
          <div class="container">
            <div class="row">
              <div class="col-md-9 col-lg-10 mx-auto">
                <h3 class="login-heading mb-4">Iniciar sesión</h3>
                <form method="POST" action="{{ route('login') }}">
                @csrf
                  <div class="form-label-group">
                    <input type="email" id="inputEmail" class="form-control" placeholder="Email address" name="email" value="{{ old('email') }}" required autofocus>
                    <label for="inputEmail">Correo Electrónico</label>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>
  
                  <div class="form-label-group">
                    <input type="password" id="inputPassword" class="form-control" placeholder="Password" name="password" required autocomplete="current-password">
                    <label for="inputPassword">Contraseña</label>
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
  
                  <div style="width: 100%;display:flex;justify-content:center;">
                    <button class="button-login" type="submit">Ingresar</button>
                  </div>
                  <div class="text-center">
                    <a class="small link-login"  href="{{ route('password.request') }}">Olvidé mi contraseña</a>
                  </div>
                </form>
              </div>
            </div>
          </div>
          <p class="footer-login">© 2020 Editorial uno4cinco</p>
        </div>
      </div>
    </div>
  </div>
@endsection

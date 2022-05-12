@extends('layouts.app')

@section('head')
<title>Restablecer Contraseña | ElBooke</title>
@endsection

@section('content')
<div class="container-fluid">
    <div class="row no-gutter">
      <div class="izq-login d-none d-md-flex col-md-4 col-lg-6 bg-image">
        <div class="div-grandote" >
          <img src="{{ asset('img/logos/ElBooke.png') }}" class="logo-login">
          <div class="linea-login"></div>
          <p class="parrafo-login">
            Para todas, arte.
          </p>
          <img src="{{ asset('img/quienessomos/6007.png') }}" class="libro-login">
        </div>
      </div>
      <div class="col-md-8 col-lg-6 cont-der" >
        <div class="login d-flex align-items-center py-5">
          <div class="container-logo" style="display:none">
              <img src="{{ asset('img/logos/blancouno4cinco.png') }}">
          </div>
          <div class="container">
            <div class="row">
              <div class="col-md-9 col-lg-10 mx-auto">
                <h3 class="login-heading mb-4" style="font-size: 20px">Restablecer contraseña</h3>
                <form method="POST" action="{{ route('password.update') }}">
                @csrf
                <input type="hidden" name="token" value="{{ $token }}">
                  <div class="centered" style="height:70px">
                    <div class="group">
                      <input id="email" type="email" class="@error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" />
                      <label for="email">Correo Electrónico</label>
                      <div class="bar"></div>
                    </div>
                  </div>

                <div class="centered" style="height:70px">
                  <div class="group">
                    <input type="password" id="password" class="@error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                    <label for="password">Contraseña</label>
                    <div class="bar"></div>
                  </div>
                </div>

                <div class="centered" style="height:70px">
                    <div class="group">
                      <input type="password" id="password-confirm" class="@error('password') is-invalid @enderror" name="password_confirmation" required autocomplete="new-password">
                      <label for="password-confirm">Confirmar contraseña</label>
                      <div class="bar"></div>
                    </div>
                </div>
                @error('email')
                  <div class="error-login" role="alert">
                    {{ $message }}
                  </div>
                    @enderror
                @error('password')
                <div class="error-login" role="alert">
                    {{ $message }}
                </div>
                @enderror
  
                  <div style="width: 100%;display:flex;justify-content:center;">
                    <button class="button-login" type="submit">Aceptar</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
          <p class="footer-login">© 2022 Editorial ElBooke</p>
        </div>
      </div>
    </div>
  </div>
@endsection

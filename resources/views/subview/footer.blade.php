<!-- Footer -->
<footer class="footer-distributed" style="background-color: #FAFAFA">
 
    <div class="footer-left">
      <a href="{{ route('inicio') }}"> <img class="logo145" src="{{ asset('img/logos/logo.png') }}"> </a>
      <p class="footer-company-name" style="margin-top: 15px">© 2020 Editorial uno4cinco</p>

      <a href="https://www.facebook.com/DragonWare-110557344026414" target="blank">
        <p class="footer-company-name dragonware-name">Desarrollado por DragonWare <img class="logodragon" src="{{ asset('img/logos/dragonware.png') }}"></p>
      </a>
    </div>

    <div class="footer-center">
      <div>
        <p class="footer-titulos">
            NAVEGACIÓN
        </p>    
      </div>
      <div>
        {{-- <p class="footernav">
            <a href="">¿QUIÉNES SOMOS?</a><br>
            <a href="">TIENDA</a><br>
            <a href="">AUTORES</a><br>
            <a href="">BLOG</a><br>
            <a href="">CONTACTO</a><br>
        </p> --}}
        <ul>
          <li>
            <a href="{{ route('inicio') }}">INICIO</a><br>
          </li>
          <li>
              <a href="{{ route('sobreNosotros') }}">¿QUIÉNES SOMOS?</a><br>
          </li>
          <li>
              <a href="{{ route('tiendaCatalogo') }}">TIENDA</a><br>
          </li>
          <li>
              <a href="{{ route('autoresUno4cinco') }}">AUTORES</a> <br>
          </li>
          <li>
            <a href="{{ route('blogs',0) }}">BLOG</a> <br>
        </li>
        <li>
          <a href="{{ route('contacto') }}">CONTACTO</a> <br>
      </li>
      <li>
        <a href="{{route('avisoPrivacidad')}}" >Política de privacidad y uso de cookies.</a>
        </li>
      </ul>
      </div>
    </div>

    <div class="footer-centro">
        <div>
            <p class="footer-titulos" style="margin-left: 25px">
                CONTÁCTANOS
            </p>    
          </div>
          <div>
            {{-- <p class="footernav">
                <a href=""><img class="logodragon" src="{{ asset('img/ico/phone.png') }}">&nbsp;+524432209371</a><br>
                <a href=""><img class="logodragon" src="{{ asset('img/ico/gps.png') }}">&nbsp;Morelia, Col. Centro, #13, CP. 58170</a><br>
                <a href=""><img class="logodragon" src="{{ asset('img/ico/email.png') }}">&nbsp; correo@gmail.com</a><br>
            </p> --}}
            <ul>
                <li>
                    <a href="tel:7221834383"><img class="logodragon" src="{{ asset('img/ico/phone.png') }}">&nbsp;7221834383</a><br>
                </li>
                <li>
                    <a href="https://www.google.com/maps/place/Toluca+de+Lerdo,+M%C3%A9x./@19.294109,-99.6662331,13z/data=!3m1!4b1!4m5!3m4!1s0x85cd89892a50ebb9:0xad3f4ad5550208c4!8m2!3d19.2826098!4d-99.6556653" target="_blank"><img class="logodragon" src="{{ asset('img/ico/gps.png') }}">&nbsp;Toluca, México</a><br>
                </li>
                <li>
                    <a href="mailto: contacto@uno4cinco.com"><img class="logodragon" src="{{ asset('img/ico/email.png') }}">&nbsp;  contacto@uno4cinco.com</a> <br>
                </li>
                
            </ul>
          </div>
    </div>

    <div class="footer-right">
      <div>
        <p class="footer-titulos">
            SOBRE NOSOTROS
        </p>
      </div>
      <div>
        <p class="footernav">
          Servimos como medio para la edición y divulgación de obras artísticas literarias de valor humano.
        </p>
      </div>  

        <div class="footer-icons">
            <a href="https://www.youtube.com/channel/UCuYHXFV2FXf76TyP3aKSEqQ" target="blank"><img src="{{ asset('img/ico/ytb.png')}}" width="22px"></a>
            <a href="https://www.facebook.com/uno4cinco" target="blank"><img src="{{ asset('img/ico/fb.png') }}" width="22px"></a>
            <a href="https://www.instagram.com/uno4cinco" target="blank"><img src="{{ asset('img/ico/ig.png') }}" width="22px"></a>
        </div>
    </div>
  </footer>
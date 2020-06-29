<!-- Footer -->
<footer class="footer-distributed" style="background-color: #FAFAFA">
 
    <div class="footer-left">
        <img class="logo145" src="{{ asset('img/logos/logo.png') }}">
      <p class="footer-company-name" style="margin-top: 5px">© 2020 Editorial uno4cinco</p>

      <a href="http://" target="blank">
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
              <a href="">TIENDA</a><br>
          </li>
          <li>
              <a href="">AUTORES</a> <br>
          </li>
          <li>
            <a href="">BLOG</a> <br>
        </li>
        <li>
          <a href="{{ route('contacto') }}">CONTACTO</a> <br>
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
                    <a href=""><img class="logodragon" src="{{ asset('img/ico/phone.png') }}">&nbsp;+524432209371</a><br>
                </li>
                <li>
                    <a href=""><img class="logodragon" src="{{ asset('img/ico/gps.png') }}">&nbsp;Toluca, México</a><br>
                </li>
                <li>
                    <a href=""><img class="logodragon" src="{{ asset('img/ico/email.png') }}">&nbsp; correo@gmail.com</a> <br>
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
            <a href="" target="blank"><img src="{{ asset('img/ico/twt.png')}}" width="22px"></a>
            <a href="" target="blank"><img src="{{ asset('img/ico/fb.png') }}" width="22px"></a>
            <a href="" target="blank"><img src="{{ asset('img/ico/ig.png') }}" width="22px"></a>
        </div>
    </div>
  </footer>
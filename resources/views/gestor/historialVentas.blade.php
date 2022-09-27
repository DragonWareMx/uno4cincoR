@extends('layouts.menuGestor')

@section('importOwl')
    <link rel="stylesheet" type="text/css" href="/assets/css/gestorVentas.css">
    <link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Karla&display=swap" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.js"></script>
@endsection

@section('menu')
    Historial de ventas
@endsection

@section('contenido')
<div class="div_GeneralHV">
    <div class="div_informacionHV">
        <div class="div_graficahistorial">
          <p class="txt-titulosHV" style="text-align: center;">Resumen de ventas</p>
            <div class="grafica-resumenHV">
                <canvas id="line-chart"></canvas>
            </div>
        </div>

        <div class="div_detallesVentas">
          <p class="txt-titulosHV" style="text-align: center; margin-top:10px" id="id"></p> <p>
          <div class="div_registroVentas">
            <p class="txt-titulosHV">Estatus:&nbsp;</p>
            <select id="estatusSelect" class="txt-informacionHV select_estatusVentas">
              <option value="fisico">pendiente</option> 
              <option value="fisico/digital">terminado</option>
              <option value="digital">completado</option>
              <option value="" selected="selected" id="estatus" ></option>
            </select>
          </div>
          <div class="div_registroVentas">
            <p class="txt-titulosHV">Fecha:&nbsp;</p>
            <p class="txt-informacionHV" id="fecha"></p>
          </div>
          <div class="div_registroVentas">
            <p class="txt-titulosHV">Subtotal:&nbsp;</p>
            <p class="txt-informacionHV" id="total"></p>
          </div>
          <div class="div_registroVentas">
            <p class="txt-titulosHV">Descripción:&nbsp;</p>
            <p class="txt-informacionHV" id="desc"></p>
          </div>
          <div class="div_registroVentas">
            <p class="txt-titulosHV">Tipo de pago:&nbsp;</p>
            <p class="txt-informacionHV" id="tipo"></p>
          </div>
          <div class="div_registroVentas">
            <p class="txt-titulosHV">Tipo de envío:&nbsp;</p>
            <p class="txt-informacionHV" id="tipoEnvio"></p>
          </div>
          <div class="div_registroVentas">
            <p class="txt-titulosHV">Total envío:&nbsp;</p>
            <p class="txt-informacionHV" id="totalEnvio"></p>
          </div>
          <div class="div_registroVentas">
            <p class="txt-titulosHV">Código promoción:&nbsp;</p>
            <p class="txt-informacionHV" id="codigoPromocion"></p>
          </div>
          <div class="div_registroVentas">
            <p class="txt-titulosHV">Total código:&nbsp;</p>
            <p class="txt-informacionHV" id="totalCodigo"></p>
          </div>
          <div class="div_registroVentas">
            <p class="txt-titulosHV">Detalles del comprador:&nbsp;</p>
            <p class="txt-informacionHV" id="detalles"></p>
          </div>
          <div class="div_registroVentas">
            <p class="txt-titulosHV">Dedicatoria:&nbsp;</p>
            <p class="txt-informacionHV" id="dedicatoria"></p>
          </div>
          <div class="div_registroVentas">
            <p class="txt-titulosHV">Total de la compra:&nbsp;</p>
            <p class="txt-informacionHV" id="totalCompra"></p>
          </div>
          <div id="actualizar" class ="div_registroVentas"></div >
        </div>
    </div>
    
    <div class="table-responsive div_tablaHV" style="height: auto; overflow-y:scroll; ">
      <table class="table table-bordered table-hover tbody tr:hover" id="dataTable" width="100%" cellspacing="0">
          <thead>
              <tr>
              <th>ID</th>
              <th>Estatus</th> 
              <th>Fecha</th> 
              <th>Subtotal</th> 
              <th>Descripción</th> 
              <th>Tipo de pago</th> 
              <th>Tipo de envío</th>
              <th>Total envío</th>
              <th>Código promoción</th>
              <th>Total Código</th> 
              <th>Detalles del comprador</th>
              <th>Total Compra</th> 
              <th>Dedicatoria</th>
              </tr>
          </thead>
          <tbody>
                  @foreach($ventas as $venta)
                  {{-- Sacando total de la venta --}}
                  @php
                    $total=0;
                  @endphp
                    @foreach ($book_sell as $item)   
                      @php
                          if($item->sell_id == $venta->id){
                            $total+=$item->precio;
                          }
                      @endphp
                    @endforeach
                  <tr>
                  <td id="idPedido" class="sorting_desc">{{$venta->id}}</td>
                    <td >{{$venta->status}}</td> 
                    <td >{{$venta->fecha}}</td>
                    <td >
                     ${{$total}}
                    </td>
                    <td>
                      @foreach ($book_sell as $item)   
                      @if($item->sell_id == $venta->id)
                          <b>*Titulo:</b> 
                          @foreach($books as $bookU)
                            @if($item->book_id == $bookU->id)
                            {{$bookU->titulo}},
                            @endif
                          @endforeach
                          <b>cantidad:</b> {{$item->cantidad}},
                          @php
                              $precioUni=$item->precio / $item->cantidad;
                          @endphp
                          <b>precio c/u:</b> ${{$precioUni}},
                          @if($item->digital == 1)
                          <b>versión:</b> digital.
                          @else
                          <b>versión:</b> físico.
                          @endif
                          <br>
                      @endif
                      @endforeach
                    </td> 
                    <td >
                      @php
                          $forma="Transferencia";
                          if($venta->formaPago == 1){
                            $forma="Paypal";
                          }
                          else if($venta->formaPago == 3){
                            $forma="Stripe";
                          }
                      @endphp
                      {{$forma}}</td> 
                    <td >
                      @if ($venta->nombre_envio==null && $venta->precio_envio==null)
                          No aplica
                      @else
                      {{$venta->nombre_envio}}&nbsp;
                      @endif
                    </td>
                    <td>
                      @if ($venta->precio_envio==null)
                        No aplica
                      @else
                      ${{$venta->precio_envio}}
                      @php
                          $total=$total+$venta->precio_envio;
                      @endphp
                      @endif  
                    </td>
                    <td>
                      @foreach ($cupones as $cupon)
                          @if ($cupon->id == $venta->promotion_id)
                              {{$cupon->codigo}}
                          @endif
                      @endforeach
                      @if ($venta->promotion_id==null)
                          No aplica
                      @endif
                    </td>
                    <td>
                      @if ($venta->discount==null)
                          No aplica
                      @elseif($venta->discount=='descargas')
                        Descargas ilimitadas
                      @else
                        ${{$venta->discount}}
                        @php
                            $total=$total+$venta->precio_envio;
                        @endphp
                      @endif
                    </td> 
                    <td >{{$venta->nombreCliente}},&nbsp;{{$venta->edad}}&nbsp;años,&nbsp;{{$venta->genero}}.
                      <br>
                      {{$venta->pais}},&nbsp;{{$venta->estado}},&nbsp;{{$venta->ciudad}},&nbsp;{{$venta->direccion}}.
                      <br>
                      {{$venta->correo}},&nbsp;{{$venta->telefono}}
                    </td> 
                    <td>
                      ${{$total}}
                    </td>
                    <td>{{$venta->dedicatoria}}</td>
                  </tr>   
                  @endforeach                
          </tbody>
      </table>
    </div>

    {{-- PEDIDO --}}
    <script>
      var idCard;
      $(document).ready(function() {
          var table= $('#dataTable').DataTable();   
  
          setTimeout(function(){
                  document.getElementById('idPedido').click();
              },10);
     
      $('#dataTable tbody').on('click', 'tr', function () {
          var data = table.row( this ).data();
          console.log(data);
          var selector = document.getElementById("estatusSelect");
          idCard=data[0];
          $("#id").html("ID de venta: "+data[0]);
          $("#estatus").html(data[1]);
          $("#fecha").html(data[2]);
          $("#total").html(data[3]);
          $("#desc").html(data[4]);
          $("#tipo").html(data[5]);
          $("#tipoEnvio").html(data[6]);
          $("#totalEnvio").html(data[7]);
          $("#codigoPromocion").html(data[8]);
          $("#totalCodigo").html(data[9]);
          $("#detalles").html(data[10] );
          $("#totalCompra").html(data[11]);
          $("#dedicatoria").html(data[12]);

      $(".container-fluid_datosl").show();  
      $('html, body').animate({ scrollTop: 80 }, 500);
      });

  } );
  </script>
  <script>
    $('#estatusSelect').on('change', function () {
      var selector = document.getElementById("estatusSelect");
      var container = document.getElementById('actualizar');
      container.innerHTML = "<br><br><a class='txt-titulosHV txt-updateVenta' href='/adminuno4cinco/historial/"+idCard+"?estatus="+selector.options[selector.selectedIndex].text+"'>Actualizar</a>";
      });


    </script>

  @php  //inicializar arreglo del año 
        $sumaVentasAn=[
            '01'=>0,
            '02'=>0,
            '03'=>0,
            '04'=>0,
            '05'=>0,
            '06'=>0,
            '07'=>0,
            '08'=>0,
            '09'=>0,
            '10'=>0,
            '11'=>0,
            '12'=>0
        ];
  @endphp

  @foreach ($ventas as $venta) 
  {{-- sacar el mes del registro --}}
    @php
    $mes = date('m', strtotime($venta->fecha));
    $year = date('Y', strtotime($venta->fecha));
    // {{-- hacer suma total de ventas por mes --}}
    if($year == date("Y"))
    $sumaVentasAn[$mes]++;;
    @endphp
  @endforeach

    {{-- GRAFICA --}}
    <script>  
    var sumaVentasAn=<?php echo json_encode($sumaVentasAn); ?>;
      new Chart(document.getElementById("line-chart"), {
        type: 'line',
        data: {
            labels: ['Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'],
            datasets: [{ 
                data: [sumaVentasAn['01'],sumaVentasAn['02'],sumaVentasAn['03'],sumaVentasAn['04'],sumaVentasAn['05'],sumaVentasAn['06'],
                                            sumaVentasAn['07'],sumaVentasAn['08'],sumaVentasAn['09'],sumaVentasAn['10'],sumaVentasAn['11'],sumaVentasAn['12']
                                    ],
                label: "Ventas",
                borderColor: "#1cc88a",
                fill: false
            }
            ]
        },
        options: {
            title: {
            display: true,
            text: 'Año en curso'
            },
            maintainAspectRatio:false,
            responsive:true
        }
      });
    </script>
</div>
<br>
<br>
@endsection
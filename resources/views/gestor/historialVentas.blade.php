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
          <p class="txt-titulosHV" style="text-align: center; margin-top:10px" id="id">ID de venta:&nbsp;540</p> <p>
          <div class="div_registroVentas">
            <p class="txt-titulosHV">Estatus:&nbsp;</p>
            <select class="txt-informacionHV select_estatusVentas">
              <option value="fisico">En espera de pago</option> 
              <option value="fisico/digital">Envío pendiente</option>
              <option value="digital">Envío en camino</option>
              <option value="digital">Completado</option>
              <option value="" selected="selected" id="estatus" hidden></option>
            </select>
          </div>
          <div class="div_registroVentas">
            <p class="txt-titulosHV">Fecha:&nbsp;</p>
            <p class="txt-informacionHV" id="fecha"></p>
          </div>
          <div class="div_registroVentas">
            <p class="txt-titulosHV">Total:&nbsp;</p>
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
            <p class="txt-titulosHV">Detalles del comprador:&nbsp;</p>
            <p class="txt-informacionHV" id="detalles"></p>
          </div>
          
            <a class="txt-titulosHV txt-updateVenta" href="" >Actualizar</a>
          <br>
        </div>
    </div>
    
    <div class="table-responsive div_tablaHV" style="height: auto; overflow-y:scroll; ">
      <table class="table table-bordered table-hover tbody tr:hover" id="dataTable" width="100%" cellspacing="0">
          <thead>
              <tr>
              <th>ID</th>
              <th>Estatus</th> 
              <th>Fecha</th> 
              <th>Total</th> 
              <th>Descripción</th> 
              <th>Tipo de pago</th> 
              <th>Detalles del comprador</th> 
              </tr>
          </thead>
          <tbody>
                  @foreach($ventas as $venta)
                  {{-- Sacando total de la venta --}}
                    @foreach ($book_sell as $item)   
                      @php
                          $total=0;
                          if($item->sell_id == $venta->id){
                            $total+=$item->precio;
                          }
                      @endphp
                        
                            
                    @endforeach
                  <tr>
                  <td id="idPedido">{{$venta->id}}</td>
                    <td >{{$venta->status}}</td> 
                    <td >{{$venta->fecha}}</td>
                    <td >
                     {{$total}}
                    </td>
                    <td >Lorem ipsum, dolor sit amet consectetur adipisicing elit. Assumenda earum fuga iste necessitatibus. Praesentium delectus, quasi iste excepturi accusantium nihil vitae sit perspiciatis, esse odit, pariatur nobis vero qui quis?</td> 
                    <td >{{$venta->formaPago}}</td> 
                    <td >{{$venta->nombreCliente}},&nbsp;{{$venta->edad}}&nbsp;años,&nbsp;{{$venta->genero}}.
                      <br>
                      {{$venta->pais}},&nbsp;{{$venta->estado}},&nbsp;{{$venta->ciudad}},&nbsp;{{$venta->direccion}}.
                      <br>
                      {{$venta->correo}},&nbsp;{{$venta->telefono}}
                    </td> 
                  </tr>   
                  @endforeach                
          </tbody>
      </table>
    </div>

    {{-- PEDIDO --}}
    <script>
      $(document).ready(function() {
          var table= $('#dataTable').DataTable();   
  
          setTimeout(function(){
                  document.getElementById('idPedido').click();
              },10);
     
      $('#dataTable tbody').on('click', 'tr', function () {
          var data = table.row( this ).data();
          $("#id").html("ID de venta: "+data[0]);
          $("#estatus").html(data[1]);
          $("#fecha").html(data[2]);
          $("#total").html(data[3]);
          $("#desc").html(data[4]);
          $("#tipo").html(data[5]);
          $("#detalles").html(data[6]);

          // $(".city").html("Ciudad: "+data[5]);
          // $(".phone").html("Teléfono: "+data[3]);
          // $(".mail").html("Correo: "+data[4]);
          // $(".status").html("Precio: "+data[6]);
          // $(".date").html("Fecha: "+data[2] +"<a href='/sgtepetate/revisarpedido/"+data[0]+"'>"+
          //                                     "<input type='button' value='&#x2713; &nbsp;&nbsp;&nbsp;Revisar&nbsp;' class='btn-pedidoRevisado' style='background-color:#207558; border:none; color:white; float:right; width:130px; height:35px; border-radius:4%'';></a>");
  
      $(".container-fluid_datosl").show();  
      $('html, body').animate({ scrollTop: 80 }, 500);
      });
  } );
  </script>



    {{-- GRAFICA --}}
    <script>  
      new Chart(document.getElementById("line-chart"), {
        type: 'line',
        data: {
            labels: ['Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'],
            datasets: [{ 
                data: [0,0,5,0,
                0,0,0,0,
                0,0,0,0
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
            text: 'Julio, 2020'
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
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
          <p class="txt-titulosHV" style="text-align: center;">ID de venta:&nbsp;540</p> <p>
          <div class="div_registroVentas">
            <p class="txt-titulosHV">Estatus:&nbsp;</p>
            <p class="txt-informacionHV">Envío en camino</p>
          </div>
          <div class="div_registroVentas">
            <p class="txt-titulosHV">Fecha:&nbsp;</p>
            <p class="txt-informacionHV">Envío en camino</p>
          </div>
          <div class="div_registroVentas">
            <p class="txt-titulosHV">Total:&nbsp;</p>
            <p class="txt-informacionHV">Envío en camino</p>
          </div>
          <div class="div_registroVentas">
            <p class="txt-titulosHV">Descripción:&nbsp;</p>
            <p class="txt-informacionHV">Envío en camino</p>
          </div>
          <div class="div_registroVentas">
            <p class="txt-titulosHV">Tipo de pago:&nbsp;</p>
            <p class="txt-informacionHV">Envío en camino</p>
          </div>
          <div class="div_registroVentas">
            <p class="txt-titulosHV">Detalles del comprador:&nbsp;</p>
            <p class="txt-informacionHV">Envío en camino</p>
          </div>
          <div class="div_registroVentas">
            <a class="txt-titulosHV" href="" style="float: right">Actualizar</a>
          </div>
        </div>
    </div>

    <div class="table-responsive div_tablaHV" style="height: 380px; overflow-y:scroll; ">
      <table class="table table-bordered table-hover tbody tr:hover" id="dataTable" width="100%" cellspacing="0">
          <thead>
              <tr>
              <th style="background-color: #8b8b8b; color:white">ID</th>
              <th style="background-color: #8b8b8b; color:white">Total de muertes</th> 
              </tr>
          </thead>
          <tbody>
                  <tr>
                  <td>cvcv</td>
                  <td>fvccv</td>
                  </tr>    
              
          </tbody>
      </table>
    </div>


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
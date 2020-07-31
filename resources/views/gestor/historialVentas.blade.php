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
          <p class="txt-titulosHV">Estatus:&nbsp;</p>
            <p class="txt-informacionHV">Envío en camino</p>
          <p class="txt-titulosHV">Fecha:&nbsp;</p>
          <p class="txt-titulosHV">Total:&nbsp;</p>
          <p class="txt-titulosHV">Descripción:&nbsp;</p>
          <p class="txt-titulosHV">Tipo de pago:&nbsp;</p>
          <p class="txt-titulosHV">Detalles del comprador:&nbsp;</p>
          
        </div>
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





    <div class="div_tablaHV">
        <div class="table-responsive-xl">
            <table class="table">
                <thead>
                    <tr>
                      <th scope="col">ID</th>
                      <th scope="col">Estatus</th>
                      <th scope="col">Fecha</th>
                      <th scope="col">Heading</th>
                      <th scope="col">Heading</th>
                      <th scope="col">Heading</th>
                      <th scope="col">Heading</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <th scope="row">1</th>
                      <td>Cell</td>
                      <td>Cell</td>
                      <td>Cell</td>
                      <td>Cell</td>
                      <td>Cell</td>
                      <td>Cell</td>
                    </tr>
                    <tr>
                      <th scope="row">2</th>
                      <td>Cell</td>
                      <td>Cell</td>
                      <td>Cell</td>
                      <td>Cell</td>
                      <td>Cell</td>
                      <td>Cell</td>
                    </tr>
                    <tr>
                      <th scope="row">3</th>
                      <td>Cell</td>
                      <td>Cell</td>
                      <td>Cell</td>
                      <td>Cell</td>
                      <td>Cell</td>
                      <td>Cell</td>
                    </tr>
                  </tbody>
            </table>
          </div>
    </div>
</div>
<br>
<br>
@endsection
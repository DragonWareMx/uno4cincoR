@extends('layouts.menuGestor')

@section('importOwl')
<link rel="stylesheet" type="text/css" href="/assets/css/gestorVentas.css">
    <link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Karla&display=swap" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.js"></script>
@endsection

@section('menu')
    Estadísticas de público
@endsection

@section('contenido')

<div class="div_GeneralHV">
    <div class="div_informacionHV2">
        <div class="div_graficahistorial2 spacegraphVentas">
          <p class="txt-titulosHV" style="text-align: center;">Datos generales</p>
            <div class="grafica-resumenHV">
                <canvas id="line-chart"></canvas>
            </div>
        </div>

        <div class="div_graficahistorial2 spacegraphVentas">
            <p class="txt-titulosHV" style="text-align: center;">Edad</p>
              <div class="grafica-resumenHV">
                  <canvas id="line-chart2"></canvas>
              </div>
        </div>

        <div class="div_graficahistorial2 spacegraphVentas">
            <p class="txt-titulosHV" style="text-align: center;">Sexo</p>
              <div class="grafica-resumenHV">
                  <canvas id="line-chart3"></canvas>
              </div>
        </div>


    </div>
</div>
<br>
<br>

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

    new Chart(document.getElementById("line-chart2"), {
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

    new Chart(document.getElementById("line-chart3"), {
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



@endsection
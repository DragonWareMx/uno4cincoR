@extends('layouts.menuGestor')

@section('importOwl')
    <link rel="stylesheet" type="text/css" href="/assets/css/gestorBlogs.css">
    <link rel="stylesheet" type="text/css" href="/assets/css/gestorResumen.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.js"></script>
@endsection

@section('contenido')
    <div class="all_blogs_contenido">
        {{-- Cuadros para las graficas --}}
        <div class="cuadro-resumen">
            <p class="titulo-resumen">Resumen de ventas</p>
            <div class="grafica-resumen">
                <canvas id="line-chart"></canvas>
            </div>
        </div>

        <div class="cuadro-resumen">
            <p class="titulo-resumen">Total de libros</p>
            <div class="grafica-resumen2">
                <div class="graficadona-resumen">
                    <canvas id="doughnut-chart"></canvas>
                </div>
            </div>
        </div>

        <div class="cuadro-resumen">
            <p class="titulo-resumen">Total de autores</p>
            <div class="grafica-resumen2">
                <div class="graficadona-resumen">
                    <canvas id="doughnut-chart2"></canvas>
                </div>
            </div>
        </div>

        <div class="cuadro-resumen">
            <p class="titulo-resumen">Total de entradas(Blog)</p>
            <div class="grafica-resumen">
                <div class="graficadona-resumen">
                    <canvas id="doughnut-chart3"></canvas>
                </div>
            </div>
        </div>

        <div class="cuadro-resumen">
            <p class="titulo-resumen">Últimos</p>
            <div class="ultimos-resumen">
                <table class="tabla-resumen">
                    <tr>
                        <td class="left-tabla-resumen">Lorem ipsum dolor sit amet consectetur adipiscing</td>
                        <td><div class="center-tabla-resumen" style="background-color: #FFEC40;">50</div></td>
                        <td class="right-tabla-resumen">¡En oferta!</td>
                    </tr>
                    <tr>
                        <td class="left-tabla-resumen">Lorem ipsum dolor sit amet consectetur</td>
                        <td><div class="center-tabla-resumen" style="background-color: #1CC98A;">50</div></td>
                        <td class="right-tabla-resumen"></td>
                    </tr>
                    <tr>
                        <td class="left-tabla-resumen">Lorem ipsum dolor sit amet consectetur adipiscing</td>
                        <td><div class="center-tabla-resumen" style="background-color: #FF4040;">50</div></td>
                        <td class="right-tabla-resumen"></td>
                    </tr>
                    <tr>
                        <td class="left-tabla-resumen">Lorem ipsum dolor sit amet</td>
                        <td><div class="center-tabla-resumen" style="background-color: #5F72A4;">50</div></td>
                        <td class="right-tabla-resumen"></td>
                    </tr>
                    <tr>
                        <td class="left-tabla-resumen">Lorem ipsum dolor</td>
                        <td><div class="center-tabla-resumen" style="background-color: #40DDFF;">50</div></td>
                        <td class="right-tabla-resumen"></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>

    <script>
        new Chart(document.getElementById("line-chart"), {
        type: 'line',
        data: {
            labels: ['Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'],
            datasets: [{ 
                data: [12,11,10,9,8,7,6,5,4,3,2,1
                ],
                label: "Ingresos",
                borderColor: "#1cc88a",
                fill: false
            }, { 
                data: [1,2,3,4,5,6,7,8,9,10,11,12
                ],
                label: "Egresos",
                borderColor: "#e74a3b",
                fill: false
            }
            ]
        },
        options: {
            title: {
            display: true,
            text: 'Ingresos de ' + 2020
            },
            maintainAspectRatio:false,
            responsive:true
        }
        });
        new Chart(document.getElementById("doughnut-chart"), {
        type: 'doughnut',
        data: {
        labels: ["Ingresos", "Egresos"],
        datasets: [
            {
            label: "$",
            backgroundColor: ["#1cc88a", "#e74a3b"],
            data: [25,35]
            }
        ]
        },
        options: {
        title: {
            display: false,
            text: 'Ingresos y Egresos del mes de ' + 'abril' + ' de ' + '2021'
        },
        maintainAspectRatio:false,
        responsive:true
        }
        });
        new Chart(document.getElementById("doughnut-chart2"), {
        type: 'doughnut',
        data: {
        labels: ["Ingresos", "Egresos"],
        datasets: [
            {
            label: "$",
            backgroundColor: ["#1cc88a", "#e74a3b"],
            data: [35,15]
            }
        ]
        },
        options: {
        title: {
            display: false,
            text: 'Ingresos y Egresos del mes de ' + 'mayo' + ' de ' + '2020'
        },
        maintainAspectRatio:false,
        responsive:true
        }
        });
        new Chart(document.getElementById("doughnut-chart3"), {
        type: 'doughnut',
        data: {
        labels: ["Ingresos", "Egresos"],
        datasets: [
            {
            label: "$",
            backgroundColor: ["#1cc88a", "#e74a3b"],
            data: [35,35]
            }
        ]
        },
        options: {
        title: {
            display: false,
            text: 'Ingresos y Egresos del mes de ' + 'mayo' + ' de ' + '2020'
        },
        maintainAspectRatio:false,
        responsive:true
        }
        });
    </script>
@endsection
@extends('layouts.menuGestor')

@section('importOwl')
    <link rel="stylesheet" type="text/css" href="/assets/css/gestorBlogs.css">
    <link rel="stylesheet" type="text/css" href="/assets/css/gestorResumen.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.js"></script>
@endsection

@section('contenido')
{{-- php para sacar las ciudades de donde se vende mas y los libros mas vendidos--}}
@php
    $arregloCiudades=array(
        0=> array(
            0=>'-',
            1=>0
        ),
        1=> array(
            0=>'-',
            1=>0
        ),
        2=> array(
            0=>'-',
            1=>0
        ),
        3=> array(
            0=>'-',
            1=>0
        ),
        4=> array(
            0=>'-',
            1=>0
        )
    );
    $arregloLibros=array(
        0=> array(
            0=>'-',
            1=>0,
            2=>''
        ),
        1=> array(
            0=>'-',
            1=>0,
            2=>''
        ),
        2=> array(
            0=>'-',
            1=>0,
            2=>''
        ),
        3=> array(
            0=>'-',
            1=>0,
            2=>''
        ),
        4=> array(
            0=>'-',
            1=>0,
            2=>''
        )
    );
    $contador=0;
    foreach ($ciudadesVenta as $ciudad) {
        $arregloCiudades[$contador][0]=$ciudad->ciudad;
        $arregloCiudades[$contador][1]=$ciudad->cantidadN;
        $contador++;
    }
    $contador=0;
    foreach ($librosVenta as $libros) {
        $arregloLibros[$contador][0]=$libros->titulo;
        $arregloLibros[$contador][1]=$libros->cantidadN;
        if($libros->descuentoFisico > 0 || $libros->descuentoDigital > 0){
            $arregloLibros[$contador][2]='¡En oferta!';
        }
        $contador++;
    }
@endphp
{{-- Esta parte es para el selector de años --}}
    @php
        $añoSelec=$today->year;
        if (isset($_GET['añoSelec']) ) {
            $añoSelec=$_GET['añoSelec'];
        }
    @endphp
    <div class="all_blogs_contenido">
        <div class="formContainer" style="width:100%">
            <form class="form-anio" action="" style="width:100%">
                <p class="tituloResumen2">Año</p>
                <select class="select-resumen" name="añoSelec" id="">
                    @php
                        $valor=(int)$añoSelec-3;
                        for ($i=0; $i < 7; $i++) { 
                            if($i!=3){
                                echo "<option value='".$valor."'>".$valor."</option>";
                            }
                            else {
                                echo "<option value='".$valor."' selected>".$valor."</option>";
                            }
                            $valor=$valor+1;
                        }
                    @endphp
                </select>
                <input class="gestor_blog_guardar" type="submit" value="Buscar">
            </form>
        </div>
        {{-- Cuadros para las graficas --}}
        <div class="cuadro-resumen">
            <p class="titulo-resumen">Resumen de ventas</p>
            <div class="grafica-resumen">
                <canvas id="line-chart"></canvas>
            </div>
        </div>

        <div class="cuadro-resumen">
            <p class="titulo-resumen">Ventas por género</p>
            <div class="grafica-resumen2">
                <div class="graficadona-resumen">
                    <canvas id="doughnut-chart"></canvas>
                </div>
            </div>
        </div>

        <div class="cuadro-resumen">
            <p class="titulo-resumen">Ventas por edades</p>
            <div class="grafica-resumen">
                <canvas id="line-chart2"></canvas>
            </div>
        </div>

        <div class="cuadro-resumen">
            <p class="titulo-resumen">Ventas por Ciudad</p>
            <div class="grafica-resumen">
                <div class="graficadona-resumen">
                    <canvas id="doughnut-chart3"></canvas>
                </div>
            </div>
        </div>

        <div class="cuadro-resumen">
            <p class="titulo-resumen">Libros más vendidos</p>
            <div class="ultimos-resumen">
                <table class="tabla-resumen">
                    <tr>
                        <td class="left-tabla-resumen">{{$arregloLibros[0][0]}}</td>
                        <td><div class="center-tabla-resumen" style="background-color: #FFEC40;">{{$arregloLibros[0][1]}}</div></td>
                        <td class="right-tabla-resumen">{{$arregloLibros[0][2]}}</td>
                    </tr>
                    <tr>
                        <td class="left-tabla-resumen">{{$arregloLibros[1][0]}}</td>
                        <td><div class="center-tabla-resumen" style="background-color: #1CC98A;">{{$arregloLibros[1][1]}}</div></td>
                        <td class="right-tabla-resumen">{{$arregloLibros[1][2]}}</td>
                    </tr>
                    <tr>
                        <td class="left-tabla-resumen">{{$arregloLibros[2][0]}}</td>
                        <td><div class="center-tabla-resumen" style="background-color: #FF4040;">{{$arregloLibros[2][1]}}</div></td>
                        <td class="right-tabla-resumen">{{$arregloLibros[2][2]}}</td>
                    </tr>
                    <tr>
                        <td class="left-tabla-resumen">{{$arregloLibros[3][0]}}</td>
                        <td><div class="center-tabla-resumen" style="background-color: #5F72A4;">{{$arregloLibros[3][1]}}</div></td>
                        <td class="right-tabla-resumen">{{$arregloLibros[3][2]}}</td>
                    </tr>
                    <tr>
                        <td class="left-tabla-resumen">{{$arregloLibros[4][0]}}</td>
                        <td><div class="center-tabla-resumen" style="background-color: #40DDFF;">{{$arregloLibros[4][1]}}</div></td>
                        <td class="right-tabla-resumen">{{$arregloLibros[4][2]}}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
@php
    $sumaVentasTotales=[
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
    $sumaGeneros=[
      'hombre'=>0,
      'mujer'=>0,
      'otros'=>0,
    ];
    $sumaEdades=[
        0=>0,
        1=>0,
        2=>0,
        3=>0,
        4=>0,
        6=>0
    ]
@endphp
@foreach ($ventas as $venta)
    @php
        $monthf = date('m', strtotime($venta->fecha));
        $yearf = date('y', strtotime($venta->fecha)) + 2000;
    @endphp
    @if ($yearf==$añoSelec)
        @php
            $sumaVentasTotales[$monthf]+=$venta->precio;
        @endphp
  @endif
@endforeach

@foreach ($ventas as $venta)
    @if ($venta->genero=='Hombre')
        @php
            $sumaGeneros['hombre']+=1;  
        @endphp
    @elseif($venta->genero=='Mujer')
        @php
            $sumaGeneros['mujer']+=1;  
        @endphp
    @elseif($venta->genero=='Otros')
        @php
            $sumaGeneros['otros']+=1;  
        @endphp
    @endif    
@endforeach

@foreach ($ventas as $venta)
    @if ($venta->edad > 9 && $venta->edad < 21)
        @php
            $sumaEdades[0]++; 
        @endphp
    @elseif($venta->edad > 20 && $venta->edad < 31)
        @php
            $sumaEdades[1]++;   
        @endphp
    @elseif($venta->edad > 30 && $venta->edad < 41)
        @php
            $sumaEdades[2]++;   
        @endphp
    @elseif($venta->edad > 40 && $venta->edad < 51)
        @php
            $sumaEdades[3]++;   
        @endphp
    @elseif($venta->edad > 50 && $venta->edad < 61)
        @php
            $sumaEdades[4]++;   
        @endphp
    @elseif($venta->edad > 60)
        @php
            $sumaEdades[5]++;   
        @endphp    
    @endif    
@endforeach


    <script>
        var sumaVentasTotales=<?php echo json_encode($sumaVentasTotales); ?>;
        var sumaGeneros=<?php echo json_encode($sumaGeneros); ?>;
        var sumaEdades=<?php echo json_encode($sumaEdades); ?>;
        var arregloCiudades=<?php echo json_encode($arregloCiudades); ?>;
        var ano=<?php echo $añoSelec ?>;
        new Chart(document.getElementById("line-chart"), {
        type: 'line',
        data: {
            labels: ['Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'],
            datasets: [{ 
                data: [sumaVentasTotales['01'],sumaVentasTotales['02'],sumaVentasTotales['03'],sumaVentasTotales['04'],
                sumaVentasTotales['05'],sumaVentasTotales['06'],sumaVentasTotales['07'],sumaVentasTotales['08'],
                sumaVentasTotales['09'],sumaVentasTotales['10'],sumaVentasTotales['11'],sumaVentasTotales['12']
                ],
                label: "Ingresos",
                borderColor: "#1cc88a",
                fill: false
            }
            ]
        },
        options: {
            title: {
            display: true,
            text: 'Ingresos por ventas de ' + ano
            },
            maintainAspectRatio:false,
            responsive:true
        }
        });
        new Chart(document.getElementById("doughnut-chart"), {
        type: 'doughnut',
        data: {
        labels: ["Hombres", "Mujeres","Otros"],
        datasets: [
            {
            label: "$",
            backgroundColor: ["#33C6FF", "#FE8ED4","#5F72A4"],
            data: [sumaGeneros['hombre'],sumaGeneros['mujer'],sumaGeneros['otros']]
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
        new Chart(document.getElementById("line-chart2"), {
        type: 'line',
        data: {
            labels: ['10-20 años','21-30 años','31-40 años','41-50 años','51-60 años','60 o más años'],
            datasets: [{ 
                data: [sumaEdades[0],sumaEdades[1],sumaEdades[2],sumaEdades[3],sumaEdades[4],sumaEdades[5]
                ],
                label: "Ventas",
                borderColor: "#f2c763",
                fill: false
            }
            ]
        },
        options: {
            title: {
            display: false,
            text: 'Ingresos por ventas de ' + ano
            },
            maintainAspectRatio:false,
            responsive:true
        }
        });
        new Chart(document.getElementById("doughnut-chart3"), {
        type: 'doughnut',
        data: {
        labels: [arregloCiudades[0][0],arregloCiudades[1][0],arregloCiudades[2][0],arregloCiudades[3][0],arregloCiudades[4][0] ],
        datasets: [
            {
            label: "$",
            backgroundColor: ["#5F72A4", "#40DDFF",'#FFEC40','#1CC98A','#FF4040'],
            data:[arregloCiudades[0][1],arregloCiudades[1][1],arregloCiudades[2][1],arregloCiudades[3][1],arregloCiudades[4][1] ]
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
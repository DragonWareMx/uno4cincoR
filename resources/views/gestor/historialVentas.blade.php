@extends('layouts.menuGestor')

@section('importOwl')
    <link rel="stylesheet" type="text/css" href="/assets/css/ventas.css">
    <link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Karla&display=swap" rel="stylesheet">
@endsection

@section('menu')
    Historial de ventas
@endsection

@section('contenido')
<div class="div_GeneralHV">
    <div class="div_informacionHV">
        
    </div>
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
@endsection
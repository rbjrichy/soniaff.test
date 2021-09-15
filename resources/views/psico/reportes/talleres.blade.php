@extends('adminlte::page')
@section('title', 'Reportes Talleres Psicologo')

@section('content_header')
    <h1>Reportes Talleres Psicologo</h1>
@stop

@section('content')
<div class="card-header border-0">
    <div class="d-flex justify-content-between">
        <h3 class="card-title">&nbsp;</h3>
        <div class="card-tools">
            <a href="#" class="btn btn-tool btn-sm">
            <i class="fas fa-print"></i>
            </a>
        </div>
    </div>
</div>
<table class="table table-light" style="font-size: 12px">
    <thead>
        <tr>
            <th>#</th>
            <th>Tema</th>
            <th>N° Sesiones</th>
            <th>Técnicas e Instrumentos</th>
            <th>Resultados</th>
        </tr>
    </thead>
    <tbody>
        @php
            $i = 1;
        @endphp
        @foreach ($talleres as $item)
        <tr>
            <td>{{$i++}}</td>
            <td>{{$item->tema}}</td>
            <td>{{$item->poblacion}}</td>
            <td>{!!$item->tecnicas_instrumentos!!}</td>
            <td>{{$item->resultado}}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hola!'); </script>
@stop

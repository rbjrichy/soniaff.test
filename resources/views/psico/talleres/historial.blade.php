@extends('adminlte::page')
@section('title', 'Profesionales')

@section('content_header')
    <h1>Listado Historico de Talleres por Gestión</h1>
@stop

@section('content')
@if (session('mensaje'))
<div class="alert alert-success">
    <strong>{{ session()->pull('mensaje') }} </strong>
    
</div>
@endif

<div class="card">
    <div class="card-body">
        {!! Form::open(['route' => 'psico.taller.historial.buscar', 'name'=>'mifromulario']) !!}
        <div class="row">
            <div class="col-4">
                {!! Form::select('gestion', $gestiones, $gestion, ['class' => 'form-control']) !!}
            </div>
            <div class="col-2">
                <button class="btn btn-primary" type="submit">buscar</button>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
</div>

<table class="table table-striped table-bordered table-hover">
    <thead>
        <th>Nombre taller</th>
        <th>Fecha Incio</th>
        <th>Descripción</th>
        <th>Estado</th>
        <th>Acciones</th>
    </thead>
    <tbody>
        @foreach ($talleres as $taller)
        <tr>
            <td>{{$taller->nombre_taller}}</td>
            <td>{{$taller->fecha_inicio->isoFormat('d MMMM YYYY')}}</td>
            <td>{{$taller->descripcion}} </td>
            <td>{{$taller->activo}}</td>
            <td>
                <a class="btn btn-sm btn-primary" href="#">Ver Taller</a>
            </td>
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
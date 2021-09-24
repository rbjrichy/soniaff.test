@extends('adminlte::page')
@section('title', 'Matrículas')

@section('content_header')
    <h1>Lista Matriculados Gestión Actual</h1>
@stop

@section('content')
@if (session('mensaje'))
    @include('partes.mensaje')
@endif
<div class="row m-2">
    <a href="{{route('director.matriculas.create')}}" class="btn btn-sm btn-outline-primary">Matricular Alumno</a>
</div>
    <table class="table table-light">
        <thead>
            <tr>
                <th>#</th>
                <th>Nombre Alumno</th>
                <th>Fecha</th>
                <th>Matricula</th>
                <th>Curso</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @php
                $i=1;
            @endphp
            @foreach ($matriculados as $item)
            <tr>
                    <td>{{$i++}}</td>
                    <td>{{$item->alumno->nombres}} {{$item->alumno->apellidos}}</td>
                    <td>{{$item->fecha_matriculacion->format('d-m-Y')}}</td>
                    <td>{{$item->codigo}}</td>
                    <td>{{$item->alumno->escolaridad}}</td>
                    <td>{{$item->estado}}</td>
                    <td>
                        <a class="btn btn-sm btn-outline-success" href="{{route('director.matricula.cuenta.alumno',[$item->alumno_id])}}">Cuenta</a>
                        <a href="{{route('director.matriculas.edit',[$item->id])}}" class="btn btn-sm btn-outline-info">Editar</a>
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
@extends('adminlte::page')
@section('title', 'Director')

@section('content_header')
    <h1>Lista Psicologos</h1>
@stop

@section('content')
@if (session('mensaje'))
    @include('partes.mensaje')
@endif
    <table class="table table-light">
        <thead>
            <tr>
                <th>#</th>
                <th>Nombre Psicologo</th>
                <th>Especialidad</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @php
                $i=1;
            @endphp
            @foreach ($psicologos as $item)
            <tr>
                    <td>{{$i++}}</td>
                    <td>{{$item->persona->nombres}} {{$item->persona->apellidos}}</td>
                    <td>{{$item->especialidad}}</td>
                    <td>
                        <a class="btn btn-sm btn-primary" href="{{route('director.lista.pacientes.psicologo',[$item->id])}}">Pacientes</a>
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
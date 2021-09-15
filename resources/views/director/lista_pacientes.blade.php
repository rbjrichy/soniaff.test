@extends('adminlte::page')
@section('title', 'Director')

@section('content_header')
    <h1>Lista de Pacientes del profesional {{$psicologo->persona->nombres}} {{$psicologo->persona->apellidos}}</h1>
@stop

@section('content')
@if (session('mensaje'))
    @include('partes.mensaje')
@endif
    <table class="table table-light">
        <thead>
            <tr>
                <th>#</th>
                <th>Nombre Paciente</th>
                <th>Curso</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @php
                $i=1;
            @endphp
            @foreach ($psicologo->pacientes as $item)
            <tr>
                @php
                    // dd($item);
                @endphp    
                <td>{{$i++}}</td>
                <td>{{$item->nombres}} {{$item->apellidos}}</td>
                <td>{{$item->escolaridad}}</td>
                <td>
                    <a class="btn btn-sm btn-primary" href="#">Quitar</a>
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
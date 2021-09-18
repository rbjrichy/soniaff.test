@extends('adminlte::page')
@section('title', 'Director')

@section('content_header')
    <h1>Lista de Pacientes del profesional {{$psicologo->persona->nombres}} {{$psicologo->persona->apellidos}}</h1>
@stop

@section('content')
@if (session('mensaje'))
    @include('partes.mensaje')
@endif
{!! Form::open(['route' => ['director.psicologo.asignar.paciente']]) !!}
<div class="row mb-3">
    <div class="col-8">
        @livewire('director.asignar-paciente')
    </div>
    <div class="col-4">
        {!! Form::submit('Asignar Paciente', ['class'=>'btn btn-sm btn-primary']) !!}
    </div>
</div>
{!! Form::hidden('psicologo_id', $psicologo->id) !!}
{!! Form::close() !!}
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
                    <div class="btn-group">
                        {!! Form::open(['route' => ['director.psicologo.quitar.paciente']]) !!}
                        {!! Form::hidden('psicologo_id', $psicologo->id) !!}
                        {!! Form::hidden('alumno_id', $item->id) !!}
                        {!! Form::submit('Quitar', ['class'=>'btn btn-sm btn-danger']) !!}
                        {!! Form::close() !!}
                    </div>
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
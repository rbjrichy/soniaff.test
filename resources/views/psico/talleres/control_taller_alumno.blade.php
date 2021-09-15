@extends('adminlte::page')
@section('title', 'Talleres')

@section('content_header')
    <h1>Control Taller {{$taller->nombre_taller}}</h1>
@stop

@section('content')

@if (session('mensaje'))
<div class="alert alert-success">
    <strong>{{ session()->pull('mensaje') }} </strong>
    
</div>
@endif
<div class="row">
    <div class="col-12 mt-2 mb-2">
        <div class="btn-group mt-3">
            <a class="btn btn-sm btn-outline-info" href="{{route('psico.taller.sesiones',[$taller])}}">Gestionar Sesiones</a>
            @if (is_null($informeTaller))
                <a class="btn btn-sm btn-outline-info" href="{{route('psico.taller.crear.informe',[$taller])}}">
                    Generar Informe Taller
                </a>
            @else
            <a class="btn btn-sm btn-outline-info" href="{{route('psico.taller.edit.informe',[$informeTaller])}}">
                Editar Informe Taller
            </a>
            <a class="btn btn-sm btn-outline-info" href="{{route('psico.taller.informe.ver',[$informeTaller])}}">
                Ver Imprimir Informe Taller
            </a>
            @endif

        </div>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="m-2">
                    {!! Form::open(['route' => ['psico.taller.control.alumnos.resgitrar']]) !!}
                    <div class="row">
                        <div class="col-10">
                            @livewire('psicologo.asignar-alumno-taller')
                        </div>
                        <div class="col-2">
                            {!! Form::submit('Registrar en Taller', ['class'=>'btn btn-primary']) !!}
                        </div>
                    </div>
                    {!! Form::hidden('taller_id', $taller->id) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>

    <div class="row">
        <div class="col-12">
            
            <div class="mt-4">
                <label class="label m-2">Lista de integrantes del taller</label>
                <table class="table table-sm table-striped">
                    <tbody>
                        <tr>
                            <th width='3%'>#</th>
                            <th>Nombre</th>
                            <th width='20%'>Teléfonos</th>
                            <th width='10px'></th>
                        </tr>
                        @php
                            $i=1;
                        @endphp
                    @foreach ($alumnos as $alumno)
                        <tr>
                            <td>{{$i++}}</td>
                            <td>{{$alumno->nombres }} {{$alumno->apellidos}}</td>
                            <td>{{$alumno->telefonos}}</td>
                            <td >
                                <div class="btn-group">
                                    {!! Form::open(['route' => ['psico.taller.control.alumnos.desregistrar']]) !!}
                                    {!! Form::hidden('alumno_id', $alumno->id) !!}
                                    {!! Form::hidden('taller_id', $taller->id) !!}
                                    {!! Form::submit('Quitar', ['class'=>'btn btn-sm btn-danger']) !!}
                                    {!! Form::close() !!}
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hola!'); </script>
@stop
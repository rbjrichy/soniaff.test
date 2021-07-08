@extends('adminlte::page')
@section('title', 'Alumnos')

@section('content_header')
    <h1>Asignar Tutor</h1>
@stop

@section('content')
<div class="row m-2">
    <label class="h5">{{ $alumno->nombres}} {{$alumno->apellidos}} - {{$alumno->escolaridad}}</label>
</div>
<div class="row">
    <div class="col-8">
        <div class="m-2">
            {!! Form::open(['route' => ['admin.alumnos.asignartutor.store', $alumno->id]]) !!}
            <div class="row">
                <div class="col-6">
                    @livewire('tutor.asignar-tutor',['alumno'=>$alumno])
                </div>
                <div class="col-4">
                    {!! Form::select('tipo_relacion', $comboTR, old('tipo_relacion'), ['class'=>'form-control']) !!}
                </div>
                <div class="col-2">
                    {!! Form::submit('Asignar', ['class'=>'btn btn-primary']) !!}
                </div>
            </div>
            {!! Form::close() !!}
        </div>
        {{-- <div class="m-2">
            <input type="text" name="buscarTutor" id="buscarTutor" class="form-control" placeholder="Buscar por ci o nombre del tutor..">
        </div> --}}
        <label class="label">Tutores del alumno</label>
        <table class="table table-sm table-striped">
            <tbody>
                <tr>
                    <th>Tipo Relación</th>
                    <th>Nombre</th>
                    <th>Ocupación</th>
                    <th>Teléfonos</th>
                    <th></th>
                </tr>
            @foreach ($tutores as $tutor)
                <tr>
                    <td>{{$tutor->pivot->tipo_relacion}}</td>
                    <td>{{$tutor->nombres }} {{$tutor->apellidos}}</td>
                    <td>{{$tutor->ocupacion}}</td>
                    <td>{{$tutor->telefonos}}</td>
                    <td>
                        <div class="btn-group">
                            {!! Form::open(['route' => ['admin.alumnos.asignartutor.delete']]) !!}
                            {!! Form::hidden('tutor_id', $tutor->id) !!}
                            {!! Form::hidden('alumno_id', $alumno->id) !!}
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
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')

@stop
{{-- @section('plugins.Select2', true) --}}
@extends('adminlte::page')
@section('title', 'Matrículas')

@section('content_header')
    <h1>Dar de baja Matricula</h1>
@stop

@section('content')

@if (session('mensaje'))
    @include('partes.mensaje')
@endif

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@php
    $alumno=$matricula->alumno;
@endphp
<div class="row p-2">
    <label for="">Nombre: </label>
    <div class="h5">&nbsp;&nbsp; {{$alumno->fullName()}} </div>
</div>
    @include('director.cuenta_alumno.datos_alumno_matricula')
<div class="row p-2">
    {!! Form::open(['route'=>'director.matriculas.delete']) !!}
    {!! Form::hidden('matricula_id', $matricula->id) !!}
    <label for="">Motivo de la baja</label>
    {!! Form::text('observacion', old('observacion'), ['class'=>'form-control', 'size' => '40','required'=>'required']) !!}
    <div class="mt-4">
        {!! Form::submit('Dar de baja Alumno', ['class'=>'btn btn-sm btn-outline-danger']) !!}
    </div>
    {!! Form::close() !!}
</div>
    
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hola!'); </script>
@stop
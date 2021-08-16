@extends('adminlte::page')
@section('title', 'Alumnos')

@section('content_header')
    <h1>Editar Alumno</h1>
@stop

@section('content')
@php
    // var_dump(session()->all());
@endphp
@if (session('mensaje'))
    <div class="alert alert-success">
        <strong>{{ session()->pull('mensaje')  }} </strong>
    </div>
@endif

<div class="col-8">
    <div class="card">
        <div class="card-body">
            {!! Form::model($alumno, ['route' => ['admin.alumnos.update', $alumno->id], 'method' => 'put']) !!}
                @include('admin.alumnos.partials.form_campos')
                @include('partes.btn-guardar')
            {!! Form::close() !!}
        </div>
    </div>
</div>
    
@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script> console.log('Hi!'); </script>
@stop
@section('plugins.TempusDominusBs4', true)

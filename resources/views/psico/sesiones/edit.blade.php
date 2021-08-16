@extends('adminlte::page')
@section('title', 'Tutores')

@section('content_header')
    <h1>Editar Sesión</h1>
@stop

@section('content')
@php
    // var_dump(session()->all());
@endphp
@if (session('mensaje'))
    <div class="alert alert-success">
        <strong>{{ session()->pull('mensaje') }} </strong>
    </div>
@endif

    <div class="card">
        <div class="card-body">
            {!! Form::model($taller, ['route' => ['psico.sesion.update', $taller->id], 'method' => 'put']) !!}
                @include('psico.sesiones.partials.form_campos')
                @include('partes.btn-guardar')
            {!! Form::close() !!}
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
@section('plugins.Summernote', true)

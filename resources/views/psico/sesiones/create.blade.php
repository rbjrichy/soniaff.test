@extends('adminlte::page')
@section('title', 'Tutores')

@section('content_header')
    <h1>Crear Sesión</h1>
@stop

@section('content')

<div class="card">
    <div class="card-body">        
        {!! Form::model($psicologo=null, ['route' => ['psico.sesion.store',[$taller]], 'method' => 'post']) !!}
        {!! Form::hidden('taller_id', $taller->id) !!}
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

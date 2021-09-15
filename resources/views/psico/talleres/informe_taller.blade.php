@extends('adminlte::page')
@section('title', 'Crear Informe Taller')

@section('content_header')
    <h1>Crear informe taller</h1>
@stop

@section('content')
@if (session('mensaje'))
<div class="alert alert-success">
    <strong>{{ session()->pull('mensaje') }} </strong>
    
</div>
@endif
    @include('psico.talleres.partials.datos_taller')
    {!! Form::open(['route' => ['psico.taller.store.informe', $taller], 'method' => 'post']) !!}
        {!! Form::hidden('taller_id', $taller->id) !!}
        @include('psico.talleres.partials.form_resultado')
        @include('partes.btn-guardar')
    {!! Form::close() !!}
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hola!'); </script>
@stop
@section('plugins.Summernote', true)

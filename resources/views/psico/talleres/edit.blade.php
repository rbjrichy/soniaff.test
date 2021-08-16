@extends('adminlte::page')
@section('title', 'Tutores')

@section('content_header')
    <h1>Editar Profesional</h1>
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

<div class="col-8">
    <div class="card">
        <div class="card-body">
            {!! Form::model($taller, ['route' => ['psico.taller.update', $taller->id], 'method' => 'put']) !!}
                @include('psico.talleres.partials.form_campos')
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

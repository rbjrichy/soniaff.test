@extends('adminlte::page')
@section('title', 'Taller Sesiones')

@section('content_header')
    <h1>Control de Sesiones del Taller <strong>{{ $taller->nombre_taller }}</strong></h1>
@stop

@section('content')
@if (session('mensaje'))
<div class="alert alert-success">
    <strong>{{ session()->pull('mensaje') }} </strong>
    
</div>
@endif
    <div class="mb-4">
        <a href="{{route('psico.sesion.create',[$taller])}}" class="btn btn-primary">Nueva Sesión</a>

    </div>
    @include('psico.sesiones.partials.tabla_sesiones')
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hola!'); </script>
@stop
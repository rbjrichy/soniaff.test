@extends('adminlte::page')
@section('title', 'Talleres')

@section('content_header')
    <h1>Lista Talleres</h1>
@stop

@section('content')
@if (session('mensaje'))
<div class="alert alert-success">
    <strong>{{ session()->pull('mensaje') }} </strong>
    
</div>
@endif
    {{-- @livewire('profesional.profesional-index') --}}
    <div class="mb-4">
        <a href="{{route('psico.taller.create')}}" class="btn btn-primary">Nuevo Taller</a>
        <a href="{{route('psico.taller.historial')}}" class="btn btn-default">Historial</a>

    </div>
    @include('psico.talleres.partials.tabla_talleres')
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hola!'); </script>
@stop
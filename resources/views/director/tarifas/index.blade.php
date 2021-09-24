@extends('adminlte::page')
@section('title', 'Tarifas')

@section('content_header')
    <h1>Gestionar Tarifas</h1>
@stop

@section('content')
@if (session('mensaje'))
    @include('partes.mensaje')
@endif

<div class="row">
    @php
    // dd($tarifa);
@endphp
    <div class="col-5 pl-3 pr-5">
        <label class="h5">Crear Nueva tarifa</label>
        {!! Form::model($tarifa, ['route' => ['director.gestionar.tarifa.update',[$tarifa]], 'method' => 'put']) !!}
            @include('director.tarifas.partials.form_campos')
            <div class="mb-2 mt-4">
                <button class="btn btn-primary" type="submit">Guardar</button>
                <a href="{{route('director.gestionar.tarifa.index')}}" class="btn btn-outline-primary">Nueva Tarifa</a>
            </div>
        {!! Form::close() !!}
    </div>
    <div class="col-7">
        <label class="h5">Lista de tarifas</label>
        @include('director.tarifas.partials.lista_tarifas')
    </div>
</div>
    
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hola!'); </script>
@stop
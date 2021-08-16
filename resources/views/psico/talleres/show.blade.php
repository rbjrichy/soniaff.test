@extends('adminlte::page')
@section('title', 'Profesinal')

@section('content_header')
    <h1>Ver datos {{$profesionale->tipo_persona}}</h1>
@stop

@section('content')
<div class="row">
    <div class="col-8">
        <div class="row">
            <div class="col-6">
                <div class="from-group">
                    <label for="ci_nit" class="label">Nombres</label>
                    <p class="form-control">{{$profesionale->nombres}} </p>
                </div>
            </div>
            <div class="col-6">
                <div class="from-group">
                    <label class="label">Apellidos</label>
                    <p class="form-control">{{$profesionale->apellidos}}</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <div class="from-group">
                    <label for="ci_nit" class="label">Cedula Identidad</label>
                    <p class="form-control">{{$profesionale->ci_nit}} </p>
                </div>
            </div>
            <div class="col-6">
                <div class="from-group">
                    <label class="label">Número de Registro Profesional</label>
                    <p class="form-control">{{$profesionale->profesion->registro_profesional}}</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="from-group">
                    <label class="label">Especialidad</label>
                    <p class="form-control">{{$profesionale->profesion->especialidad}}</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <div class="from-group">
                    <label class="label">Número Telofónico</label>
                    <p class="form-control">{{$profesionale->telefonos}}</p>
                </div>
            </div>
            <div class="col-6">
                <div class="from-group">
                    <label class="label">Dirección</label>
                    <p class="form-control">{{$profesionale->direccion }}</p>
                </div>
            </div>
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
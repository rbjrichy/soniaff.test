@extends('adminlte::page')
@section('title', 'Tutor')

@section('content_header')
    <h1>Ver datos {{$tutor->tipo_persona}}</h1>
@stop

@section('content')
<div class="row">
    <div class="col-8">
        <div class="row">
            <div class="col-6">
                <div class="from-group">
                    <label for="ci_nit" class="label">Nombres</label>
                    <p class="form-control">{{$tutor->nombres}} </p>
                </div>
            </div>
            <div class="col-6">
                <div class="from-group">
                    <label class="label">Apellidos</label>
                    <p class="form-control">{{$tutor->apellidos}}</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <div class="from-group">
                    <label for="ci_nit" class="label">Cedula Identidad</label>
                    <p class="form-control">{{$tutor->ci_nit}} </p>
                </div>
            </div>
            <div class="col-6">
                <div class="from-group">
                    <label class="label">Idioma</label>
                    <p class="form-control">{{$tutor->idioma}}</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <div class="from-group">
                    <label class="label">Número Telofónico</label>
                    <p class="form-control">{{$tutor->telefonos}}</p>
                </div>
            </div>
            <div class="col-6">
                <div class="from-group">
                    <label class="label">Dirección</label>
                    <p class="form-control">{{$tutor->direccion }}</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <div class="from-group">
                    <label class="label">Ocupación</label>
                    <p class="form-control">{{$tutor->ocupacion}}</p>
                </div>
            </div>
        </div>
    </div>
    <div class="col-4">
        <label class="label">Datos de los tutelados</label>
        <table class="table table-sm table-striped">
            <tbody>
            @foreach ($tutelados as $tutelado)
                <tr>
                    <td colspan="2">{{$tutelado->nombres }} {{$tutelado->apellidos}}</td>
                </tr>
                <tr>
                    <td>{{$tutelado->telefonos}}</td>
                    <td>{{$tutelado->escolaridad}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
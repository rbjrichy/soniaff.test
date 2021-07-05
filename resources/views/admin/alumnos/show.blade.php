@extends('adminlte::page')
@section('title', 'Alumnos')

@section('content_header')
    <h1>Ver datos {{$alumno->tipo_persona}}</h1>
@stop

@section('content')
<div class="row">
    <div class="col-8">
        <div class="row">
            <div class="col-6">
                <div class="from-group">
                    <label for="ci_nit" class="label">Cedula Identidad</label>
                    <p class="form-control">{{$alumno->ci_nit}} </p>
                </div>
            </div>
            <div class="col-6">
                <div class="from-group">
                    <label class="label">Género</label>
                    <p class="form-control">{{$alumno->genero}} </p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <label class="label">Género</label>
                <p class="form-control">{{$alumno->fecha_nac->format('d-m-Y')}}</p>
            </div>
            <div class="col-6">
                <div class="from-group">
                    <label class="label">Lugar de Nacimiento</label>
                    <p class="form-control">{{$alumno->lugar_nac}}</p>
                </div>
            </div>
        </div>
        <div class="row">  
            <div class="col-6">
                <div class="from-group">
                    <label class="label">Escolaridad</label>
                    <p class="form-control">{{$alumno->escolaridad}}</p>
                </div>
            </div>
            <div class="col-6">
                <div class="from-group">
                    <label class="label">Idioma</label>
                    <p class="form-control">{{$alumno->idioma}}</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <div class="from-group">
                    <label class="label">Número Telofónico</label>
                    <p class="form-control">{{$alumno->telefonos}}</p>
                </div>
            </div>
            <div class="col-6">
                <div class="from-group">
                    <label class="label">Dirección</label>
                    <p class="form-control">{{$alumno->direccion }}</p>
                </div>
            </div>
        </div>
    </div>
    <div class="col-4">
        <label class="label">Datos de los tutores</label>
        <table class="table table-sm table-striped">
            <tbody>
            @foreach ($tutores as $tutor)
                <tr>
                    <td colspan="2">{{$tutor->nombres }} {{$tutor->apellidos}}</td>
                </tr>
                <tr>
                    <td>{{$tutor->telefonos}}</td>
                    <td>{{$tutor->ocupacion}}</td>
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
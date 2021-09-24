@extends('adminlte::page')
@section('title', 'Matrículas')

@section('content_header')
    <h1>Matricular Alumno</h1>
@stop

@section('content')
@if (session('mensaje'))
    @include('partes.mensaje')
@endif

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

{!! Form::open(['route' => ['director.matriculas.store']]) !!}

<div class="row">
    {{-- <div class="form-group"> --}}
        <div class="col-6">
            <label for="">Fecha Incripción</label>
            <p class="form-control">{{now()->isoFormat('DD MMMM YYYY')}} </p>
        </div>
        <div class="col-6">
            <label for="">Gestión</label>
            <p class="form-control">2021</p>
        </div>
    {{-- </div> --}}
</div>

<div class="row">
    <div class="col-6">
        <label for="">Alumno a Matricular</label>
        @livewire('alumno.buscar-alumno')
    </div>
    <div class="col-6">
        <label for="tarifa_defecto_id_id">Tarifa Cobro Mensual</label>
        {!! Form::select('tarifa_defecto_id', $tarifas, old('tarifa_defecto_id_id'), ['class'=>'form-control', 'id'=>'tarifa_defecto_id_id']) !!}
    </div>
</div>
<div class="row">
    <div class="m-2">
        {!! Form::submit('Guardar', ['class'=>'btn btn-sm btn-primary']) !!}
    </div>
</div>
{!! Form::close() !!}
    
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hola!'); </script>
@stop
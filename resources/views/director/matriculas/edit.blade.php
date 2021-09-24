@extends('adminlte::page')
@section('title', 'Matrículas')

@section('content_header')
    <h1>Editar Matricula Alumno</h1>
@stop

@section('content')

<div class="row p-2">
    <a href="{{route('director.matriculas.baja.show',[$matricula->id])}}" class="btn btn-sm btn-outline-danger">Dar de baja Alumno</a>
</div>

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

{!! Form::open(['route' => ['director.matriculas.update']]) !!}
{!! Form::hidden('matricula_id', $matricula->id) !!}
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
        <label for="">Nombre Alumno</label>
        <p class="form-control">{{$matricula->alumno->fullName()}}</p>
    </div>
    <div class="col-6">
        <label for="tarifa_defecto_id_id">Tarifa Cobro Mensual</label>
        {!! Form::select('tarifa_defecto_id', $tarifas, old('tarifa_defecto_id_id',$matricula->tarifa_defecto_id), ['class'=>'form-control', 'id'=>'tarifa_defecto_id_id']) !!}
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
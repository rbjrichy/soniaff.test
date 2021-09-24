@extends('adminlte::page')
@section('title', 'Avisos Cobro')

@section('content_header')
    <h1>Eliminar Aviso de Cobro</h1>
@stop

@section('content')
@php
    $matricula = $avisoCobro->matricula;
    $alumno = $avisoCobro->matricula->alumno;
@endphp

@if (session('mensaje'))
    @include('partes.mensaje')
@endif


<div class="card">
    <div class="card-header">
        Alumno <span id="nombre">{{$matricula->alumno->fullName()}}</span>
    </div>
    @php
        // dd($errors);
    @endphp
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="row pl-4">
        @include('director.cuenta_alumno.datos_alumno_matricula')
    </div>
    <div class="h5 pl-4">
        Datos Aviso de cobro
    </div>
    <div class="row pl-4">
        <div class="col-3">
            <dl>
                <dt>Fecha</dt>
                <dd>
                    {{$avisoCobro->fecha}}
                </dd>
            </dl>
        </div>
        <div class="col-6">
            <dl>
                <dt>Concepto</dt>
                <dd>
                    {{$avisoCobro->concepto}}
                </dd>
            </dl>
        </div>
        <div class="col-3">
            <dl>
                <dt>Importe</dt>
                <dd>
                    {{$avisoCobro->importe}}
                </dd>
            </dl>
        </div>
    </div>
    {!! Form::open(['route'=>['director.avisos.cobro.eliminar.delete',$avisoCobro]]) !!}
    <div class="card-body">
        {!! Form::hidden('matricula_id', $matricula->id) !!}
        {!! Form::hidden('aviso_cobro_id', $avisoCobro->id) !!}
        <label for="motivo_eliminado_id">Motivo para eliminar el aviso de cobro</label>
        {!! Form::text('motivo_eliminado', old('motivo_eliminado'), ['class'=>'form-control', 'id'=>'motivo_eliminado_id', 'required'=>'required']) !!}
    </div>
    <div class="card-footer">
        <button type="submit" class="btn btn-sm btn-primary">Eliminar aviso de cobro</button>
        {{-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-sm">
            Crear Aviso
        </button> --}}
    </div>
    {!! Form::close() !!}
</div>

    
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
@stop
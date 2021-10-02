@extends('adminlte::page')
@section('title', 'Avisos Cobro')

@section('content_header')
    <h1>Crear cuentas por Cobrar</h1>
@stop

@section('content')
@if (session('mensaje'))
    @include('partes.mensaje')
@endif

<div class="card">
    <div class="card-header">
        Crear Avisos de Cobro para el alumno <span id="nombre">{{$matricula->alumno->fullName()}}</span>
        <span class="mt-2">
            <span class="{{$matricula->estado=='Activo'?'bg-green':'bg-red'}} p-2">{{$matricula->estado}}</span>
        </span>
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
    {!! Form::open(['route'=>['director.avisos.cobro.store',$matricula]]) !!}
    <div class="card-body">
        {!! Form::hidden('matricula_id', $matricula->id) !!}
        @include('director.avisos_cobro.partials.form_campos')
        @include('partes.modal_sm_info_confirm')
    </div>
    <div class="card-footer">
        {{-- <button type="submit" class="btn btn-sm btn-primary"></button> --}}
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-sm" onclick="miFunc()">
            Crear Aviso
        </button>
    </div>
    {!! Form::close() !!}
</div>

    
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> 
        function miFunc() {
            document.getElementById('mensaje').innerHTML = "La información no se podrá editar.";
            var nombre = document.getElementById('nombre');
            nombre = nombre.innerText;
            var fecha = document.getElementById('fecha');
            fecha = fecha.innerText;
            var tarifa = document.getElementById('tarifa_id');
            tarifa = tarifa.options[tarifa.selectedIndex].innerText;
            var mes = document.getElementById('mes');
            mes = mes.options[mes.selectedIndex].innerText
            
            document.getElementById('contenido-modal').innerHTML ="<dl>"
                                                                    +"<dt>Nombre alumno:</dt>"
                                                                    +"<dd>" + nombre + "</dd>"
                                                                    +"<dt>Fecha</dt>"
                                                                    +"<dd>"+ fecha +"</dd>"
                                                                    +"<dt>Tipo</dt>"
                                                                    +"<dd>"+ tarifa +"</dd>"
                                                                    +"<dt>Mes</dt>"
                                                                    +"<dd>"+ mes +"</dd>"
                                                                "</dl>";
            
        }
    </script>
@stop
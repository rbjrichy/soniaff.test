@extends('adminlte::page')
@section('title', 'Tutores')

@section('content_header')
    <h1>Crear Tutor</h1>
@stop

@section('content')

<div class="col-8">
    <div class="card">
        <div class="card-body">
            {!! Form::model($alumno=null, ['route' => ['admin.tutores.store'], 'method' => 'post']) !!}
                @include('admin.tutores.partials.form_campos')
                @include('partes.btn-guardar')
            {!! Form::close() !!}
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
@section('plugins.TempusDominusBs4', true)

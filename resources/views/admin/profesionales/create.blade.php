@extends('adminlte::page')
@section('title', 'Tutores')

@section('content_header')
    <h1>Crear Profesional</h1>
@stop

@section('content')
@if ($errors->any())
<ul>
	@foreach ($errors->all() as $error)
		<li>{{ $error }}</li>
	@endforeach
</ul>
@endif
<div class="row">
    <div class="col-8">
        <div class="card">
            <div class="card-body">
                {!! Form::model($alumno=null, ['route' => ['admin.prof.store'], 'method' => 'post']) !!}
                    @include('admin.profesionales.partials.form_campos')
                    @include('partes.btn-guardar')
                {!! Form::close() !!}
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
{{-- @section('plugins.TempusDominusBs4', true) --}}

@extends('adminlte::page')
@section('title', 'Ver Informe Taller')

@section('content_header')
    <h1>Ver Informe taller</h1>
@stop

@section('content')
    @include('psico.talleres.partials.datos_taller')
    <div class="card">
        <div class="card-header border-0">
          <div class="d-flex justify-content-between">
            <h3 class="card-title">Informe Taller</h3>
            <div class="card-tools">
                <a href="#" class="btn btn-tool btn-sm">
                  <i class="fas fa-print"></i>
                </a>
              </div>
          </div>
        </div>
        <div class="card-body">
          <div class="d-flex">
            <dl>
                <dt>1.- Justificación</dt>
                <dd>{!! $informe->justificacion !!}</dd>
                <dt>2.- Objetivo General</dt>
                <dd>{!! $informe->objetivo_general !!}</dd>
                <dt>3.- Objetivos Especificos</dt>
                <dd>{!! $informe->objetivos_especificos !!}</dd>
                <dt>4.- Contenido</dt>
                <dd>{!! $informe->contenido !!}</dd>
                <dt>5.- Procedimiento</dt>
                <dd>{!! $informe->procedimiento !!}</dd>
                <dt>6.- Resultados</dt>
                <dd>{!! $informe->resultados !!}</dd>
                <dt>7.- Conclusiones</dt>
                <dd>{!! $informe->conclusiones !!}</dd>
                <dt>8.- Recomendaciones</dt>
                <dd>{!! $informe->recomendaciones !!}</dd>
            </dl>
          </div>
        </div>
      </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hola!'); </script>
@stop

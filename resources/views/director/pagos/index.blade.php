@extends('adminlte::page')
@section('title', 'Pagos')

@section('content_header')
    <h1>Gestión de Pagos</h1>
@stop

@section('content')
@include('partes.alertas')
<div class="row">
    <div class="col-lg-6">
        @include('director.pagos.avisos_cobro')
    </div>
    <div class="col-lg-3">
        <div class="tarjeta">
            <div class="tarjeta-header border-1 mb-3">
            <h3 class="card-title" style="color: black">Registrar Pago</h3>
            </div>
            <div class="tarjeta-body">
                <div class="-3">
                    {!! Form::open(['route'=>['director.buscar.alumno.matricula']]) !!}
                    @livewire('director.buscar-matricula')
                    {!! Form::submit('Ver Cuenta', ['class'=>'mt-2 btn btn-block btn-outline-warning btn-sm']) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3">

            <!-- Info Boxes Style 2 -->
            <a href="{{route('director.ver.reporte.deudas')}}">
                <div class="info-box mb-3 bg-warning">
                <span class="info-box-icon"><i class="fas fa-file-invoice-dollar"></i></span>
  
                    <div class="info-box-content">
                        <span class="info-box-text">Ver Reporte</span>
                        <span class="info-box-number">Deudas</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
            </a>
            <!-- /.info-box -->
            <a href="{{route('director.ver.reporte.ingresos')}}" class="small-box-footer">
              <div class="info-box mb-3 bg-success">
                <span class="info-box-icon"><i class="far fa-money-bill-alt"></i></span>
                    <div class="info-box-content">
                    <span class="info-box-text">Ver Reporte</span>
                    <span class="info-box-text">
                        Pagos
                    </span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
            </a>
              <!-- /.info-box -->
              {{-- <div class="info-box mb-3 bg-danger">
                <span class="info-box-icon"><i class="fas fa-cloud-download-alt"></i></span>
  
                <div class="info-box-content">
                  <span class="info-box-text">Downloads</span>
                  <span class="info-box-number">114,381</span>
                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
              <div class="info-box mb-3 bg-info">
                <span class="info-box-icon"><i class="far fa-comment"></i></span>
  
                <div class="info-box-content">
                  <span class="info-box-text">Direct Messages</span>
                  <span class="info-box-number">163,921</span>
                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box --> --}}
            
    </div>
</div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hola!'); </script>
@stop
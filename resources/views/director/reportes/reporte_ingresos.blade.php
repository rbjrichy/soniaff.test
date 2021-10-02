@extends('adminlte::page')
@section('title', 'Reporte Ingresos')

@section('content_header')
    <h1>Reporte de Ingresos</h1>
@stop

@section('content')
{!! Form::open(['route'=>['director.generar.reporte.ingresos']]) !!}
    @include('director.reportes.campos_form')
{!! Form::close() !!}
<div class="row">
    @if ($ingresos->count()>0)
    <div class="text-info mb-1 mt-3">
        <label class="h3">{{session()->pull('mensaje')}}</label>
    </div>
    <table class="table table-light table-sm table-bordered table-striped">
        <thead class="thead-light">
            <tr>
                <th>Gestión</th>
                <th>Matrícula</th>
                <th>Nombres</th>
                <th>Deuda</th>
                <th>Teléfonos</th>
                <th>Dirección</th>
            </tr>
        </thead>
        <tbody>
            @php
                $sumaTotal = 0;
            @endphp
            @foreach ($ingresos as $item)
            @php
                $sumaTotal = $sumaTotal + $item->deuda;
            @endphp
            <tr>
                <td>{{$item->gestion}}</td>
                <td>{{$item->codigo}}</td>
                <td>{{$item->nombres}} {{$item->apellidos}}</td>
                <td style="text-align: right">{{number_format($item->deuda,2)}}</td>
                <td>{{$item->telefonos}}</td>
                <td>{{$item->direccion}}</td>
            </tr>
            @endforeach
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td style="text-align: right"><strong>Total</strong></td>
                <td style="text-align: right">{{number_format($sumaTotal,2)}}</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
        </tbody>
    </table>
    @endif
</div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hola!'); </script>
@stop
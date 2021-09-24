@extends('adminlte::page')
@section('title', 'Matrículas')

@section('content_header')
    <h1>Cuenta Alumno</h1>
@stop

@section('content')
@if (session('mensaje'))
    @include('partes.mensaje')
@endif
<div class="card">
    <div class="card-header">
        {{$alumno->fullName()}}
    </div>
    <div class="card-body">
        <div class="row">
            @include('director.cuenta_alumno.datos_alumno_matricula')
        </div>
    </div>
</div>
<div class="card">
    <div class="card-header">
        <a class="btn btn-sm btn-outline-info" href="{{route('director.avisos.cobro.create',[$matricula])}} ">Crear Cuenta x Cobrar</a>
    </div>
    @if (session('mensaje-error'))
    <div class="alert alert-danger">
        <strong>{{ session()->pull('mensaje-error') }} </strong>
    </div>
    @endif
    
    {!! Form::open(['route'=>'director.pagar.cuentas.alumno']) !!}
    {!! Form::hidden('alumno_id', $alumno->id) !!}
    <div class="card-body">
        <h5 class="card-title">Lista de cuentas por cobrar</h5>
        @php
            $verFormPagar = count($avisosCobros??0)>0;
        @endphp
        @if ($verFormPagar)
        <table class="table table-sm table-light">
            <thead class="thead-light">
                <tr>
                    <th>#</th>
                    <th>Tipo</th>
                    <th>Concepto</th>
                    <th>Fecha</th>
                    <th>Monto</th>
                    <th>[]</th>
                    <th>&nbsp;</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $i=1;
                    $total=0;
                @endphp
                @foreach ($avisosCobros as $item)
                <tr>
                    @php
                        $total = $total + $item->importe;
                    @endphp
                    <td>{{$i++}}</td>
                    <td>{{$item->tarifa->tipo_tarifa}}</td>
                    <td>{{$item->concepto}}</td>
                    <td>{{$item->fecha->format('d-m-Y')}}</td>
                    <td class="text-right">{{number_format($item->importe,2)}}</td>
                    <td>
                        <input class="cuentasxpagar" type="checkbox" name="cuentasPagar[]" id="deuda{{$item->id}}" value="{{$item->id}}" precio="{{$item->importe}}" > 
                    </td>
                    <td>
                        <div class="btn-group">
                            <a href="{{route('director.avisos.cobro.eliminar.show',[$item->id])}}" class="btn btn-sm btn-danger">
                                <i class="far fa-trash-alt"></i>
                            </a>
                        </div>
                    </td>
                </tr>
                @endforeach
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td class="text-right"><strong>Total</strong></td>
                    <td class="text-right"><strong>{{number_format($total,2)}}</strong></td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                </tr>
            </tbody>
        </table>
        @else
        <br>
        <div class="row p-2">
            <div class="text-info">
                No exiten cuentas por pagar.
            </div>  
        </div>
        @endif
    </div>
    @if ($verFormPagar)
        <div class="card-footer">
            <div class="col-2 float-right">
                <tr>
                    <td>
                        <input type="text" class="form-control" name="totalPago" id="totalPago" placeholder="0.00" readonly>
                    </td>
                </tr>
                <tr>
                    <td>
                        <button class="btn btn-sm btn-primary form-control" type="submit">
                            Pagar Seleccionados
                        </button>
                    </td>
                </tr>
            </div>
        </div>
    @endif
    {!! Form::close() !!}
</div>

{{-- cuentas pagadas --}}
<div class="card">
    <div class="card-header">
        <h5 class="card-title">Lista de cuentas pagadas</h5>
    </div>
    <div class="card-body">
        @if (count($cuentasPagadas??0)>0)
        <table class="table table-sm table-light">
            <thead class="thead-light">
                <tr>
                    <th>#</th>
                    <th>Tipo</th>
                    <th>Concepto</th>
                    <th>Fecha</th>
                    <th>Monto</th>
                    <th>&nbsp;</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $i=1;
                    $total=0;
                @endphp
                @foreach ($cuentasPagadas as $item)
                <tr>
                    @php
                        $total = $total + $item->importe;
                    @endphp
                    <td>{{$i++}}</td>
                    <td>{{$item->tarifa->tipo_tarifa}}</td>
                    <td>{{$item->concepto}}</td>
                    <td>{{$item->fecha->format('d-m-Y')}}</td>
                    <td class="text-right">{{number_format($item->importe,2)}}</td>
                    <td>
                        <a href="#" class="btn btn-tool btn-sm">
                            <i class="fas fa-print"></i>
                        </a>
                    </td>
                </tr>
                @endforeach
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td class="text-right"><strong>Total</strong></td>
                    <td class="text-right"><strong>{{number_format($total,2)}}</strong></td>
                </tr>
            </tbody>
        </table>
        @else
        <div class="text-info">
            No exiten cuentas pagadas.
        </div>
        @endif
        
    </div>
</div>
    
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> 
    $(document).ready(function() {
        $(document).on('click keyup','.cuentasxpagar',function() {
            calcular();
        });
    });

    function calcular() {
    var total = $('#totalPago');
    total.val(0);
    $('.cuentasxpagar').each(function() {
        // if($(this).hasClass('cuentasxpagar')) {
        total.val(($(this).is(':checked') ? parseFloat($(this).attr('precio')) : 0) + parseFloat(total.val()));  
        // }
        // else {
        // total.val(parseFloat(total.val()) + (isNaN(parseFloat($(this).val())) ? 0 : parseFloat($(this).val())));
        // }
    });
    var totalParts = parseFloat(total.val()).toFixed(2).split('.');
    total.val('Bs ' + totalParts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ",") + '.' +  (totalParts.length > 1 ? totalParts[1] : '00'));  
    }
    </script>
@stop
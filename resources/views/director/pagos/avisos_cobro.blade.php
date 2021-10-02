<div class="card">
    <div class="card-header border-0">
        <h3 class="card-title">Generar Avisos de Cobro</h3>
        <div class="card-tools">
            <a href="#" class="btn btn-sm btn-tool">
            <i class="fas fa-download"></i>
            </a>
            <a href="#" class="btn btn-sm btn-tool">
            <i class="fas fa-bars"></i>
            </a>
        </div>
    </div>
    <div class="card-body">
        <div class="row mb-5" style="display: block !important;">
            {!! Form::open(['route'=>['director.generar.avisos.cobro']]) !!}
            @php
                $mesActual = ucfirst(now()->locale('es')->monthName);
            @endphp
            {{-- <select name="" id="">
                @foreach ($meses as $item)
                    <option value="{{$item}}" {{$item==$mesActual?'selected':''}} >{{$item}}</option>
                @endforeach
            </select> --}}
            {!! Form::select('mes', $meses, $mesActual, ['class'=>'form-control mb-2']) !!}
            {!! Form::submit('Generar Avisos de Cobro', ['class'=>'form-control btn btn-sm btn-primary']) !!}
            {!! Form::close() !!}
        </div>
        <div class="d-flex justify-content-between align-items-center border-bottom mb-3">
            <p class="text-success text-xl">
            <i class="fas fa-users"></i>
            </p>
            <p class="d-flex flex-column text-right">
            <span class="font-weight-bold">
                <i class="ion ion-android-arrow-up text-success"></i> {{$totalMatriculados}}
            </span>
            <span class="text-muted">TOTAL MATRICULADOS ACTIVOS</span>
            </p>
        </div>
        <div class="row">
            <div class="col-6">
                <label>Avisos de Cobro</label>
                <div class="d-flex justify-content-between align-items-center border-bottom mb-3">
                    <table class="table table-sm">
                        <thead>
                            <tr>
                                <th class="text-muted">MES</th>
                                <th class="text-muted">CANTIDAD</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($avisosCobro as $item)
                            <tr>
                                <td>{{($item->mes!='Ninguno')?$item->mes:'Matriculas'}}</td>
                                <td>{{$item->cantidad}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-6">
                <label>Pagos</label>
                <div class="d-flex justify-content-between align-items-center border-bottom mb-3">
                    <table class="table table-sm">
                        <thead>
                            <tr>
                                <th class="text-muted">MES</th>
                                <th class="text-muted">CANTIDAD</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($mesesPagados as $item)
                            <tr>
                                <td>{{($item->mes!='Ninguno')?$item->mes:'Matriculas'}}</td>
                                <td>{{$item->cantidad}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- /.d-flex -->
    </div>
</div>
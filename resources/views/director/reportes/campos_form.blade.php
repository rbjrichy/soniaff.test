<div class="form-row">
    <div class="form-group col-4">
        <label for="gestion_id">Gestión</label>
        {!! Form::select('gestion', $gestiones, $gestion, ['class' => 'form-control', 'id'=>'gestion_id']) !!}
    </div>
    <div class="form-group col-4">
        <label for="mes_id">Mes</label>
        {!! Form::select('mes', $meses, $mes, ['class' => 'form-control', 'id'=>'mes_id']) !!}
    </div>
    <div class="form-group col-2">
        <label for="btn_id">&nbsp;</label>
        {!! Form::submit('Generar Reporte', ['class' => 'btn btn-sm btn-primary form-control', 'id' => 'btn_id']) !!}
    </div>
</div>
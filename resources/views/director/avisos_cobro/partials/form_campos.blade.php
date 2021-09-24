<div class="col-3">
    <div class="form-group">
        <label for="tarifa_id">Fecha</label>
        <p class="form-control" id="fecha">{{now()->format('d-m-Y')}}</p>
    </div>
</div>
<div class="col-3">
    <div class="form-group">
        <label for="tarifa_id">Tarifa a Cobrar</label>
        {!! Form::select('tarifa_id', $tarifas, old('tarifa_id',$avisoCobro->tarifa_id??''), ['class'=>'form-control', 'id'=>'tarifa_id']) !!}
        <span class="invalid-feedback" role="alert">
            <strong>{!! $errors->first('tarifa_id')!!} error</strong>
        </span>
        @error('tarifa_id')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>
<div class="col-3">
    <div class="form-group">
        <label for="mes">Mes <small class="text-info">(Si corresponde)</small> </label>
        {!! Form::select('mes', $cbxMeses, old('mes',$avisoCobro->mes??''), ['class'=>'form-control', 'id'=>'mes']) !!}
    </div>
</div>
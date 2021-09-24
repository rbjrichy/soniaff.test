<div class="row">
    <label for="tipo_tarifa_id">Tipo</label>
    {{-- {!! Form::text('tipo_tarifa', old('tipo_tarifa', $tarifa->tipo_tarifa ?? ''), ['class'=>'form-control', 'required'=>'required']) !!} --}}
    {!! Form::select('tipo_tarifa', $tiposTarifa, old('tipo_tarifa'), ['class'=>'form-control']) !!}
</div>
<div class="row">
    <label for="nombre_id">Nombre</label>
    {!! Form::text('nombre', old('nombre', $tarifa->nombre ?? ''), ['class'=>'form-control', 'required'=>'required']) !!}
</div>
<div class="row">
    <label for="descripcion_id">Descripción</label>
    {!! Form::text('descripcion', old('descripcion', $tarifa->descripcion ?? ''), ['class'=>'form-control', 'required'=>'required']) !!}
</div>
<div class="row">

    <label for="monto_id">Monto</label>
    @if (is_null($tarifa))
        <input type="decimal" class="form-control" name="monto" id="monto_id" value="{{number_format(old('monto', $tarifa->monto ?? '0'), 2)}}">
    @else
    <p class="form-control">{{number_format($tarifa->monto, 2)}} <small class="text-primary">No se puede editar el precio por seguridad</small></p>        
    
    @endif
</div>
<div class="row">
    <label for="estado">Estado</label>
    {!! Form::select('estado', ['1'=>'Activo', '0'=>'Inactivo'], old('estado',$tarifa->estado??'1'), ['class'=>'form-control', 'id'=>'estado_id']) !!}
</div>
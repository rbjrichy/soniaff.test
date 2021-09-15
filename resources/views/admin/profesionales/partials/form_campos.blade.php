<div class="row">
    <div class="col-6">
        <div class="from-group">
            <label for="nombres" class="label">Nombres</label>
            
            <input class="form-control @error('nombres') is-invalid @enderror" type="text" value="{{ old('nombres', $profesionale->nombres ?? '') }}"name="nombres" id="nombres" >
            @error('nombres')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    <div class="col-6">
        <div class="from-group">
            <label class="label">Apellidos</label>
            <input class="form-control @error('apellidos') is-invalid @enderror" type="text" value="{{old('apellidos',$profesionale->apellidos ?? '')}}"name="apellidos" >
            @error('apellidos')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
</div>
<div class="row">
    <div class="col-6">
        <div class="from-group">
            <label for="ci_nit" class="label">Cedula Identidad</label>
            <input class="form-control @error('ci_nit') is-invalid @enderror" type="number" value="{{old('ci_nit', $profesionale->ci_nit ?? '')}}"name="ci_nit" id="ci_nit" >
            @error('ci_nit')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    <div class="col-6">
        <div class="from-group">
            <label class="label">Número de Registro Profesional</label>
            <input class="form-control @error('registro_profesional') is-invalid @enderror" type="text" name="registro_profesional" value="{{ old('registro_profesional', $profesionale->profesion->registro_profesional ?? '')}}">
            @error('registro_profesional')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="from-group">
            <label class="label">Especialidad</label>
            <input class="form-control @error('especialidad') is-invalid @enderror" type="text" value="{{ old('especialidad', $profesionale->profesion->especialidad ?? '')}}"name="especialidad" >
            @error('especialidad')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
</div>
<div class="row">
    <div class="col-6">
        <div class="from-group">
            <label class="label">Número Telofónico</label>
            <input class="form-control @error('telefonos') is-invalid @enderror" type="text" value="{{ old('telefonos', $profesionale->telefonos ?? '')}}"name="telefonos" placeholder="7000000; 78544444">
            @error('telefonos')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    <div class="col-6">
        <div class="from-group">
            <label class="label">Dirección</label>
            <input class="form-control @error('direccion') is-invalid @enderror" type="text" name="direccion" value="{{old('direccion', $profesionale->direccion ?? '')}}">
            @error('direccion')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
</div>
<div class="row">
    <div class="col-6">
        <label class="label">Seleccionar Usuario</label>
        {!! Form::select('user_id', $usuarios, $selected=null, ['class'=>'form-control']) !!}
    </div>
</div>

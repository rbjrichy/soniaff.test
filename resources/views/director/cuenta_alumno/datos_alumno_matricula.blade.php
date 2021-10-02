<div class="row">
    <div class="col-3">
        <dl>
            <dt>Fecha Matriculación</dt>
            <dd>
                {{$matricula->fecha_matriculacion}}
            </dd>
        </dl>
    </div>
    <div class="col-3">
        <dl>
            <dt>Gestión</dt>
            <dd>
                {{$matricula->gestion}}
            </dd>
        </dl>
    </div>
    <div class="col-3">
        <dl>
            <dt>Código</dt>
            <dd>
                {{$matricula->codigo}}
            </dd>
        </dl>
    </div>
    <div class="col-3">
        <dl>
            <dt>Escolaridad</dt>
            <dd>
                {{$alumno->escolaridad}}
            </dd>
        </dl>
    </div>
</div>
<div class="row pl-1">
    <dl>
        <dt>Estado del Alumno</dt>
        <dd class="mt-2">
            <span class="{{$matricula->estado=='Activo'?'bg-green':'bg-red'}} p-2">{{$matricula->estado}}</span>
        </dd>
    </dl>
</div>
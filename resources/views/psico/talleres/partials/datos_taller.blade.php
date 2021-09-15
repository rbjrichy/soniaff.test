<div class="row">
    <div class="col-12">
        <dl>
            <dt>Nombre Taller:</dt>
            <dd>{{$taller->tema}}</dd>
        </dl>
    </div>
</div>

<div class="row">
    <div class="col-3">
        <dl>
            <dt>Fecha Inicio</dt>
            <dd>{{$taller->fecha_inicio->format('d-m-Y')}}</dd>
          </dl>
    </div>
    <div class="col-3">
        <dl>
            <dt>Fecha Conclusión</dt>
            <dd>
                @if (!is_null($taller->fechaConclusion()))
                    {{$taller->fechaConclusion()->format('d-m-Y')}}
                @endif
            </dd>
          </dl>
    </div>
    <div class="col-3">
        <dl>
            <dt>Cantidad de Sesiones</dt>
            <dd>{{$taller->cantidadSesiones()}}</dd>
          </dl>
    </div>
    <div class="col-3">
        <dl>
            <dt>Cantidad de Participantes</dt>
            <dd>{{$taller->cantidadParticipantes()}}</dd>
          </dl>
    </div>
</div>
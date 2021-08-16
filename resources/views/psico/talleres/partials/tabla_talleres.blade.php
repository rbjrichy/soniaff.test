<table class="table table-striped table-bordered table-hover">
    <thead>
        <th>Nombre taller</th>
        <th>Fecha Incio</th>
        <th>Descripción</th>
        <th>Estado</th>
        <th>Acciones</th>
    </thead>
    <tbody>
        @foreach ($talleres as $taller)
        <tr>
            <td>{{$taller->nombre_taller}}</td>
            <td>{{$taller->fecha_inicio->isoFormat('d MMMM YYYY')}}</td>
            <td>{{$taller->descripcion}} </td>
            <td>{{$taller->activo}}</td>
            <td>
                {{-- <a class="btn btn-sm btn-primary" href="{{url('/psicologo/saludar/'.$taller->id)}}">Controlar</a> --}}
                <a class="btn btn-sm btn-primary" href="{{route('psico.taller.control.alumnos.index', [$taller])}}">Controlar</a>
                <a class="btn btn-sm btn-secondary" href="{{route('psico.taller.sesiones',[$taller])}}">Sesiones</a>
                <a class="btn btn-sm btn-default" href="#">Archivar</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
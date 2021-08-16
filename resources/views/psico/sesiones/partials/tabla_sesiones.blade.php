<table class="table table-striped table-bordered table-hover">
    <thead>
        <th>Fecha</th>
        <th>Actividades</th>
        <th>Objetivos</th>
        <th>Materiales</th>
        <th>Acciones</th>
    </thead>
    <tbody>
        @foreach ($sesiones as $sesion)
        <tr>
            <td>{!! $sesion->fecha->isoFormat('d MMMM YYYY') !!}</td>
            <td>{!! $sesion->actividades !!}</td>
            <td>{!! $sesion->objetivos !!}</td>
            <td>{!! $sesion->materiales !!}</td>
            <td>
                <div class="btn-group">
                    <a class="btn btn-sm btn-primary" href="{{route('psico.sesion.edit',[$sesion])}}">Editar</a>
                    <form action="{{ route('psico.sesion.destroy', [$sesion]) }}" method="POST" onsubmit='return confirm("¿Esta seguro que desea eliminar el registro?");'>
                        @csrf @method('delete')
                        <button type="submit" class="btn btn-sm btn-danger">
                            Eliminar
                        </button>
                    </form>
                </div>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
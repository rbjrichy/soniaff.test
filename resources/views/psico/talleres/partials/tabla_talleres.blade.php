<table class="table table-striped table-bordered table-hover">
    <thead>
        <th>Tema taller</th>
        <th width="15%">Fecha Inicio</th>
        <th>Población</th>
        <th>Acciones</th>
    </thead>
    <tbody>
        @foreach ($talleres as $taller)
        <tr>
            <td>{{$taller->tema}}</td>
            <td>{{$taller->fecha_inicio->isoFormat('DD MMMM YYYY')}}</td>
            <td>{{$taller->poblacion}} </td>
            <td>
                {{-- <a class="btn btn-sm btn-primary" href="{{url('/psicologo/saludar/'.$taller->id)}}">Controlar</a> --}}
                <div class="btn-group">
                    <a class="btn btn-sm btn-primary" href="{{route('psico.taller.control.alumnos.index', [$taller])}}">Controlar</a>
                    <form action="{{ route('psico.taller.destroy', [$taller]) }}" method="POST" onsubmit='return confirm("¿Esta seguro que desea archivar el taller?");'>
                        @csrf @method('delete')
                        <button type="submit" class="btn btn-sm btn-warning">
                            Archivar
                        </button>
                    </form>
                </div>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
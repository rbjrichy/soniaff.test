<div>
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-sm-8">
                    <input wire:model='search' class="form-control" placeholder="Ingrese el ci o nombre del tutor">
                </div>
                <div class="col-sm-4">
                    <a class="btn btn-primary ml-auto" href="{{route('admin.tutores.create')}}">Nuevo Tutor</a>
                </div>
            </div>
            
        </div>
        @if ($tutores->count())
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>CI</th>
                            <th>Nombres</th>
                            <th>Ocupación</th>
                            <th>Teléfonos</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $i=1;
                        @endphp
                        @foreach ($tutores as $tutor)
                        <tr>
                            <td>{{$i++}}</td>
                            <td>{{$tutor->ci_nit}}</td>
                            <td>{{$tutor->nombres}} {{$tutor->apellidos}} </td>
                            <td>{{$tutor->ocupacion}}</td>
                            <td>{{$tutor->telefonos}}</td>
                            <td>
                                <div class="btn-group">
                                    <a class="btn btn-sm btn-primary" href="{!! route('admin.tutores.show', [$tutor]) !!}">
                                        ver
                                    </a>
                                    <a class="btn btn-sm btn-info" href="{!! route('admin.tutores.edit', [$tutor]) !!}">
                                        <i class="far fa-edit"></i>
                                    </a>
                                    <form action="{{ route('admin.tutores.destroy', [$tutor]) }}" method="POST" onsubmit='return confirm("¿Esta seguro que desea eliminar el registro?");'>
                                        @csrf @method('delete')
                                        <button type="submit" class="btn btn-sm btn-danger">
                                            <i class="far fa-trash-alt"></i></button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="card-footer">
                {{$tutores->links()}}
            </div>
        @else
            <div class="card-body">
                <strong>No hay registros</strong>
            </div>
        @endif
    </div>
</div>

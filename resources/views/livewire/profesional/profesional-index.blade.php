<div>
    <a class="btn btn-primary ml-auto" href="{{route('admin.prof.create')}}">Nuevo Profesional</a>
    <div class="card">
        <div class="card-header">
            <div class="row">
                <input wire:model='search' class="form-control" placeholder="Ingrese el ci o nombre del tutor">
            </div>
            
        </div>
        @if ($profs->count())
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>CI</th>
                            <th>Nombres</th>
                            <th>Especialidad</th>
                            <th>Teléfonos</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $i=1;
                        @endphp
                        @foreach ($profs as $prof)
                        <tr>
                            <td>
                                {{$i++}}</td>
                            <td>{{$prof->ci_nit}}</td>
                            <td>{{$prof->nombres}} {{$prof->apellidos}} </td>
                            <td>{{($prof->profesion->especialidad) ?? 'Si datos'}}</td>
                            <td>{{$prof->telefonos}}</td>
                            <td>
                                <div class="btn-group">
                                    @can('admin.prof.show')
                                        <a class="btn btn-sm btn-primary" href="{!! route('admin.prof.show', [$prof]) !!}">
                                            ver
                                        </a>
                                    @endcan
                                    @can('admin.prof.edit')
                                        <a class="btn btn-sm btn-info" href="{!! route('admin.prof.edit', [$prof]) !!}">
                                            <i class="far fa-edit"></i>
                                        </a>
                                    @endcan
                                    @can('admin.prof.destroy')
                                        <form action="{{ route('admin.prof.destroy', [$prof]) }}" method="POST" onsubmit='return confirm("¿Esta seguro que desea eliminar el registro?");'>
                                            @csrf @method('delete')
                                            <button type="submit" class="btn btn-sm btn-danger">
                                                <i class="far fa-trash-alt"></i></button>
                                        </form>
                                    @endcan
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="card-footer">
                {{$profs->links()}}
            </div>
        @else
            <div class="card-body">
                <strong>No hay registros</strong>
            </div>
        @endif
    </div>
</div>
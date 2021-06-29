<div>
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-sm-8">
                    <input wire:model='search' class="form-control" placeholder="Ingrese el ci o nombre del tutor">
                </div>
                <div class="col-sm-4">
                    <a class="btn btn-primary ml-auto" href="{{route('admin.tutor.create')}}">Nuevo Tutor</a>
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
                            <td></td>
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

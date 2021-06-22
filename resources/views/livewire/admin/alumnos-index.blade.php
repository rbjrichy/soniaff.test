<div>
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-sm-8">
                    <input wire:model='search' class="form-control" placeholder="Ingrese el ci o nombre del alumno">
                </div>
                <div class="col-sm-4">
                    <a class="btn btn-primary ml-auto" href="{{route('admin.alumnos.create')}}">Nuevo Alumno</a>
                </div>
            </div>
            
        </div>
        @if ($alumnos->count())
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>CI</th>
                            <th>Nombres</th>
                            <th>Escolaridad</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $i=1;
                        @endphp
                        @foreach ($alumnos as $alumno)
                        <tr>
                            <td>{{$i++}}</td>
                            <td>{{$alumno->ci_nit}}</td>
                            <td>{{$alumno->nombres}} {{$alumno->apellidos}} </td>
                            <td>{{$alumno->escolaridad}}</td>
                            <td></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="card-footer">
                {{$alumnos->links()}}
            </div>
        @else
            <div class="card-body">
                <strong>No hay registros</strong>
            </div>
        @endif
    </div>
</div>

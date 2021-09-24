<table class="table table-light">
    <thead>
        <th>Nombre</th>
        <th>Descrición</th>
        <th>Monto</th>
    </thead>
    <tbody>
        @foreach ($tarifas as $item)
        <tr>
            <td>
                <a href="{{route('director.gestionar.tarifa.index',[$item])}}" class="btn btn-sm {{$item->estado==1? 'btn-outline-success': 'btn-outline-danger'}}">
                    {{$item->nombre}} 
                </a>
            </td>
            <td>
                {{$item->descripcion}} 
            </td>
            <td>
                {{number_format($item->monto,2)}} 
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
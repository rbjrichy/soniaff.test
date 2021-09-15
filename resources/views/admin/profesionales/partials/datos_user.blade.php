<h5>Datos Usuario</h5>
Nombre
<p class="form-control">{{$usuario->name}} </p>
Usuario
<p class="form-control">{{$usuario->email}} </p>
@if (!is_null($rol))    
Rol
<p class="form-control">{{ $rol->name }}</p>

@else
<label>¡El usuario no tiene un Rol asignado!</label>
@endif


<label for="nombre">Apellido</label>
<input type="text" name="apellido" value="{{ isset ($usuario->apellido) ? $usuario->apellido : ''}}" id="apellido">
<br>
<label for="nombre">Nombre</label>
<input type="text" name="nombre" value="{{ isset ($usuario->nombre) ? $usuario->nombre : ''}}" id="nombre">
<br>
<label for="nombre">Usuario</label>
<input type="text" name="user" value="{{ isset ($usuario->user) ? $usuario->user : ''}}" id="user">
<br>
<label for="nombre">Nueva contraseña</label>
<input type="text" name="pass" id="pass">
<br>
<input type="submit" value="{{$modo}}">
<br>

<a href="{{ url('usuario/') }}">Volver</a>
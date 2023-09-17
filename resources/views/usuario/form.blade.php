@if(count($errors)>0)
<div class="alert alert-danger" role="alert">
    <ul>
    @foreach($errors->all() as $error)
       <li> {{$error}}</li>
    @endforeach
    </ul>
</div>
    
@endif

<br>
<div class="form-group">
<label for="nombre">Apellido</label>
<input type="text" class="form-control" name="apellido" value="{{ isset ($usuario->apellido) ? $usuario->apellido : old('apellido')}}" id="apellido">
</div>
<br>
<div class="form-group">
<label for="nombre">Nombre</label>
<input type="text" class="form-control" name="nombre" value="{{ isset ($usuario->nombre) ? $usuario->nombre : old('nombre')}}" id="nombre">
</div>
<br>
<div class="form-group">
<label for="nombre">Usuario</label>
<input type="text" class="form-control" name="user" value="{{ isset ($usuario->user) ? $usuario->user : old('user')}}" id="user">
</div>
<br>
<div class="form-group">
<label for="nombre">Nueva contraseña</label>
<input type="text" class="form-control" name="pass" id="pass">
</div>
<br>
<input type="submit" class="btn btn-success d-inline" value="{{$modo}}">


<a class="btn btn-warning" href="{{ url('usuario/') }}">Volver</a>
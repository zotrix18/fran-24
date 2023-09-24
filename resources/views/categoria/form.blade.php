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
<label for="nombre">Nombre</label>
<input type="text" class="form-control" name="nombre" value="{{ isset ($producto->nombre) ? $producto->nombre : old('nombre')}}" id="nombre">
</div>
<br>

<br>
<div class="text-center">
    <input type="submit" class="btn btn-success d-inline" value="{{$modo}}">
    <a class="btn btn-warning" href="{{ url('categoria/') }}">Volver</a>
</div>
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
<input type="text" class="form-control" name="nombre" value="{{ isset ($usuario->nombre) ? $usuario->nombre : old('nombre')}}" id="nombre">
</div>
<br>
<div class="form-group">
<label for="stock">Stock</label>
<input type="number" class="form-control" name="stock" value="{{ isset ($usuario->stock) ? $usuario->stock : old('stock')}}" id="stock">
</div>
<br>
<div class="form-group">
<label for="precio">Precio</label>
<input type="text" class="form-control" name="precio" value="{{ isset ($usuario->precio) ? $usuario->precio : old('precio')}}" id="precio">
</div>
<br>

@foreach ($proveedores as $proveedor)
    {{var_dump($proveedor)}}sdsd
    <!-- <option value="{{$proveedor->id_proveedor}}">{{$proveedor->nombre}}</option> -->
  @endforeach

<select class="form-select" aria-label="Default select example">
  <option selected>Seleccione proveedor</option>
  
  
</select>
<br>

<input type="submit" class="btn btn-success d-inline" value="{{$modo}}">


<a class="btn btn-warning" href="{{ url('usuario/') }}">Volver</a>
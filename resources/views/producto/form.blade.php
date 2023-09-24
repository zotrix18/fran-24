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
<div class="form-group">
<label for="stock">Stock</label>
<input type="number" class="form-control" name="stock" value="{{ isset ($producto->stock) ? $producto->stock : old('stock')}}" id="stock">
</div>
<br>
<div class="form-group">
<label for="precio">Precio</label>
<input type="text" class="form-control" name="precio" value="{{ isset ($producto->precio) ? $producto->precio : old('precio')}}" id="precio">
</div>
<br>



<select class="form-select" name="proveedor_id">
    @if(isset ($producto->precio))
        <option value=" ">Seleccione Proveedor</option>
        <option value=" {{ $proveedor -> id_proveedor }} " selected> {{ $proveedor -> nombre }} </option>  
    @else
        <option value=" " selected>Seleccione Proveedor</option>
        @foreach($proveedores as $proveedor)
            <option value="{{$proveedor->id_proveedor}}">{{$proveedor->nombre}}</option>
        @endforeach
    @endif
</select>

<br>
<input type="submit" class="btn btn-success d-inline" value="{{$modo}}">


<a class="btn btn-warning" href="{{ url('producto/') }}">Volver</a>
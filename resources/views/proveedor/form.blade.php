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
<input type="text" class="form-control" name="nombre" value="{{ isset ($proveedor->nombre) ? $proveedor->nombre : old('nombre')}}" id="nombre">
</div>
<br>
<select class="form-select" name="categoria_id">
    @if(isset ($categoria->nombre))
        <option value=" ">Seleccione Proveedor</option>
        <option value=" {{ $categoria -> id_categoria }} " selected> {{ $categoria -> nombre }} </option>  
        @foreach($categorias as $categoriaa)
            @if($categoria->id_categoria != $categoriaa->id_categoria)
                <option value="{{$categoriaa->id_categoria}}">{{$categoriaa->nombre}}</option>
            @endif
        @endforeach
    @else
        <option value=" " selected>Seleccione Proveedor</option>
        @foreach($categorias as $categoria)
            <option value="{{$categoria->id_categoria}}">{{$categoria->nombre}}</option>
        @endforeach
    @endif
</select>

<br>
<div class="text-center">
    <input type="submit" class="btn btn-success d-inline" value="{{$modo}}">
    <a class="btn btn-warning" href="{{ url('proveedor/') }}">Volver</a>
</div>
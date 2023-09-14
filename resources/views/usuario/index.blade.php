Mostrar la lista de usuarios

    
<a href="{{ url('usuario/create') }}">Crear usuario nuevo</a>
<table class="table table-light">
    <thead class="thead-light">
        <tr>
            <th>#</th>
            <th>Apellido</th>
            <th>Nombre </th>
            <th>Tipo de Usuario</th>
            <th>Usuario</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($usuarios as $usuario)
        <tr>
            <td>{{ $usuario->id}}</td>
            <td>{{ $usuario -> apellido}}</td>
            <td>{{ $usuario -> nombre}}</td>
            @if($usuario['nivel_acceso'] == 1)
                <td>Administrador</td>
                @else
                    <td>Vendedor</td>
                    @endif
            <td>{{ $usuario -> user}}</td>
            <td>   
            <a href="{{url('/usuario/'. $usuario->id.'/edit')}}">Editar</a>
             
            <form action="{{ url('/usuario/suspender/' . $usuario->id) }}" method="POST">
                @csrf
                @method('PATCH')
                <input type="submit" value="Suspender">
            </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
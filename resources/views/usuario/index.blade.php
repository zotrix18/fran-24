@extends('layouts.app')

@section('content')

@if(Session::has('mensaje'))
    <div class="alert alert-sucess alert-dismissible fade show" role="alert">
        {{ Session::get('mensaje')}}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
     </div>
@endif
    



<div class="container">
    
<a class="btn btn-success" href="{{ url('usuario/create') }}">Crear usuario nuevo</a>
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
            <a href="{{url('/usuario/'. $usuario->id.'/edit')}}" class="btn btn-warning">Editar</a>
             
            <form action="{{ url('/usuario/suspender/' . $usuario->id) }}" class="d-inline" method="POST">
                @csrf
                @method('PATCH')
                <input type="submit" class="btn btn-danger" value="Suspender">
            </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
{!! $usuarios->links()!!}
</div>
@endsection
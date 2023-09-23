@extends('layouts.app')

@section('content')

@if(Session::has('mensaje'))
    <div class="conteiner d-flex justify-content-center align-items-center ">
        <div class="alert alert-success alert-dismissible" role="alert">
            {{ Session::get('mensaje')}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>
@endif
    



<div class="container">
    
<a class="btn btn-success my-4" href="{{ url('producto/create') }}">Alta Producto nuevo</a>
<table class="table table-light text-center table-striped table-bordered">
    <thead class="thead-light">
        <tr>
            <th>#</th>
            <th>Nombre</th>
            <th>Nombre </th>
            <th>Tipo de usuario</th>
            <th>Usuario</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($productos as $usuario)
            @if($producto -> suspendido == 0)
            <tr>
                <td>{{ $usuario->id}}</td>
                <td>{{ $usuario -> apellido}}</td>
                <td>{{ $usuario -> nombre}}</td>
                @if($usuario->hasRole('Admin'))
                    <td>Admin</td>
                @else
                    <td>Vendedor</td>
                @endif             
                <td>{{ $usuario -> username}}</td>
                <td>   
                <a href="{{url('/producto/'. $producto->id.'/edit')}}" class="btn btn-warning">Editar</a>
                
                <form action="{{ url('/producto/suspender/' . $producto->id) }}" class="d-inline" method="POST">
                    @csrf
                    @method('PATCH')
                    <input type="submit" class="btn btn-danger" value="Suspender">
                </form>
                </td>
            </tr>
            @endif
        @endforeach
    </tbody>
</table>
{!! $productos->links()!!}
</div>
@endsection
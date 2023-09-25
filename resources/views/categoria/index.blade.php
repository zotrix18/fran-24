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
    
    <button type="button" class="btn btn-success mb-4" data-bs-toggle="modal" data-bs-target="#modal-alta">
        Alta Categoria
    </button>

     @include('categoria.create',['modo'=>'Alta Categoria'])
    
    <table class="table table-light text-center table-striped table-bordered">
        <thead class="thead-light">
            <tr>
                <th>#</th>
                <th>Nombre</th>
                <th>Ultimo cambio por</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categorias as $categoria)
                
                <tr>
                    <td>{{ $categoria->id_categoria}}</td>
                    <td>{{ $categoria -> nombre}}</td>
                    @foreach ( $usuarios as $usuario)
                        @if($categoria -> user_usuario == $usuario->id)
                        <td>{{$usuario->username}} - {{ $usuario->apellido}}, {{$usuario->nombre}} </td>
                        @endif
                    @endforeach
                    <td>   
                               
                    
                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modal-modif">
                        Editar Nombre
                    </button>

                    @include('categoria.edit',['modo'=>'Edicion Categoria', $categoria])

                    <form action="{{ url('/categoria/baja/' . $categoria->id_categoria) }}" class="d-inline" method="POST">
                        @csrf
                        @method('PATCH')
                        <input type="submit" class="btn btn-danger d-inline" value="Baja">
                    </form>
                    
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {!! $categorias->links()!!}
</div>
@endsection
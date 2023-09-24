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
    
    <!-- <a class="btn btn-success my-4" href="{{ url('categoria/create') }}">Alta categoria nuevo</a> -->

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
                                       
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                        Editar Nombre
                    </button>


                    <div class="modal" tabindex="-1">
                        <div class="modal-dialog">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Modal title</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p>Modal body text goes here.</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Save changes</button>
                            </div>
                            </div>
                        </div>
                    </div>


                    <form action="{{ url('/categoria/baja/' . $categoria->id_categoria) }}" class="d-inline" method="POST">
                        @csrf
                        @method('PATCH')
                        <input type="submit" class="btn btn-danger" value="Baja">
                    </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {!! $categorias->links()!!}
</div>
@endsection
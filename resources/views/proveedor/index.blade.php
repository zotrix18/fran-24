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
        Alta Proveedor
    </button>

     @include('proveedor.create',['modo'=>'Alta Proveedor'])
    
    <table class="table table-light text-center table-striped table-bordered">
        <thead class="thead-light">
            <tr>
                <th>#</th>
                <th>Nombre</th>
                <th>Categoria</th>
                <th>Ultimo cambio por</th>
                <th>Acciones</th> 
            </tr>
        </thead>
        <tbody>
            @foreach($proveedores as $proveedor)
                
                <tr>
                    <td>{{ $proveedor -> id_proveedor}}</td>
                    <td>{{ $proveedor -> nombre}}</td>

                    @foreach ($categorias as $categoria)
                        @if($proveedor -> id_categoria == $categoria -> id_categoria)
                            <td> {{ $categoria -> nombre}} </td>
                        @endif
                    @endforeach

                    @foreach ( $usuarios as $usuario)
                        @if( $usuario->id == $proveedor->user_cambio)
                            <td> {{$usuario->username}} - {{ $usuario->apellido}}, {{$usuario->nombre}} </td>
                        @endif
                    @endforeach


                    <td>   
                               
                    
                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modal-modif">
                        Editar Nombre
                    </button>

                    @include('proveedor.edit',['modo'=>'Edicion proveedor', $proveedor])

                    <form action="{{ url('/proveedor/baja/' . $proveedor->id_categoria) }}" class="d-inline" method="POST">
                        @csrf
                        @method('PATCH')
                        <input type="submit" class="btn btn-danger d-inline" value="Baja">
                    </form>
                    
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    
</div>
@endsection
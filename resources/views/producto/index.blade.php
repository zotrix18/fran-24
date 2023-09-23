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
            <th>Stock</th>
            <th>Precio</th>
            <th>Proveedor</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($productos as $producto)
            
            <tr>
                <td>{{ $producto->id_producto}}</td>
                <td>{{ $producto -> nombre}}</td>
                <td>{{ $producto -> stock}}</td>
                            
                <td>{{ $producto -> precio}}</td>
                <td>{{ $producto -> id_proveedor}}</td>
                <td>   
                <a href="{{url('/producto/'. $producto->id.'/edit')}}" class="btn btn-warning">Editar</a>
                
                <form action="{{ url('/producto/suspender/' . $producto->id) }}" class="d-inline" method="POST">
                    @csrf
                    @method('PATCH')
                    <input type="submit" class="btn btn-danger" value="Suspender">
                </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
{!! $productos->links()!!}
</div>
@endsection
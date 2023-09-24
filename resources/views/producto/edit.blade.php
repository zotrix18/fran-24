@extends('layouts.app')

@section('content')
<div class="container">
<form action="{{ url('/producto/'.$producto->id_producto) }}" method="post">
@csrf
{{ method_field('PATCH') }}
@include('producto.form',['modo'=>'Guardar Edicion'])

</form>
</div>
@endsection
@extends('layouts.app')

@section('content')
<div class="container">
<form action="{{ url('/usuario/'.$usuario->id) }}" method="POST">
@csrf
{{ method_field('PATCH') }}
@include('usuario.form',['modo'=>'Guardar Edicion'])

</form>
</div>
@endsection
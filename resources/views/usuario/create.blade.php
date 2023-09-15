@extends('layouts.app')

@section('content')
<div class="container">
<form method="post" action="{{url('/usuario')}}" enctype="multipart/form-data">
    @csrf
   
    @include('usuario.form',['modo'=>'Crear Usuario'])
    
</form>
</div>
@endsection
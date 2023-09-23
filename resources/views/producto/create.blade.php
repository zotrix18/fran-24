@extends('layouts.app')

@section('content')
<div class="container">
<form method="post" action="{{url('/usuario')}}" enctype="multipart/form-data">
    @csrf
   
    @include('producto.form',['modo'=>'Alta Producto'])
    
</form>
</div>
@endsection
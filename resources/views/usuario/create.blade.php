<form method="post" action="{{url('/usuario')}}" enctype="multipart/form-data">
    @csrf
   
    @include('usuario.form')
    
</form>
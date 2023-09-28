<div class="modal fade" id="modal-modif-{{ $proveedor->id_proveedor }}" tabindex="-1" aria-labelledby="modal-modif-{{ $proveedor->id_proveedor }}" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title text-center" id="modal-modif-{{ $proveedor->id_proveedor }}">{{$modo}}</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- cuerpo -->
                

                <div class="container">
                    <form method="post" action="{{ url('/proveedor/'.$proveedor->id_proveedor) }}" enctype="multipart/form-data">
                        @csrf
                        {{ method_field('PATCH') }}
                        @include('proveedor.form',['modo'=>$modo])
                    </form>
                </div>




                </div>
                
        </div>
    </div>
</div>

<div class="modal fade" id="modal-modif-{{ $categoria->id_categoria }}" tabindex="-1" aria-labelledby="modal-modif-{{ $categoria->id_categoria }}" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title text-center" id="modal-modif-{{ $categoria->id_categoria }}">{{ $modo }}</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
                <div class="modal-body">
                    <!-- cuerpo -->
                
                <div class="container">
                    <form method="post" action="{{ url('/categoria/'.$categoria->id_categoria) }}" enctype="multipart/form-data">
                        @csrf
                        {{ method_field('PATCH') }}
                        @include('categoria.form',['modo'=>$modo])
                    </form>
                </div>




                </div>
                
        </div>
    </div>
</div>


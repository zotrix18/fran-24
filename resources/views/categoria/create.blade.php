

<div class="modal fade" id="modal-alta" tabindex="-1" aria-labelledby="moda-alta" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title text-center" id="moda-alta">{{$modo}}</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    
                

                <div class="container">
                    <form method="post" action="{{url('/categoria')}}" enctype="multipart/form-data">
                        @csrf
                        @include('categoria.form',['modo'=>$modo])
                    </form>
                </div>




                </div>
                
        </div>
    </div>
</div>

    
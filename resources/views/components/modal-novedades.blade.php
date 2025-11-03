<div class="modal fade" id="{{'modalNovedades'.$id}}" tabindex="-1" aria-labelledby="{{$id}}Label"
     aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content overflow-hidden" style="height: 600px;">
            <div class="modal-header" style="background-color:rgba(51,51,51,0.1);">
                <h1 class="modal-title fs-5" id="{{$id}}Label">{{$title}}</h1>
                <span
                    class="badge rounded-pill border border-primary text-primary ms-5 shadow-sm"></span>
                <button type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-4">
                        <img src="{{ $image }}" class="w-100"
                             alt="{{$title}}">
                    </div>
                    <div class="col-md-8">
                        {{$description}}
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cerrar
                </button>
            </div>
        </div>
    </div>
</div>
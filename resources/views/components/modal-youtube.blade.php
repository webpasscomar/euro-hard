<div>
  <!-- Modal -->
  <div class="modal fade" id="{{'modalVideo'.$id}}" tabindex="-1" aria-labelledby="modalYoutubeTitle"
       aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header" style="background-color: #414040;">
          <h1 class="modal-title" id="modalYoutubeTitle"><img src="{{asset('images/logo-eurohard-white.png')}}" alt=""
                                                              class="img-fluid w-75">
          </h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                  style="background-color:white;"></button>
        </div>
        <div class="modal-body w-100" style="height: 400px;">
          <iframe class="w-100 h-100" src="{{$videoUrl}}"
                  title="YouTube video player" frameborder="0"
                  allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                  referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
          </iframe>
        </div>
      </div>
    </div>
  </div>
</div>

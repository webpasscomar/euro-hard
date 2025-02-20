<div>
  <!-- Modal -->
  <div class="modal fade" id="{{ 'modalVideo' . $id }}" tabindex="-1" aria-labelledby="modalYoutubeTitle"
       aria-hidden="true" style="background: rgba(61,60,60,0.8);">
    <div class="modal-dialog modal-lg modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header" style="background-color: #3a3838;">
          <h1 class="modal-title" id="modalYoutubeTitle"><img
              src="{{ asset('images/logo-eurohard-white.png') }}" alt="" class="img-fluid w-75">
          </h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                  style="background-color:white;"></button>
        </div>
        <div class="modal-body ratio ratio-16x9">
          <iframe class="" src="{{ $videoUrl }}" title="YouTube video player" frameborder="0"
                  allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                  referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
          </iframe>
        </div>
      </div>
    </div>
  </div>
</div>

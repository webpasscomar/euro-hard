@extends('layouts.app')

@section('content')
  <div class="container mt-4">
    <div class="controls text-center mb-3">
      <button id="prev-page" class="btn btn-secondary d-inline-flex align-items-center">
        <span class="d-none d-md-inline">◀ Anterior</span>
        <span class="d-md-none">⬅</span>
      </button>
      <span id="page-num" class="mx-3">Página: <span id="current-page">1</span> / <span id="total-pages">--</span></span>
      <button id="next-page" class="btn btn-secondary d-inline-flex align-items-center">
        <span class="d-none d-md-inline">Siguiente ▶</span>
        <span class="d-md-none">➡</span>
      </button>
      <a href="{{ asset('pdfs/catalogo.pdf') }}" download class="btn btn-danger ms-2"><i
          class="fa-solid fa-download"></i></a>
      <br><br>
      <input type="number" id="page-input" min="1" placeholder="Ir a página"
        class="form-control d-inline w-auto mx-2" style="width: 100px;">
      <button id="go-to-page" class="btn btn-secondary">Ir</button>
    </div>

    <div id="loading-spinner" class="d-flex flex-column justify-content-center align-items-center" style="height: 300px;">
      <div class="spinner-border text-primary" role="status"></div>
      <p class="mt-3 text-muted">Aguarde unos segundos, estamos cargando el catálogo...</p>
    </div>

    <div class="d-flex justify-content-center">
      <div id="page-flip"></div>
    </div>
  </div>
@endsection

@push('head')
  <style>
    #page-flip {
      width: 100%;
      max-width: 100vw;
      height: 60vh;
      max-height: 600px;
      background: white;
      border: 2px solid #ddd;
      display: none;
      /* Oculto hasta que cargue */
      justify-content: center;
      align-items: center;
      margin: 0 auto;
      overflow: hidden;
      box-sizing: border-box;
    }

    canvas {
      width: 100%;
      height: auto;
    }

    @media (max-width: 768px) {
      #page-flip {
        height: 50vh;
      }
    }

    @media (max-width: 480px) {
      #page-flip {
        height: 45vh;
      }
    }
  </style>
@endpush

@push('js')
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.6.347/pdf.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/page-flip@2.0.7/dist/js/page-flip.browser.min.js"></script>

  <script>
    document.addEventListener("DOMContentLoaded", function() {
      const pdfUrl = @json(asset('pdfs/catalogo.pdf'));
      const flipContainer = document.getElementById('page-flip');
      const spinner = document.getElementById('loading-spinner');
      let pageFlip;
      let totalPages = 0;

      pdfjsLib.GlobalWorkerOptions.workerSrc =
        "https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.6.347/pdf.worker.min.js";

      pdfjsLib.getDocument(pdfUrl).promise
        .then(pdf => {
          console.log("✅ Documento PDF cargado correctamente.");

          totalPages = pdf.numPages;
          document.getElementById('total-pages').textContent = totalPages;
          const pages = [];

          const loadPage = (num) => {
            return new Promise((resolve) => {
              console.log("📄 Cargando página:", num);
              pdf.getPage(num).then(page => {
                const canvas = document.createElement("canvas");
                const ctx = canvas.getContext("2d");
                const viewport = page.getViewport({
                  scale: 2
                });
                canvas.width = viewport.width;
                canvas.height = viewport.height;

                page.render({
                  canvasContext: ctx,
                  viewport
                }).promise.then(() => {
                  console.log("✅ Página renderizada:", num);
                  pages.push(canvas);
                  resolve();
                });
              });
            });
          };

          const loadAllPages = async () => {
            for (let i = 1; i <= totalPages; i++) {
              await loadPage(i);
            }

            console.log("✅ Todas las páginas cargadas.");

            pageFlip = new St.PageFlip(flipContainer, {
              width: pages[0].width,
              height: pages[0].height,
              showCover: true,
              maxShadowOpacity: 0.3,
              mobileScrollSupport: false,
            });

            pageFlip.loadFromImages(pages.map(canvas => canvas.toDataURL()));

            pageFlip.on("flip", (e) => {
              document.getElementById('current-page').textContent = e.data + 1;
            });

            console.log("✅ PDF cargado, ocultando spinner.");
            spinner.classList.add('d-none');
            flipContainer.style.display = "flex";
          };

          loadAllPages();
        })
        .catch(error => {
          console.error("❌ Error al cargar el documento PDF:", error);
          spinner.innerHTML = '<p>Error al cargar el PDF.</p>';
        });


      document.getElementById("prev-page").addEventListener("click", () => pageFlip?.flipPrev());
      document.getElementById("next-page").addEventListener("click", () => pageFlip?.flipNext());

      document.getElementById("go-to-page").addEventListener("click", () => {
        const pageNumberInput = document.getElementById("page-input").value;
        const pageNumber = parseInt(pageNumberInput);

        if (pageNumber >= 1 && pageNumber <= totalPages) {
          pageFlip?.flip(pageNumber - 1);
        } else {
          alert("Número de página inválido.");
        }
      });
    });
  </script>
@endpush

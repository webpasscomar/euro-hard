@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <div class="container mt-4">
            <div class="controls text-center mb-3">
                <button id="prev-page" class="btn btn-secondary d-inline-flex align-items-center">
                    <span class="d-none d-md-inline">◀ Anterior</span>
                    <span class="d-md-none">⬅</span>
                </button>
                <span id="page-num" class="mx-3">Página: <span id="current-page">1</span> / <span
                        id="total-pages">--</span></span>
                <button id="next-page" class="btn btn-secondary d-inline-flex align-items-center">
                    <span class="d-none d-md-inline">Siguiente ▶</span>
                    <span class="d-md-none">➡</span>
                </button>
                <a href="{{ asset('pdfs/hp.pdf') }}" download class="btn btn-danger ms-2"><i
                        class="fa-solid fa-download"></i></a>
                <br><br>
                <!-- Input y botón para ir a la página -->
                <input type="number" id="page-input" min="1" placeholder="Ir a página"
                    class="form-control d-inline w-auto mx-2" style="width: 100px;">
                <button id="go-to-page" class="btn btn-secondary">Ir</button>
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
                /* El contenedor ocupa el 100% del ancho disponible */
                max-width: 100vw;
                /* El ancho máximo será el 100% del viewport */
                height: 60vh;
                /* La altura será el 60% del alto del viewport */
                max-height: 600px;
                /* Aseguramos que no exceda los 600px de altura */
                background: white;
                border: 2px solid #ddd;
                display: flex;
                justify-content: center;
                align-items: center;
                margin: 0 auto;
                /* Centra el contenedor horizontalmente */
                overflow: hidden;
                /* Oculta cualquier contenido desbordante */
                box-sizing: border-box;
                /* Asegura que el padding y los bordes no afecten el tamaño del contenedor */
            }

            canvas {
                width: 100%;
                /* El canvas ocupa el 100% del ancho del contenedor */
                height: auto;
                /* La altura se ajusta automáticamente para mantener la proporción */
            }

            /* Estilos para pantallas más pequeñas */
            @media (max-width: 768px) {
                #page-flip {
                    max-width: 100vw;
                    /* En pantallas pequeñas, el ancho máximo será el 100% del viewport */
                    height: 50vh;
                    /* La altura se ajusta al 50% del viewport */
                }
            }

            /* Estilos para pantallas extra pequeñas */
            @media (max-width: 480px) {
                #page-flip {
                    max-width: 100vw;
                    /* En pantallas muy pequeñas, se usa todo el ancho */
                    height: 45vh;
                    /* La altura es un poco más pequeña */
                }
            }
        </style>
    @endpush

    @push('js')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.6.347/pdf.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/page-flip@2.0.7/dist/js/page-flip.browser.min.js"></script>

        <script>
            document.addEventListener("DOMContentLoaded", function() {
                const pdfUrl = @json(asset('pdfs/hp.pdf'));
                const flipContainer = document.getElementById('page-flip');
                let pageFlip;
                let totalPages = 0;

                pdfjsLib.GlobalWorkerOptions.workerSrc =
                    "https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.6.347/pdf.worker.min.js";

                pdfjsLib.getDocument(pdfUrl).promise.then(pdf => {
                    totalPages = pdf.numPages;
                    document.getElementById('total-pages').textContent = totalPages;
                    const pages = [];

                    const loadPage = (num) => {
                        return new Promise((resolve) => {
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
                    };

                    loadAllPages();
                }).catch(error => console.error("Error cargando PDF:", error));

                document.getElementById("prev-page").addEventListener("click", () => pageFlip?.flipPrev());
                document.getElementById("next-page").addEventListener("click", () => pageFlip?.flipNext());
                // document.getElementById("download-pdf").addEventListener("click", () => {
                //     window.location.href = pdfUrl;
                // });

                // Función para ir a la página específica
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

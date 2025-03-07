@extends('layouts.app')

@section('content')
  <div class="container mt-4">
    <div class="controls">
      <button id="prev-page">◀ Anterior</button>
      <span id="page-num">Página: 1-2</span>
      <button id="next-page">Siguiente ▶</button>
    </div>

    <div id="pdf-container">
      <div id="flipbook"></div>
    </div>
  </div>
@endsection

@push('js')
  <script>
    import "turn.js";
    import {
      getDocument
    } from "pdfjs-dist";

    const pdfUrl = "{{ asset('pdfs/catalogo.pdf') }}"; // Ruta del PDF desde Laravel storage
    let pdfDoc = null,
      pageNum = 1,
      totalPages = 0;

    getDocument(pdfUrl).promise.then(pdf => {
      pdfDoc = pdf;
      totalPages = pdf.numPages;
      loadPages();
    });

    function loadPages() {
      const flipbook = $("#flipbook");
      flipbook.html("");

      for (let i = 1; i <= totalPages; i++) {
        const canvas = document.createElement("canvas");
        canvas.classList.add("page");
        flipbook.append(canvas);

        pdfDoc.getPage(i).then(page => {
          const viewport = page.getViewport({
            scale: 1.5
          });
          canvas.width = viewport.width;
          canvas.height = viewport.height;
          const ctx = canvas.getContext("2d");

          page.render({
            canvasContext: ctx,
            viewport
          });
        });
      }

      setTimeout(() => {
        flipbook.turn({
          width: 900,
          height: 600,
          autoCenter: true,
          display: "double"
        });
      }, 2000);
    }

    $("#prev-page").click(() => $("#flipbook").turn("previous"));
    $("#next-page").click(() => $("#flipbook").turn("next"));
  </script>
@endpush

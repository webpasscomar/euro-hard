@extends('layouts.app')

@section('content')
<div class="container-fluid position-relative d-flex justify-content-center align-items-center"
     style="height: 100vh; background:#f5f5f5; overflow:hidden;">

    <!-- LOADER -->
    <div id="loader" class="d-flex flex-column align-items-center">
        <div class="spinner"></div>
        <p id="progressText" class="mt-3">Cargando 0%</p>
        <div class="progress-bar-container">
            <div id="progressBar" class="progress-bar-fill"></div>
        </div>
    </div>

    <!-- TOOLBAR -->
    <div id="controls" class="toolbar" style="display:none;">
        <button id="prev">⟨</button>
        <span id="pageInfo">1 / 1</span>
        <button id="next">⟩</button>

        <div class="separator"></div> 
        <button id="resetZoom">Reset</button>

        <div class="separator"></div>

        <button id="fullscreen">⛶</button>
    </div>

    <!-- LIBRO -->
    <div id="book" style="display:none;"></div>

</div>
@endsection


@push('js')

<!-- PDF.js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/3.11.174/pdf.min.js"></script>

<script>
pdfjsLib.GlobalWorkerOptions.workerSrc =
    "https://cdnjs.cloudflare.com/ajax/libs/pdf.js/3.11.174/pdf.worker.min.js";
</script>
<!-- StPageFlip -->
<script src="https://unpkg.com/page-flip/dist/js/page-flip.browser.js"></script>

<style>
#book {
    width: 1000px;
    height: 700px;
}
#loader{
    position:absolute;
    top:50%;
    left:50%;
    transform:translate(-50%,-50%);
}
.spinner {
    width: 50px;
    height: 50px;
    border: 5px solid #ddd;
    border-top: 5px solid #333;
    border-radius: 50%;
    animation: spin 1s linear infinite;
}
@keyframes spin {
    100% { transform: rotate(360deg); }
}

.progress-bar-container {
    width: 200px;
    height: 6px;
    background: #ddd;
    border-radius: 3px;
    overflow: hidden;
}
.progress-bar-fill {
    height: 100%;
    width: 0%;
    background: #333;
    transition: width 0.3s ease;
}

.toolbar {
    position:absolute;
    top:15px;
    left:50%;
    transform:translateX(-50%);
    display:flex;
    align-items:center;
    gap:10px;
    background:rgba(0,0,0,0.7);
    padding:8px 15px;
    border-radius:30px;
    color:white;
    z-index:20;
}
.toolbar button {
    background:none;
    border:none;
    color:white;
    font-size:16px;
    cursor:pointer;
}
.toolbar button:hover {
    opacity:0.7;
}
.separator {
    width:1px;
    height:18px;
    background:rgba(255,255,255,0.4);
}
</style>

<script>
document.addEventListener("DOMContentLoaded", async function () {

    const loader = document.getElementById("loader");
    const bookEl = document.getElementById("book");
    const controls = document.getElementById("controls");

    const progressBar = document.getElementById("progressBar");
    const progressText = document.getElementById("progressText");

    const pdfUrl = "{{ asset('storage/' . $catalog->pdf) }}";

    let zoomLevel = 0.8;
    const zoomStep = 0.1;

    const pdf = await pdfjsLib.getDocument(pdfUrl).promise;

    const pageFlip = new St.PageFlip(bookEl, {
        width: 500,
        height: 700,
        showCover: true,
        size: "fixed",
        usePortrait: true,
        showPageCorners: true,
        maxShadowOpacity: 0.5
    });

    let images = [];

    for (let i = 1; i <= pdf.numPages; i++) {

        const page = await pdf.getPage(i);
        const viewport = page.getViewport({ scale: 1.5 });

        const canvas = document.createElement("canvas");
        const context = canvas.getContext("2d");

        canvas.width = viewport.width;
        canvas.height = viewport.height;

        await page.render({
            canvasContext: context,
            viewport: viewport
        }).promise;

        images.push(canvas.toDataURL());

        // actualizar progreso real
        let percent = Math.round((i / pdf.numPages) * 100);
        progressBar.style.width = percent + "%";
        progressText.innerText = "Cargando " + percent + "%";
    }

    pageFlip.loadFromImages(images);

    // Mostrar libro
    setTimeout(() => {
        loader.style.display = "none";
        bookEl.style.display = "block";
        controls.style.display = "flex";
        bookEl.style.transform = `scale(${zoomLevel})`;
        document.getElementById("pageInfo").innerText = "1 / " + pdf.numPages;
    }, 400);

    // Navegación
    document.getElementById("next").addEventListener("click", () => {
        pageFlip.flipNext();
    });

    document.getElementById("prev").addEventListener("click", () => {
        pageFlip.flipPrev();
    });

    pageFlip.on("flip", (e) => {
        document.getElementById("pageInfo").innerText =
            (e.data + 1) + " / " + pdf.numPages;
    });

    // Zoom
    document.getElementById("zoomIn").addEventListener("click", () => {
        zoomLevel += zoomStep;
        bookEl.style.transform = `scale(${zoomLevel})`;
    });

    document.getElementById("zoomOut").addEventListener("click", () => {
        if (zoomLevel > 0.4) {
            zoomLevel -= zoomStep;
            bookEl.style.transform = `scale(${zoomLevel})`;
        }
    });

    document.getElementById("resetZoom").addEventListener("click", () => {
        zoomLevel = 0.8;
        bookEl.style.transform = `scale(${zoomLevel})`;
    });

    // Fullscreen
    document.getElementById("fullscreen").addEventListener("click", () => {
        if (!document.fullscreenElement) {
            bookEl.requestFullscreen();
        } else {
            document.exitFullscreen();
        }
    });

});
</script>

@endpush
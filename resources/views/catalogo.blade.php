@extends('layouts.app')

@section('content')
<div class="container-fluid position-relative d-flex justify-content-center align-items-center"
     style="height:100vh;background:#f5f5f5;overflow:hidden;">

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

        <button id="prev"><i class="bi bi-chevron-left"></i></button>
        <span id="pageInfo">1 / 1</span>
        <button id="next"><i class="bi bi-chevron-right"></i></button>

        <div class="separator"></div>

        <button id="zoomOut"><i class="bi bi-zoom-out"></i></button>
        <button id="zoomIn"><i class="bi bi-zoom-in"></i></button>
        <button id="resetZoom"><i class="bi bi-aspect-ratio"></i></button>

        <div class="separator"></div>

        <button id="download"><i class="bi bi-download"></i></button>

        <div class="separator"></div>

        <button id="fullscreen"><i class="bi bi-fullscreen"></i></button>

    </div>

    <!-- BOOK -->
    <div id="book" style="display:none;"></div>

    <!-- THUMBNAILS -->
    <div id="thumbnails"></div>

</div>
@endsection


@push('js')

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">

<script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/3.11.174/pdf.min.js"></script>

<script>
pdfjsLib.GlobalWorkerOptions.workerSrc =
"https://cdnjs.cloudflare.com/ajax/libs/pdf.js/3.11.174/pdf.worker.min.js";
</script>

<script src="https://unpkg.com/page-flip/dist/js/page-flip.browser.js"></script>

<style>

#book{
width:1000px;
height:700px;
}

#loader{
position:absolute;
top:50%;
left:50%;
transform:translate(-50%,-50%);
}

.spinner{
width:50px;
height:50px;
border:5px solid #ddd;
border-top:5px solid #333;
border-radius:50%;
animation:spin 1s linear infinite;
}

@keyframes spin{
100%{transform:rotate(360deg);}
}

.progress-bar-container{
width:200px;
height:6px;
background:#ddd;
border-radius:3px;
overflow:hidden;
}

.progress-bar-fill{
height:100%;
width:0%;
background:#333;
transition:width .3s ease;
}

.toolbar{
position:absolute;
top:15px;
left:50%;
transform:translateX(-50%);
display:flex;
align-items:center;
gap:10px;
background:rgba(0,0,0,.7);
padding:8px 15px;
border-radius:30px;
color:white;
z-index:20;
}

.toolbar button{
background:none;
border:none;
color:white;
font-size:18px;
cursor:pointer;
}

.toolbar button:hover{
opacity:.7;
}

.separator{
width:1px;
height:18px;
background:rgba(255,255,255,.4);
}

#thumbnails{
position:absolute;
bottom:20px;
left:50%;
transform:translateX(-50%);
display:flex;
gap:6px;
overflow-x:auto;
max-width:90%;
}

#thumbnails img{
width:60px;
cursor:pointer;
opacity:.6;
border-radius:4px;
}

#thumbnails img:hover{
opacity:1;
}

</style>


<script>

document.addEventListener("DOMContentLoaded", async function(){

const loader = document.getElementById("loader");
const bookEl = document.getElementById("book");
const controls = document.getElementById("controls");

const progressBar = document.getElementById("progressBar");
const progressText = document.getElementById("progressText");

const pdfUrl = "{{ asset('storage/' . $catalog->pdf) }}";

let zoomLevel = .8;
const zoomStep = .1;

const pdf = await pdfjsLib.getDocument(pdfUrl).promise;

const totalPages = pdf.numPages;

const pageFlip = new St.PageFlip(bookEl,{
width:500,
height:700,
showCover:true,
size:"fixed",
usePortrait:true
});

const renderedPages = {};


// ---------- THUMBNAILS ----------
async function renderThumbnail(pageNumber){

const page = await pdf.getPage(pageNumber);

const viewport = page.getViewport({scale:.25});

const canvas = document.createElement("canvas");
const context = canvas.getContext("2d");

canvas.width = viewport.width;
canvas.height = viewport.height;

await page.render({
canvasContext:context,
viewport:viewport
}).promise;

const thumb = document.createElement("img");

thumb.src = canvas.toDataURL();

thumb.onclick = ()=>{
pageFlip.flip(pageNumber-1);
};

document.getElementById("thumbnails").appendChild(thumb);

}


// ---------- RENDER PAGE ----------
async function renderPage(pageNumber){

if(renderedPages[pageNumber]) return;

const page = await pdf.getPage(pageNumber);

const viewport = page.getViewport({scale:1.5});

const canvas = document.createElement("canvas");
const context = canvas.getContext("2d");

canvas.width = viewport.width;
canvas.height = viewport.height;

await page.render({
canvasContext:context,
viewport:viewport
}).promise;

renderedPages[pageNumber] = canvas.toDataURL();

pageFlip.updateFromImages(Object.values(renderedPages));

}


// ---------- INITIAL LOAD ----------
let firstPages = Math.min(6,totalPages);

for(let i=1;i<=firstPages;i++){

const page = await pdf.getPage(i);

const viewport = page.getViewport({scale:1.5});

const canvas = document.createElement("canvas");
const context = canvas.getContext("2d");

canvas.width = viewport.width;
canvas.height = viewport.height;

await page.render({
canvasContext:context,
viewport:viewport
}).promise;

renderedPages[i] = canvas.toDataURL();

let percent = Math.round((i/firstPages)*100);

progressBar.style.width = percent+"%";
progressText.innerText = "Cargando "+percent+"%";

}

pageFlip.loadFromImages(Object.values(renderedPages));


// ---------- GENERATE THUMBNAILS ----------
for(let i=1;i<=totalPages;i++){

setTimeout(()=>renderThumbnail(i),i*30);

}


// ---------- SHOW BOOK ----------
setTimeout(()=>{

loader.style.display="none";
bookEl.style.display="block";
controls.style.display="flex";

bookEl.style.transform=`scale(${zoomLevel})`;

document.getElementById("pageInfo").innerText =
"1 / "+totalPages;

},400);


// ---------- NAVIGATION ----------
document.getElementById("next").onclick=()=>pageFlip.flipNext();
document.getElementById("prev").onclick=()=>pageFlip.flipPrev();

pageFlip.on("flip",(e)=>{

const currentPage = e.data+1;

document.getElementById("pageInfo").innerText =
currentPage+" / "+totalPages;

renderPage(currentPage+1);
renderPage(currentPage+2);

});


// ---------- ZOOM ----------
document.getElementById("zoomIn").onclick=()=>{

zoomLevel+=zoomStep;

bookEl.style.transform=`scale(${zoomLevel})`;

};

document.getElementById("zoomOut").onclick=()=>{

if(zoomLevel>.4){

zoomLevel-=zoomStep;

bookEl.style.transform=`scale(${zoomLevel})`;

}

};

document.getElementById("resetZoom").onclick=()=>{

zoomLevel=.8;

bookEl.style.transform=`scale(${zoomLevel})`;

};


// ---------- MOUSE ZOOM ----------
bookEl.addEventListener("wheel",function(e){

e.preventDefault();

if(e.deltaY<0) zoomLevel+=zoomStep;
else zoomLevel-=zoomStep;

zoomLevel=Math.max(.4,Math.min(2,zoomLevel));

bookEl.style.transform=`scale(${zoomLevel})`;

});


// ---------- DOWNLOAD ----------
document.getElementById("download").onclick=()=>{

const link=document.createElement("a");

link.href=pdfUrl;
link.download="catalogo.pdf";

document.body.appendChild(link);

link.click();

document.body.removeChild(link);

};


// ---------- FULLSCREEN ----------
document.getElementById("fullscreen").onclick=()=>{

if(!document.fullscreenElement)
bookEl.requestFullscreen();
else
document.exitFullscreen();

};

});
</script>

@endpush
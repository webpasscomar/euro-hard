<div
    x-data="{
        progress: 0,
        isUploading: false
    }"
    x-on:livewire-upload-start="isUploading = true"
    x-on:livewire-upload-finish="isUploading = false; progress = 0"
    x-on:livewire-upload-error="isUploading = false; progress = 0"
    x-on:livewire-upload-progress="progress = $event.detail.progress"
>
    {{-- PDF --}}
    <div class="form-group mb-3">
        <label for="pdf" class="form-label">Archivo (PDF)</label>
        <small class="ms-2">(Máximo permitido: 30mb)</small>
        <input type="file" name="pdf" class="form-control" wire:model='pdf' accept="application/pdf">

        @error('pdf')
            <span class="ms-1 text-danger">{{ $message }}</span>
        @enderror

        {{-- Indicador de carga con spinner y porcentaje --}}
        <div x-show="isUploading" class="mt-2">
            <span class="spinner-border spinner-border-sm text-primary" role="status" aria-hidden="true"></span>
            Subiendo archivo... <span x-text="progress"></span>%
            <progress class="ms-2" max="100" x-bind:value="progress"></progress>
        </div>

        {{-- Mensaje cuando el archivo ya está cargado --}}
        @if ($pdf)
            <span class="text-success mt-1 d-block">Archivo cargado con éxito</span>
        @endif
    </div>

    <div class="text-right my-4">
        <button type="submit" class="btn btn-outline-primary" wire:click='updatePdf'>
            <i class="fas fa-save"></i> Actualizar
        </button>
    </div>
</div>
<div>
    {{-- PDF --}}
    <div class="form-group mb-3">
        <label for="pdf" class="form-label">Archivo (PDF)</label><small class="ms-2">(Máximo permitido: 30mb)</small>
        <input type="file" name="pdf" class="form-control" wire:model='pdf' accept="application/pdf">

        @error('pdf')
            <span class="ms-1 text-danger">{{ $message }}</span>
        @enderror

        @if ($pdf)
            <progress class="mt-1" max="100" value="{{ $pdf->getSize() / 30720 * 100 }}"></progress>
            <span>Archivo cargado con éxito</span>
        @endif
     
    </div>

    <div class="text-right my-4">
        <button type="submit" class="btn btn-outline-primary" wire:click='updatePdf'>
            <i class="fas fa-save"></i> Actualizar
        </button>
    </div>
</div>

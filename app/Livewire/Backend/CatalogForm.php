<?php

namespace App\Livewire\Backend;

use App\Models\Catalog;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;
use Throwable;

class CatalogForm extends Component
{
    use WithFileUploads;

        public $pdf;


    protected function rules(): array
    {
        return [
            'pdf' => 'nullable|file|mimes:pdf|max:30720', // Max 30MB
        ];
    }
    
    protected function messages(): array
    {
        return [
            'pdf.mimes' => 'El archivo debe ser un PDF.',
            'pdf.max' => 'El archivo no debe exceder los 30 MB.',
        ];
    }
  
    public function render():View
    {
        return view('livewire.backend.catalog-form');
    }


    // Actualizar el catalogo
    public function updatePdf()
    {
        $this->validate();

        if ($this->pdf) {
            $name = $this->pdf->getClientOriginalName();

            // Buscar el registro actual y eliminar el PDF anterior si existe
            $catalog = Catalog::find(1);
            if ($catalog && $catalog->pdf && Storage::disk('public')->exists('pdfs/' . $catalog->pdf)) {
                Storage::disk('public')->delete('pdfs/' . $catalog->pdf);
            }

            $this->pdf->storeAs('pdfs', $name);

            try {
                Catalog::updateOrCreate(
                    ['id' => 1],
                    [   'title' => 'catalogo productos',
                        'pdf' => $name,
                        'status' => 1
                    ]
                );
                toast('El catálogo se actualizó correctamente', 'success');
                $this->redirect(route('admin.catalogs.index'));
            } catch (\Throwable $th) {
                toast('No se pudo actualizar el catálogo', 'error');
                $this->redirect(route('admin.catalogs.index'));
            }
        }

        toast('No hubo cambios en el catálogo', 'success');
        $this->redirect(route('admin.catalogs.index'));
    }
}

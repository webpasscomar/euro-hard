<?php

namespace App\Livewire\Components;

use App\Models\Product;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class DeleteImage extends Component
{

    public string $field;
    public Product $product;

    public function mount($field, $product)
    {
        $this->field = $field;
        $this->product = $product;
    }
    public function render()
    {
        return view('livewire.components.delete-image');
    }

    public function delete(): void
    {
        if (! in_array($this->field, ['image_main', 'image_1', 'image_2', 'image_3', 'image_4', 'image_5', 'image_6'], true)) {
            abort(404);
        }

        $image = $this->product->{$this->field};
        if (filled($image) && Storage::disk('public')->exists('products/' . $image)) {
            Storage::disk('public')->delete('products/' . $image);
        }

        $this->product->update([
            $this->field => null
        ]);

        toast('La imágen se eliminó correctamente', 'success');
        $this->redirect(route('admin.products.edit', $this->product));
    }
}

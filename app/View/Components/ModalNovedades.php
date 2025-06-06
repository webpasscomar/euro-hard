<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ModalNovedades extends Component
{

    public $id;
    public $title, $description, $image;
    /**
     * Create a new component instance.
     */
    public function __construct($id, $title, $description, $image)
    {
        $this->id = $id;
        $this->title = $title;
        $this->description = $description;
        $this->image = $image;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.modal-novedades');
    }
}

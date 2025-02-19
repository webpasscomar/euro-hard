<?php

  namespace App\View\Components;

  use Closure;
  use Illuminate\Contracts\View\View;
  use Illuminate\View\Component;

  class ModalYoutube extends Component
  {
    public $id, $videoUrl;

    public function __construct($videoUrl, $id)
    {
      $this->videoUrl = $videoUrl;
      $this->id = $id;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
      return view('components.modal-youtube', [
        'videoUrl' => $this->videoUrl,
        'id' => $this->id,
      ]);
    }
  }

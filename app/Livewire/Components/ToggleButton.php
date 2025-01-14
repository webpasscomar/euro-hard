<?php

  namespace App\Livewire\Components;

  use Illuminate\Database\Eloquent\Model;
  use Livewire\Component;

  class ToggleButton extends Component
  {
    public Model $model;
    public string $field;
    public bool $active;

    public function mount()
    {
      $this->active = (bool)$this->model->getAttribute($this->field);
    }

    public function render()
    {
      return view('livewire.components.toggle-button');
    }

    public function updating($field, $value)
    {
      $this->model->setAttribute($this->field, $value);
      $this->model->save();

      $this->dispatch('change-active');
    }
  }

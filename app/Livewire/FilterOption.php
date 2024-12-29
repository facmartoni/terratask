<?php

  namespace App\Livewire;

  use Illuminate\Contracts\View\Factory;
  use Illuminate\Foundation\Application;
  use Illuminate\View\View;
  use Livewire\Attributes\On;
  use Livewire\Component;

  class FilterOption extends Component {
    public bool $focused = false;

    #[On('filter-option:mouseover')]
    public function focus_option(): void {
      $this->focused = true;
    }

    #[On('filter-option:mouseout')]
    public function dont_focus_option(): void {
      $this->focused = false;
    }

    public function render(): Application|Factory|\Illuminate\Contracts\View\View|View {
      return view('livewire.filter-option');
    }
  }

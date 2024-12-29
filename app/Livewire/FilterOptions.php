<?php

  namespace App\Livewire;

  use Illuminate\Contracts\View\Factory;
  use Illuminate\Foundation\Application;
  use Illuminate\View\View;
  use Livewire\Attributes\On;
  use Livewire\Component;

  class FilterOptions extends Component {

    public bool $toggle_options = false;

    #[On('toggle-filter-options')]
    public function display_options(): void {
      $this->toggle_options = !$this->toggle_options;
    }

    public function render(): Application|Factory|\Illuminate\Contracts\View\View|View {
      return view('livewire.filter-options');
    }
  }

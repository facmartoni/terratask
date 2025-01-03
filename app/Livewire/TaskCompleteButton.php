<?php

  namespace App\Livewire;

  use Illuminate\Contracts\View\Factory;
  use Illuminate\Contracts\View\View;
  use Illuminate\Foundation\Application;
  use Livewire\Attributes\Reactive;
  use Livewire\Component;

  class TaskCompleteButton extends Component {
    #[Reactive]
    public bool $completed;

    public function render(): Application|Factory|View|\Illuminate\View\View {
      return view('livewire.task-complete-button');
    }
  }

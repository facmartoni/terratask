<?php

  namespace App\Livewire;

  use Illuminate\Contracts\View\Factory;
  use Illuminate\Foundation\Application;
  use Illuminate\View\View;
  use Livewire\Component;

  class TaskPrioritySelector extends Component {
    public string $selected_priority = 'low';

    public function select_priority(string $priority): void {
      $this->selected_priority = $priority;
    }

    public function render(): Application|Factory|\Illuminate\Contracts\View\View|View {
      return view('livewire.task-priority-selector');
    }
  }

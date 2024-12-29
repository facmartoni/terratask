<?php

  namespace App\Livewire;

  use App\Models\Task;
  use Illuminate\Contracts\View\Factory;
  use Illuminate\Contracts\View\View;
  use Illuminate\Foundation\Application;
  use Livewire\Component;

  class TasksList extends Component {
    public function render(): Application|Factory|View|\Illuminate\View\View {
      return view('livewire.tasks-list', [
        'tasks' => Task::with(['author', 'assignee'])->get()
      ]);
    }
  }

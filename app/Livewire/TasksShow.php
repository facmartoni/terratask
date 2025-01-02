<?php

  namespace App\Livewire;

  use App\Models\Task;
  use Illuminate\Contracts\View\Factory;
  use Illuminate\Foundation\Application;
  use Illuminate\View\View;
  use Livewire\Attributes\Layout;
  use Livewire\Component;

  #[Layout('layouts.app')]
  class TasksShow extends Component {
    public Task $task;

    public function mount($task): void {
      $this->task = $task;
    }

    public function render(): Application|Factory|\Illuminate\Contracts\View\View|View {
      return view('livewire.tasks-show');
    }
  }

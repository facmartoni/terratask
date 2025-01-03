<?php

  namespace App\Livewire;

  use App\Models\Task;
  use Illuminate\Contracts\View\Factory;
  use Illuminate\Foundation\Application;
  use Illuminate\View\View;
  use Livewire\Attributes\Layout;
  use Livewire\Attributes\On;
  use Livewire\Component;

  #[Layout('layouts.app')]
  class TasksShow extends Component {
    public Task $task;

    public function mount($task): void {
      $this->task = $task;
    }

    #[On('task:toggle-complete')]
    public function toggle_complete(): void {
      $this->task->completed = !$this->task->completed;
      $this->task->save();
    }

    public function render(): Application|Factory|\Illuminate\Contracts\View\View|View {
      return view('livewire.tasks-show');
    }
  }

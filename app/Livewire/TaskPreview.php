<?php

  namespace App\Livewire;

  use App\Models\Task;
  use Illuminate\Contracts\View\Factory;
  use Illuminate\Foundation\Application;
  use Illuminate\View\View;
  use Livewire\Component;

  class TaskPreview extends Component {
    public Task $task;

    public function render(): Application|Factory|\Illuminate\Contracts\View\View|View {
      return view('livewire.task-preview');
    }
  }

<?php

  namespace App\Livewire;

  use App\Models\Task;
  use Illuminate\Contracts\View\Factory;
  use Illuminate\Contracts\View\View;
  use Illuminate\Foundation\Application;
  use Livewire\Component;

  class CommentsBox extends Component {
    public Task $task;

    public function render(): Application|Factory|View|\Illuminate\View\View {
      return view('livewire.comments-box');
    }
  }

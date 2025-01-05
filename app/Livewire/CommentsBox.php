<?php

  namespace App\Livewire;

  use App\Models\Task;
  use Illuminate\Contracts\View\Factory;
  use Illuminate\Contracts\View\View;
  use Illuminate\Database\Eloquent\Collection;
  use Illuminate\Foundation\Application;
  use Livewire\Attributes\On;
  use Livewire\Component;

  class CommentsBox extends Component {
    public Collection $comments;
    public Task $task;

    public function mount(Task $task): void {
      $this->task = $task;
      $this->comments = $task->comments;
    }

    #[On('comment-posted')]
    public function update_comments_list(): void {
      $this->comments = $this->task->comments;
    }

    public function render(): Application|Factory|View|\Illuminate\View\View {
      return view('livewire.comments-box');
    }
  }

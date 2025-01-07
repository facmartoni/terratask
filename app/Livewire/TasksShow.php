<?php

  namespace App\Livewire;

  use App\Models\Comment;
  use App\Models\Task;
  use Illuminate\Contracts\View\Factory;
  use Illuminate\Foundation\Application;
  use Illuminate\View\View;
  use Laravel\Jetstream\InteractsWithBanner;
  use Livewire\Attributes\Layout;
  use Livewire\Attributes\On;
  use Livewire\Component;

  #[Layout('layouts.app')]
  class TasksShow extends Component {
    use InteractsWithBanner;

    public Task $task;
    public bool $request_for_comment = false;
    public ?Comment $requested_comment;

    public function mount($task): void {
      $this->task = $task;
    }

    #[On('task:toggle-complete')]
    public function toggle_complete(): void {
      $this->task->completed = !$this->task->completed;
      $this->task->save();
    }

    #[On('create-comment')]
    public function prepare_comment_creation(?Comment $reply_to): void {
      $this->request_for_comment = true;
      $this->requested_comment = $reply_to->exists ? $reply_to : null;
    }

    #[On('close-create-comment-box')]
    public function hide_create_comment_box(): void {
      $this->request_for_comment = false;
    }

    #[On('comment-posted')]
    public function banner_message_comment_posted(): void {
      $this->request_for_comment = false;
      unset($this->requested_comment);
      $this->banner('Comentario Publicado!');
    }

    public function render(): Application|Factory|\Illuminate\Contracts\View\View|View {
      return view('livewire.tasks-show');
    }
  }

<?php

  namespace App\Livewire;

  use App\Livewire\Forms\CommentForm;
  use App\Models\Comment;
  use App\Models\Task;
  use Illuminate\Contracts\View\Factory;
  use Illuminate\Database\Eloquent\Collection;
  use Illuminate\Foundation\Application;
  use Illuminate\Support\Facades\Auth;
  use Illuminate\View\View;
  use Livewire\Component;

  class CreateCommentBox extends Component {
    public Task $task;
    public ?Comment $to = null;
    public CommentForm $form;

    // public function mount(Comment $comment): void {
    //   $this->form->setComment($comment);
    // }

    public function save(): void {
      $this->form->task_id = $this->task->id;
      $this->form->parent_id = $this->to ? $this->root_comment_id($this->to) : null;
      $this->form->author_id = Auth::id();
      $this->form->store();
      $this->dispatch('comment-posted');
    }

    protected function root_comment_id(Comment|Collection $comment): int {
      if (!$comment->parent_id) {
        return $comment->id;
      } else {
        return $this->root_comment_id(Comment::find($comment->parent_id));
      }
    }

    public function render(): Application|Factory|\Illuminate\Contracts\View\View|View {
      return view('livewire.create-comment-box');
    }
  }

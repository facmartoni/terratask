<?php

  namespace App\Livewire;

  use App\Models\Like;
  use Illuminate\Contracts\View\Factory;
  use Illuminate\Foundation\Application;
  use Illuminate\Support\Facades\Auth;
  use Illuminate\View\View;
  use Livewire\Attributes\Computed;
  use Livewire\Attributes\On;
  use Livewire\Component;

  class Comment extends Component {
    public \App\Models\Comment $comment;

    #[Computed]
    public function liked(): bool {
      return $this->comment->likes->contains('id', Auth::user()->id);
    }

    #[On('comment.{comment.id}:like')]
    public function toggle_like(): void {
      if (!$this->liked()) {
        Like::create([
          'user_id' => Auth::id(),
          'comment_id' => $this->comment->id
        ]);
      } else {
        Like
          ::whereUserId(Auth::id())
          ->whereCommentId($this->comment->id)
          ->delete();
      }
    }

    public function render(): Application|Factory|\Illuminate\Contracts\View\View|View {
      return view('livewire.comment');
    }
  }

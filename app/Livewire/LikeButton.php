<?php

  namespace App\Livewire;

  use App\Models\Like;
  use Illuminate\Contracts\View\Factory;
  use Illuminate\Contracts\View\View;
  use Illuminate\Foundation\Application;
  use Illuminate\Support\Facades\Auth;
  use Livewire\Component;

  class LikeButton extends Component {
    public \App\Models\Comment $comment;
    public int $n_likes;
    public bool $liked;

    public function mount(): void {
      $this->n_likes = $this->comment->likes->count();
      $this->liked = $this->comment->likes->contains('id', Auth::user()->id);
    }

    public function toggle_like(): void {
      if (!$this->liked) {
        $this->like_comment();
        $this->n_likes++;
      } else {
        $this->dislike_comment();
        $this->n_likes--;
      }
      $this->liked = !$this->liked;
    }

    protected function like_comment(): void {
      Like::create([
        'user_id' => Auth::id(),
        'comment_id' => $this->comment->id
      ]);
    }

    protected function dislike_comment(): void {
      Like
        ::whereUserId(Auth::id())
        ->whereCommentId($this->comment->id)
        ->delete();
    }

    public function render(): Application|Factory|View|\Illuminate\View\View {
      return view('livewire.like-button');
    }
  }

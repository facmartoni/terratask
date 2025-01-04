<?php

  namespace App\Livewire;

  use Illuminate\Contracts\View\Factory;
  use Illuminate\Contracts\View\View;
  use Illuminate\Foundation\Application;
  use Livewire\Attributes\Reactive;
  use Livewire\Component;

  class LikeButton extends Component {
    #[Reactive]
    public bool $liked;
    public int $comment_id;
    #[Reactive]
    public int $n_likes;

    public function like_comment(): void {
      $this->dispatch("comment.{$this->comment_id}:like");
    }

    public function render(): Application|Factory|View|\Illuminate\View\View {
      return view('livewire.like-button');
    }
  }

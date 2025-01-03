<?php

  namespace App\Livewire;

  use Illuminate\Contracts\View\Factory;
  use Illuminate\Foundation\Application;
  use Illuminate\Support\Facades\Auth;
  use Illuminate\View\View;
  use Livewire\Attributes\Computed;
  use Livewire\Component;

  class Comment extends Component {
    public \App\Models\Comment $comment;

    #[Computed]
    public function liked(): bool {
      return $this->comment->likes->contains('id', Auth::user()->id);
    }

    public function render(): Application|Factory|\Illuminate\Contracts\View\View|View {
      return view('livewire.comment');
    }
  }

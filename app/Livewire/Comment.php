<?php

  namespace App\Livewire;

  use Illuminate\Contracts\View\Factory;
  use Illuminate\Foundation\Application;
  use Illuminate\View\View;
  use Livewire\Component;

  class Comment extends Component {
    public \App\Models\Comment $comment;

    public function create_comment(): void {
      $this->dispatch('create-comment', reply_to: $this->comment);
    }

    public function render(): Application|Factory|\Illuminate\Contracts\View\View|View {
      return view('livewire.comment');
    }
  }

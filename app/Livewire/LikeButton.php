<?php

  namespace App\Livewire;

  use Illuminate\Contracts\View\Factory;
  use Illuminate\Contracts\View\View;
  use Illuminate\Foundation\Application;
  use Livewire\Component;

  class LikeButton extends Component {
    public bool $liked = true;
    public int $n_likes = 0;

    public function render(): Application|Factory|View|\Illuminate\View\View {
      return view('livewire.like-button');
    }
  }

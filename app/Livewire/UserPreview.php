<?php

  namespace App\Livewire;

  use App\Models\User;
  use Illuminate\Contracts\View\Factory;
  use Illuminate\Foundation\Application;
  use Illuminate\View\View;
  use Livewire\Component;

  class UserPreview extends Component {
    public User $user;

    public function render(): Application|Factory|\Illuminate\Contracts\View\View|View {
      return view('livewire.user-preview');
    }
  }

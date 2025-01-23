<?php

  namespace App\Livewire;

  use App\Models\User;
  use Illuminate\Contracts\View\Factory;
  use Illuminate\Foundation\Application;
  use Illuminate\View\View;
  use Livewire\Attributes\Layout;
  use Livewire\Attributes\On;
  use Livewire\Component;

  #[Layout('layouts.app')]
  class App extends Component {

    // The dispatched data will be read in the entry point, app.js, for caching them with localforage.
    #[On('app-online')]
    public function get_users_list(): void {
      $users = User::get(['id', 'name'])->toArray();
      $this->dispatch('ready-to-cache-users', [
        'users' => $users
      ]);
    }

    public function render(): Application|Factory|\Illuminate\Contracts\View\View|View {
      return view('livewire.app');
    }
  }

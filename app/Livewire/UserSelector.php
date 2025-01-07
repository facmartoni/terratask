<?php

  namespace App\Livewire;

  use App\Models\User;
  use Illuminate\Contracts\View\Factory;
  use Illuminate\Foundation\Application;
  use Illuminate\View\View;
  use Livewire\Component;

  class UserSelector extends Component {
    public bool $users_list_visible = false;
    public ?User $selected_user = null;
    public User $user;


    public function toggle_show_users_list(): void {
      $this->users_list_visible = !$this->users_list_visible;
    }

    public function select_user(User $user): void {
      $this->selected_user = $user;
      $this->users_list_visible = false;
      $this->dispatch('assign-task-to', $user);
    }

    public function render(): Application|Factory|\Illuminate\Contracts\View\View|View {
      return view('livewire.user-selector', [
        'users' => User::all()
      ]);
    }
  }

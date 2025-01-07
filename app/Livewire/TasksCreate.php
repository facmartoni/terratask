<?php

  namespace App\Livewire;

  use App\Models\User;
  use Illuminate\Contracts\View\Factory;
  use Illuminate\Contracts\View\View;
  use Illuminate\Foundation\Application;
  use Livewire\Attributes\Layout;
  use Livewire\Attributes\On;
  use Livewire\Component;

  #[Layout('layouts.app')]
  class TasksCreate extends Component {
    public User|array|null $assigned_to = null;

    #[On('assign-task-to')]
    public function assign_to($user): void {
      $this->assigned_to = $user;
    }

    public function render(): Application|Factory|View|\Illuminate\View\View {
      return view('livewire.tasks-create');
    }
  }

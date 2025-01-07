<?php

  namespace App\Livewire;

  use App\Models\User;
  use Illuminate\Contracts\View\Factory;
  use Illuminate\Foundation\Application;
  use Illuminate\Support\Collection;
  use Illuminate\View\View;
  use Livewire\Attributes\Layout;
  use Livewire\Attributes\On;
  use Livewire\Component;

  #[Layout('layouts.app')]
  class UserDetail extends Component {
    public User $user;
    public Collection $tasks;
    public Collection $tasks_assigned;
    public Collection $tasks_authored;
    public string $current = 'assigned';

    public function mount(User $user): void {
      $this->user = $user;
      $this->tasks_assigned = $this->user->assigned_tasks()->get();
      $this->tasks_authored = $this->user->authored_tasks()->get();
      $this->tasks =
        $this->current === 'assigned' ?
          $this->tasks_assigned :
          $this->tasks_authored;
    }

    #[On('show-authored-tasks')]
    public function prepare_authored_tasks(): void {
      $this->current = 'authored';
      $this->tasks = $this->tasks_authored;
    }

    #[On('show-assigned-tasks')]
    public function prepare_assigned_tasks(): void {
      $this->current = 'assigned';
      $this->tasks = $this->tasks_assigned;
    }

    public function render(): Application|Factory|\Illuminate\Contracts\View\View|View {
      return view('livewire.user-detail');
    }
  }

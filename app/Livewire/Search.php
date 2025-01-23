<?php

  namespace App\Livewire;

  use App\Models\Task;
  use App\Models\User;
  use Illuminate\Contracts\View\Factory;
  use Illuminate\Contracts\View\View;
  use Illuminate\Foundation\Application;
  use Illuminate\Support\Collection;

  class Search extends App {
    public string $q;
    public ?Collection $tasks_results = null;
    public ?Collection $users_results = null;

    public function updatedQ(): void {
      if (strlen($this->q) !== 0) {
        $this->tasks_results = Task
          ::where('title', 'like', "%{$this->q}%")
          ->orWhere('description', 'like', "%{$this->q}%")
          ->orWhereHas('author', function ($query) {
            $query->where('name', 'like', "%{$this->q}%");
          })
          ->orWhereHas('assignee', function ($query) {
            $query->where('name', 'like', "%{$this->q}%");
          })
          ->get();

        $this->users_results = User
          ::where('name', 'like', "%{$this->q}%")
          ->orWhere('role', 'like', "%{$this->q}%")
          ->get();
      } else {
        $this->tasks_results = null;
        $this->users_results = null;
      }
    }

    public function render(): Application|Factory|View|\Illuminate\View\View {
      return view('livewire.search');
    }
  }

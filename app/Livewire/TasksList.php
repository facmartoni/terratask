<?php

  namespace App\Livewire;

  use App\Models\Task;
  use Illuminate\Contracts\View\Factory;
  use Illuminate\Contracts\View\View;
  use Illuminate\Foundation\Application;
  use Illuminate\Support\Collection;
  use Livewire\Attributes\On;
  use Livewire\Component;

  class TasksList extends Component {
    public Collection $tasks;

    public function mount(): void {
      $this->get_not_completed();
    }

    #[On('task-list:not-completed')]
    public function get_not_completed(): void {
      $this->tasks =
        Task::with(['author', 'assignee'])
          ->whereCompleted(false)
          ->get();
      $this->dispatch('hide-filter-options');
    }

    #[On('task-list:all')]
    public function get_all(): void {
      $this->tasks =
        Task::with(['author', 'assignee'])
          ->get();
      $this->dispatch('hide-filter-options');
    }

    #[On('task-list:newest-first')]
    public function get_newest_first(): void {
      $this->tasks =
        Task::with(['author', 'assignee'])
          ->latest()
          ->get();
      $this->dispatch('hide-filter-options');
    }

    #[On('task-list:oldest-first')]
    public function get_oldest_first(): void {
      $this->tasks =
        Task::with(['author', 'assignee'])
          ->oldest()
          ->get();
      $this->dispatch('hide-filter-options');
    }

    #[On('task-list:high-priority-first')]
    public function get_high_priority_first(): void {
      $this->tasks =
        Task::with(['author', 'assignee'])
          ->orderBy('priority', 'desc')
          ->get();
      $this->dispatch('hide-filter-options');
    }

    #[On('task-list:low-priority-first')]
    public function get_low_priority_first(): void {
      $this->tasks =
        Task::with(['author', 'assignee'])
          ->orderBy('priority')
          ->get();
      $this->dispatch('hide-filter-options');
    }

    #[On('task-list:high-priority')]
    public function get_high_priority(): void {
      $this->tasks =
        Task::with(['author', 'assignee'])
          ->wherePriority(3)
          ->get();
      $this->dispatch('hide-filter-options');
    }

    #[On('task-list:mid-priority')]
    public function get_mid_priority(): void {
      $this->tasks =
        Task::with(['author', 'assignee'])
          ->wherePriority(2)
          ->get();
      $this->dispatch('hide-filter-options');
    }

    #[On('task-list:low-priority')]
    public function get_low_priority(): void {
      $this->tasks =
        Task::with(['author', 'assignee'])
          ->wherePriority(1)
          ->get();
      $this->dispatch('hide-filter-options');
    }

    #[On('task-list:with-photo-and-location')]
    public function get_with_photo_and_location(): void {
      $this->tasks =
        Task::with(['author', 'assignee'])
          ->whereNotNull(['latitude', 'longitude'])
          ->get();
      $this->dispatch('hide-filter-options');
    }

    #[On('task-list:without-photo-and-location')]
    public function get_without_photo_and_location(): void {
      $this->tasks =
        Task::with(['author', 'assignee'])
          ->whereNull(['latitude', 'longitude'])
          ->get();
      $this->dispatch('hide-filter-options');
    }

    #[On('task-list:completed')]
    public function get_completed(): void {
      $this->tasks =
        Task::with(['author', 'assignee'])
          ->whereCompleted(true)
          ->get();
      $this->dispatch('hide-filter-options');
    }

    public function render(): Application|Factory|View|\Illuminate\View\View {
      return view('livewire.tasks-list');
    }
  }

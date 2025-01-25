<?php

  namespace App\Livewire;

  use Illuminate\Contracts\View\Factory;
  use Illuminate\Contracts\View\View;
  use Illuminate\Foundation\Application;
  use Laravel\Jetstream\InteractsWithBanner;
  use Livewire\Attributes\On;

  class TasksIndex extends App {
    use InteractsWithBanner;

    public bool $toggle_options = true;
    public string $active_filter = 'not-completed';

    public function mount(): void {
      if (request()->has('task-created')) {
        $this->banner('Tarea creada con éxito!');
      }
    }

    #[On('task-list:not-completed')]
    public function make_not_completed_current_filter(): void {
      $this->active_filter = 'not-completed';
    }

    #[On('task-list:all')]
    public function make_all_current_filter(): void {
      $this->active_filter = 'all';
    }

    #[On('task-list:newest-first')]
    public function make_newest_first_current_filter(): void {
      $this->active_filter = 'newest-first';
    }

    #[On('task-list:oldest-first')]
    public function make_oldest_first_current_filter(): void {
      $this->active_filter = 'oldest-first';
    }

    #[On('task-list:high-priority-first')]
    public function make_high_priority_first_current_filter(): void {
      $this->active_filter = 'high-priority-first';
    }

    #[On('task-list:low-priority-first')]
    public function make_low_priority_first_current_filter(): void {
      $this->active_filter = 'low-priority-first';
    }

    #[On('task-list:high-priority')]
    public function make_high_priority_current_filter(): void {
      $this->active_filter = 'high-priority';
    }

    #[On('task-list:mid-priority')]
    public function make_mid_priority_current_filter(): void {
      $this->active_filter = 'mid-priority';
    }

    #[On('task-list:low-priority')]
    public function make_low_priority(): void {
      $this->active_filter = 'low-priority';
    }

    #[On('task-list:with-photo-and-location')]
    public function make_with_photo_and_location_current_filter(): void {
      $this->active_filter = 'with-photo-and-location';
    }

    #[On('task-list:without-photo-and-location')]
    public function make_without_photo_and_location_current_filter(): void {
      $this->active_filter = 'without-photo-and-location';
    }

    #[On('task-list:completed')]
    public function make_completed_current_filter(): void {
      $this->active_filter = 'completed';
    }

    #[On('toggle-filter-options')]
    public function display_options(): void {
      $this->toggle_options = !$this->toggle_options;
    }

    #[On('hide-filter-options')]
    public function hide_options(): void {
      $this->toggle_options = true;
    }

    public function render(): Application|Factory|View|\Illuminate\View\View {
      return view('livewire.tasks-index');
    }
  }

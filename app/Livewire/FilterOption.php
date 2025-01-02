<?php

  namespace App\Livewire;

  use Illuminate\Contracts\View\Factory;
  use Illuminate\Foundation\Application;
  use Illuminate\View\View;
  use Livewire\Component;

  class FilterOption extends Component {
    public string $option_id;
    public string $option_name;
    // public bool $active = false;
    public string $active_filter;

    // public function dispatch_and_make_current($option_id): void {
    //   $this->dispatch('task-list:' . $option_id);
    //   $this->active = true;
    // }

    // public string $active_filter = 'not-completed';

    // #[On('task-list:not-completed')]
    // public function make_not_completed_current_filter(): void {
    //   $this->active_filter = 'not-completed';
    // }
    //
    // #[On('task-list:all')]
    // public function make_all_current_filter(): void {
    //   $this->active_filter = 'all';
    // }

    public function render(): Application|Factory|\Illuminate\Contracts\View\View|View {
      return view('livewire.filter-option');
    }
  }

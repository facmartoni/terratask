<?php

  namespace App\Livewire;

  use App\Livewire\Forms\TaskForm;
  use App\Models\User;
  use Illuminate\Contracts\View\Factory;
  use Illuminate\Contracts\View\View;
  use Illuminate\Foundation\Application;
  use Livewire\Attributes\Layout;
  use Livewire\Attributes\On;
  use Livewire\Component;

  #[Layout('layouts.app')]
  class TasksCreate extends Component {
    public TaskForm $form;

    public string $latitude;
    public string $longitude;
    public string $photo_preview_src;
    public bool $photo_and_geolocation_captured = false;

    public User|array|null $assigned_to = null;

    #[On('assign-task-to')]
    public function assign_to($user): void {
      $this->assigned_to = $user;
    }

    #[On('photo-and-geolocation-captured')]
    public function display_photo_and_location_preview($latitude, $longitude, $src): void {
      $this->latitude = $latitude;
      $this->longitude = $longitude;
      $this->photo_preview_src = $src;
      $this->photo_and_geolocation_captured = true;
    }

    public function render(): Application|Factory|View|\Illuminate\View\View {
      return view('livewire.tasks-create');
    }
  }

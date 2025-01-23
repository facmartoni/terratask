<?php

  namespace App\Livewire;

  use App\Models\Task;
  use App\Models\User;
  use Illuminate\Contracts\View\Factory;
  use Illuminate\Foundation\Application;
  use Illuminate\Support\Facades\Auth;
  use Illuminate\Support\Facades\Storage;
  use Illuminate\View\View;
  use Livewire\Attributes\Layout;
  use Livewire\Attributes\On;
  use Livewire\Component;

  #[Layout('layouts.app')]
  class App extends Component {

    // The dispatched data will be read in the entry point, app.js, for caching them with localforage.
    #[On('ready-to-save-tasks')]
    public function save_tasks($tasks): void {
      // dd($tasks);
      foreach ($tasks as $task) {
        Task::create([
          'title' => $task['title'],
          'description' => $task['description'] ?? null,
          'photo_url' =>
            $task['photoBase64'] ?
              $this->store_base64_image_and_obtain_path($task['photoBase64']) :
              null,
          'created_by' => Auth::id(),
          'assigned_to' => $task['assignee'] ?? null,
          'priority' => $task['priority'],
          'latitude' => $task['latitude'] ?? null,
          'longitude' => $task['longitude'] ?? null,
        ]);
      }
    }

    #[On('app-online')]
    public function get_users_list(): void {
      $users = User::get(['id', 'name'])->toArray();
      $this->dispatch('ready-to-cache-users', [
        'users' => $users
      ]);
    }

    private function store_base64_image_and_obtain_path($base64_image): string {
      // $base64_image = explode('base64', $base64_image_with_metadata)[1];
      $image_raw_data = base64_decode($base64_image, true);
      $filename = uniqid() . '.png';
      $path = 'images/' . $filename;
      Storage::disk('public')->put($path, $image_raw_data);
      return $path;
    }

    public function render(): Application|Factory|\Illuminate\Contracts\View\View|View {
      return view('livewire.app');
    }
  }

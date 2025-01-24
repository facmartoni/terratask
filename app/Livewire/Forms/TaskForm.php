<?php

  namespace App\Livewire\Forms;

  use App\Models\Task;
  use Auth;
  use Illuminate\Http\UploadedFile;
  use Livewire\Attributes\Validate;
  use Livewire\Form;

  class TaskForm extends Form {
    public ?Task $task;

    #[Validate('required|max:255')]
    public string $title; // BIND DONE

    #[Validate('nullable|max:5000')]
    public ?string $description; // BIND DONE

    #[Validate('nullable|image')]
    public ?UploadedFile $image;

    #[Validate('nullable|regex:/^-?\d{1,2}\.\d+$/')]
    public ?string $latitude; // BIND DONE

    #[Validate('nullable|regex:/^-?\d{1,2}\.\d+$/')]
    public ?string $longitude; // BIND DONE

    #[Validate('nullable|int|exists:users,id')]
    public ?int $assigned_to; // BIND DONE

    #[Validate('nullable|int|in:1,2,3')]
    public ?int $priority; // BIND DONE

    // TODO: setMyModel

    public function store(): void {
      $this->validate();

      Task::create([
        'created_by' => Auth::id(),
        'assigned_to' => $this->assigned_to,
        'title' => $this->title,
        'description' => $this->description,
        'priority' => $this->priority,
        'photo_url' => $this->image->store('images', 'public'),
        'latitude' => $this->latitude,
        'longitude' => $this->longitude
      ]);
    }

    public function update(): void {
      $this->validate();

      //
    }


  }

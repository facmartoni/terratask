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
    public string $title;

    #[Validate('nullable|max:5000')]
    public ?string $description;

    #[Validate('nullable|image')]
    public ?UploadedFile $image;

    #[Validate('nullable|regex:/^-?\d{1,2}\.\d+$/')]
    public ?string $latitude;

    #[Validate('nullable|regex:/^-?\d{1,2}\.\d+$/')]
    public ?string $longitude;

    #[Validate('nullable|int|exists:users,id')]
    public ?int $assigned_to;

    #[Validate('nullable|int|in:1,2,3')]
    public ?int $priority = 1;

    // TODO: setMyModel

    public function store(): void {
      $this->validate();

      $image_path = $this->image ? $this->image->store('images', 'public') : null;

      Task::create([
        'created_by' => Auth::id(),
        'assigned_to' => $this->assigned_to ?? null,
        'title' => $this->title,
        'description' => $this->description ?? null,
        'priority' => $this->priority,
        'photo_url' => $image_path,
        'latitude' => $this->latitude ?? null,
        'longitude' => $this->longitude ?? null
      ]);
    }

    public function update(): void {
      $this->validate();

      //
    }


  }

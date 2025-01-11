<?php

  namespace App\Livewire\Forms;

  use App\Models\Task;
  use Illuminate\Http\UploadedFile;
  use Livewire\Attributes\Validate;
  use Livewire\Form;

  class TaskForm extends Form {
    public ?Task $task;

    #[Validate('required|max:255')]
    public string $title;

    #[Validate('nullable|max:5000')]
    public ?string $description;

    #[Validate('nullable|image|max:20480')]
    public ?UploadedFile $image;

    #[Validate('nullable|regex:/^-?\d{1,2}\.\d+$/')]
    public ?string $latitude;

    #[Validate('nullable|regex:/^-?\d{1,2}\.\d+$/')]
    public ?string $longitude;

    #[Validate('nullable|int|exists:users,id')]
    public ?int $assigned_to;

    #[Validate('nullable|int|in:1,2,3')]
    public ?int $priority;

    // TODO: setMyModel

    public function store(): void {
      $this->validate();

      Task::create($this->except('task'));
    }

    public function update(): void {
      $this->validate();

      //
    }


  }

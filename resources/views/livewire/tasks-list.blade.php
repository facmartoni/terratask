<div class="grid grid-cols-1 gap-2 sm:grid-cols-2 lg:grid-cols-3">

  @if($tasks->isNotEmpty())
    @foreach($tasks as $task)
      <livewire:task-preview
        :$task
        :key="'task-' . $task->id"
      />
    @endforeach
  @else
    <x-graphics.all-completed/>
  @endif
</div>
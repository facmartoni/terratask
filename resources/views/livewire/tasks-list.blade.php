<div class="grid grid-cols-1 gap-2 sm:grid-cols-2 lg:grid-cols-3">

  @foreach($tasks as $task)
    <livewire:task-preview :$task :key="$task->id"/>
  @endforeach

</div>
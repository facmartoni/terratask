<div class="flex flex-col w-full h-full items-center py-6">
  <x-general.author-photo
    :$user
    size="20"
  />
  <x-general.page-header class="mt-4">{{ $user->name }}</x-general.page-header>
  <p
    id="user-role"
    class="mt-2"
  >{{ $user->role }}</p>
  <livewire:user-tasks-tab-selector
    :$user
    :current="$this->current"
  />
  <div class="grid grid-cols-1 gap-2 sm:grid-cols-2 lg:grid-cols-3 mt-4">
    @foreach($this->tasks as $task)
      <livewire:task-preview
        :$task
        :key="'task-'.$task->id"
      />
    @endforeach
  </div>
</div>

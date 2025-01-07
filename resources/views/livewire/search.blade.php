<div class="flex flex-col h-full">
  <div class="min-h-20 flex justify-center items-center">
    <x-general.page-header>Buscar Tarea o Usuario</x-general.page-header>
  </div>
  <div class="flex-1 flex flex-col items-start w-full">
    <form class="w-full">
      <x-input
        id="search-box"
        name="search-box"
        placeholder="&quot;Osvaldo&quot;, &quot;Caña Deshidratada&quot;, etc..."
        class="w-full text-sm mb-4"
        wire:model.live.debounce="q"
      />
    </form>

    @if(
        ($this->users_results === null || $this->users_results->isEmpty())
        && ($this->tasks_results === null || $this->tasks_results->isEmpty())
       )
      <x-graphics.not-found/>
    @else

      @if($this->users_results)
        <div class="grid grid-cols-1 gap-2 sm:grid-cols-2 lg:grid-cols-3 mb-2 w-full">
          @foreach($this->users_results as $user)
            <livewire:user-preview
              :$user
              :key="'user-'.$user->id"
            />
          @endforeach
        </div>
      @endif

      @if($this->tasks_results)
        <div class="grid grid-cols-1 gap-2 sm:grid-cols-2 lg:grid-cols-3">
          @foreach($this->tasks_results as $task)
            <livewire:task-preview
              :$task
              :key="'task-'.$task->id"
            />
          @endforeach
        </div>
      @endif

    @endif

  </div>
</div>
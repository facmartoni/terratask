<div class="grid grid-cols-1 gap-2 sm:grid-cols-2 lg:grid-cols-3">

  @foreach($tasks as $task)
    <a href="#" class="block" wire:key="{{ $task->id }}">
      <div
        class="relative flex items-center space-x-3 rounded-lg border border-gray-300 bg-white pl-6 shadow-sm focus-within:ring-2 focus-within:ring-indigo-500 focus-within:ring-offset-2 hover:border-gray-400"
      >
        <div class="shrink-0">
          <img class="size-8 rounded-full"
               src="{{ $task->author->profile_photo_path }}"
               alt="Creador de la Tarea">
        </div>
        <div class="min-w-0 flex-1">
          <div class="focus:outline-none">
            <span class="absolute inset-0" aria-hidden="true"></span>
            <p class="text-sm font-medium text-gray-900 mb-1">{{ Str::limit($task->title, 34) }}</p>
            <p class="truncate text-xs text-gray-500">Asignada a: <span
                class="text-indigo-300">{{ $task->author->name }}</span></p>
          </div>
        </div>
        <div class="shrink-0 size-20">
          <img class="size-20 rounded-tr-md rounded-br-md"
               src="{{ $task->photo_url }}"
               onerror="this.style.display='none';"
               alt="Creador de la Tarea">
        </div>
      </div>
    </a>
  @endforeach

</div>
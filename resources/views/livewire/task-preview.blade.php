{{-- Useful code for development. Rewrite when in prod for a time 👇🏼 --}}
@php
  $image_parsed_path = '';
  if(str_contains($task->photo_url, 'picsum')) {
    $image_parsed_path = $task->photo_url;
  } else {
    $image_parsed_path = \Illuminate\Support\Facades\Storage::url($task->photo_url);
  }
@endphp

<a
  href="/tasks/{{ $task->id }}"
  class="block"
  wire:click="dispatch('hide-filter-options')"
  wire:navigate
>
  <div
    @class([
        "relative flex items-center space-x-3 rounded-lg border border-gray-300 pl-6 shadow-sm focus-within:ring-2 focus-within:ring-indigo-500 focus-within:ring-offset-2 hover:border-gray-400",
        "bg-green-800" => $task->priority == 3,
        "bg-green-600" => $task->priority == 2,
        "bg-green-200" => $task->priority == 1,
      ])
  >
    <div class="shrink-0">
      <img
        class="size-8 rounded-full"
        src="{{ asset($task->author->profile_photo_path) }}"
        alt="{{ $task->author->name }}"
      >
    </div>
    <div class="min-w-0 flex-1">
      <div class="focus:outline-none">
        <span
          class="absolute inset-0"
          aria-hidden="true"
        ></span>
        <p @class([
                  "truncate text-sm font-medium mb-1",
                  "text-white" => $task->priority == 3 || $task->priority == 2,
                  "text-gray-900" => $task->priority == 1
                ])>{{ $task->title }}</p>
        <p @class([
                  "truncate text-xs",
                  "text-white" => $task->priority == 3 || $task->priority == 2,
                  "text-gray-900" => $task->priority == 1
                 ])>Asignada a:
          <span
            class="font-semibold"
          >{{ $task->assignee ? $task->assignee->name : 'nadie' }}</span></p>
      </div>
    </div>
    <livewire:task-preview-image
      image_url="{{ $image_parsed_path }}"
      {{-- :key="$task->photo_url" --}}
    />
  </div>
</a>
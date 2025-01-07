<div @class(["pb-16" => $request_for_comment])>
  <div class="divide-y divide-gray-200 overflow-hidden rounded-lg bg-white shadow">
    @if($task->photo_url != '' && $task->photo_url != null)
      <div class="flex items-center justify-center h-40">
        <div class="w-full h-full">
          <img
            src="{{ $task->photo_url }}"
            alt="Foto de la Tarea"
            onerror="
            this.src='{{ asset('images/grupo_isologo.png') }}';
            this.style.objectFit = 'contain';
            this.className += ' opacity-50 px-6';
          "
            class="w-full h-full object-cover"
          >
        </div>
      </div>
    @endif
    <div class="px-6 py-4 text-center">
      <x-general.page-header>{{ $task->title }}</x-general.page-header>
      <p class="mt-4 text-sm text-left">{{ $task->description }}</p>
      <div class="flex items-center mt-4">
        <x-general.author-photo :user="$task->author"/>
        <div
          id="users_detail"
          class="flex-1 flex flex-col justify-start pl-6 text-left"
        >
          <a
            href="/users/{{ $task->author->id }}"
            class="text-xs pb-1"
          >Autor: <span class="text-indigo-500">{{ $task->author->name }}</span></a>
          @if($task->assignee)
            <a
              href="/users/{{ $task->assignee->id }}"
              class="text-xs"
            >Asignada a: <span class="text-indigo-500">{{ $task->assignee->name }}</span></a>
          @endif
        </div>
      </div>
      @if($task->latitude && $task->longitude)
        <x-task.map
          lat="{{ $task->latitude }}"
          lon="{{ $task->longitude }}"
        />
      @endif
    </div>
    <div
      id="card_footer"
      class="h-12 w-full flex justify-between py-2 px-2"
    >
      <x-button
        class="text-xxs"
        wire:click="dispatch('create-comment')"
      >Comentar
      </x-button>
      <livewire:task-complete-button :completed="$task->completed"/>
    </div>
  </div>
  <livewire:comments-box
    :$task
  />
  @if($request_for_comment)
    <livewire:create-comment-box
      :to="$requested_comment"
      :key="$requested_comment ? $requested_comment->id : 'empty-create-comment-box'"
      :$task
    />
  @endif
</div>


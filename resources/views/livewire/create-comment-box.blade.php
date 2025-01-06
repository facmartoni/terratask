<div class="fixed border-t border-gray-200 bottom-12 left-0 right-0 w-screen h-20 bg-white flex">
  <div class="h-full w-16 flex justify-center items-center">
    <x-general.author-photo :user="Auth::user()"/>
  </div>
  <div class="h-full flex-1 divide-y divide-gray-500 pl-4 pr-2">
    <div
      id="replying_to"
      class="text-xs text-gray-600 py-1 h-1/3 flex items-center"
    >
      <div class="w-full flex justify-between">
        @if($to)
          <p>Respondiendo a: <span class="text-indigo-500">
          {{ $to->author->name }}
        </span></p>
        @else
          <p>Comentando <span class="text-indigo-500">
          {{ $task->title }}
        </span></p>
        @endif
        <button
          class="text-red-500 underline"
          wire:click="dispatch('close-create-comment-box')"
        >X
        </button>
      </div>
    </div>
    <div
      id="form-container"
      class="flex items-center h-2/3"
    >
      <form
        wire:submit.prevent="save"
        class="flex"
      >
        <x-input
          class="flex-1 text-xs mr-2"
          placeholder="Escribir un comentario..."
          wire:model="form.content"
        />
        <x-button class="text-xs">Publicar</x-button>
      </form>
    </div>
  </div>
</div>

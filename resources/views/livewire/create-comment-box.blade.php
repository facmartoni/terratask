<div class="fixed border-t border-gray-200 bottom-12 left-0 right-0 w-screen h-20 bg-white flex">
  <div class="h-full w-16 flex justify-center items-center">
    <x-general.author-photo :user="Auth::user()"/>
  </div>
  <div class="flex-1 divide-y divide-gray-500 pl-4 pr-2">
    <div
      id="replying_to"
      class="text-xs text-gray-600 py-1"
    >
      <p>Respondiendo a: <span class="text-indigo-500">{{ $to->author->name }}</span></p>
    </div>
    <div
      id="form-container"
      class="pt-2 flex"
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

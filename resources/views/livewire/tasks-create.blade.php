<div class="flex flex-col items-center">
  <x-general.page-header class="my-4">Crear Tarea</x-general.page-header>
  <form
    action=""
    class="w-full"
  >
    <x-label for="task-title">Nombre</x-label>
    <x-input
      id="task-title"
      name="task-title"
      placeholder="&quot;Aplicar agroquímicos&quot;, &quot;Ralear maleza hoy&quot;..."
      class="w-full text-sm mb-4"
    />
    <x-label for="task-description">Descripción</x-label>
    <x-textarea
      id="task-description"
      name="task-description"
      placeholder="&quot;Aplicar pesticidas x día en x lugar...&quot;"
      class="w-full h-20 text-sm mb-4"
    />
    <label for="task-photo">
      <x-button class="w-full text-center mb-4">
        <x-carbon-camera class="size-8 pr-2"/>
        Sacar Foto y Capturar Ubicación
      </x-button>
    </label>
    <input
      id="task-photo"
      name="task-photo"
      type="file"
      class="hidden"
    />
    <x-label
      for="task-assignee"
    >Asignar a...
    </x-label>
    <livewire:user-selector/>
    <input
      value="{{ $assigned_to['id'] ?? '' }}"
      class="hidden"
    >
    <livewire:task-priority-selector/>
    <div class="w-full flex justify-center">
      <x-button class="mt-6 bg-indigo-600">Crear</x-button>
    </div>
  </form>
</div>
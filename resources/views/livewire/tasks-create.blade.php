<div class="flex flex-col items-center">
  <x-general.page-header class="my-4">Crear Tarea</x-general.page-header>
  <form
    class="w-full"
  >
    <x-label for="task-title">Título</x-label>
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
      placeholder="&quot;Aplicar herbicidas para malezas pre-emergentes..&quot;"
      class="w-full h-20 text-sm mb-4"
    />
    <label
      for="task-photo"
      class="w-full text-center mb-4 inline-flex items-center px-4 py-2 bg-budeguerGreen border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-500 focus:bg-green-700 active:bg-green-900 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 disabled:opacity-50 transition ease-in-out duration-150"
    >
      <x-carbon-camera class="size-8 pr-2"/>
      Sacar Foto y Capturar Ubicación
    </label>
    <input
      id="task-photo"
      name="task-photo"
      type="file"
      accept="image/*"
      capture="camera"
      class="hidden"
      wire:change="dispatch('photo-captured')"
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
      <x-button class="mt-6 bg-indigo-600 hover:bg-indigo-500">Crear</x-button>
    </div>
  </form>
</div>

@script
<script>

    // *** GPS Management ***
    window.addEventListener('photo-captured', () => {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(
                (position) => {
                    const {latitude, longitude} = position.coords;
                    console.log(`Location captured: Latitude ${latitude}, Longitude: ${longitude}`)
                    // Handle GPS Data
                },
                (error) => {
                    console.error(`Error capturing location: `, error.message)
                    // Handle Error
                }
            )
        } else {
            console.error('Geolocation is not supported by this browser.');
            // Handle GPS not supported
        }
    })

</script>
@endscript

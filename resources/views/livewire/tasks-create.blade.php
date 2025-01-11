<div class="flex flex-col items-center">

  <x-general.page-header class="my-4">Crear Tarea</x-general.page-header>

  <form
    class="w-full"
    enctype="multipart/form-data"
  >

    {{-- Task Title and Description --}}

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
      class="w-full text-sm mb-4 h-20"
    />

    {{-- Photo and Geolocation Inputs --}}

    <label
      for="task-photo-input"
      class="w-full text-center mb-4 inline-flex items-center justify-center px-4 py-2 bg-budeguerGreen border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-500 focus:bg-green-700 active:bg-green-900 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 disabled:opacity-50 transition ease-in-out duration-150"
    >
      <x-carbon-camera class="size-8 pr-2"/>
      Sacar Foto y Capturar Ubicación
    </label>
    <input
      id="task-photo-input"
      name="task-photo-input"
      type="file"
      accept="image/*"
      capture="environment"
      class="hidden"
    />

    {{-- Photo and Location Preview --}}

    @if($photo_and_geolocation_captured)
      <div class="w-full flex justify-between gap-x-2 h-44">
        <div class="shrink-0 flex-1">
          <img
            id="task-photo-preview"
            src="{{ $photo_preview_src }}"
            alt="Previsualización de Foto"
            class="w-full h-full object-cover"
          >
        </div>
        <div class="shrink-0 flex-1">
          <x-task.map
            lat="{{ $latitude }}"
            lon="{{ $longitude }}"
            w="100%"
            h="100%"
            z="18"
          />
        </div>
      </div>
    @endif

    {{-- Task Assignment --}}

    <x-label
      for="task-assignee"
    >Asignar a...
    </x-label>
    <livewire:user-selector/>
    <input
      value="{{ $assigned_to['id'] ?? '' }}"
      class="hidden"
    >

    {{-- Task Priority --}}

    <livewire:task-priority-selector/>

    <div class="w-full flex justify-center">
      <x-button class="mt-6 bg-indigo-600 hover:bg-indigo-500">Crear</x-button>
    </div>

  </form>

</div>

@script
<script>

    // *** GPS and Photo Preview Management ***

    document.getElementById('task-photo-input').addEventListener('change', (event) => {
        if (navigator.geolocation) {

            checkGPSPermissions();

            // Get current location
            navigator.geolocation.getCurrentPosition(
                (position) => {
                    const {latitude, longitude} = position.coords;
                    console.log(`Location captured: Latitude ${latitude}, Longitude: ${longitude}`)

                    // *** Photo Preview Management ***

                    const photoFile = event.target.files[0];
                    if (photoFile) {
                        const reader = new FileReader();
                        reader.onload = (e) => {
                            const arrayBuffer = e.target.result;
                            const blob = new Blob([arrayBuffer], {type: photoFile.type});
                            const src = URL.createObjectURL(blob);
                            $dispatch('photo-and-geolocation-captured', {
                                latitude,
                                longitude,
                                src
                            })

                            // URL.revokeObjectURL(src); // TO IMPLEMENT
                        }
                        reader.readAsArrayBuffer(photoFile);
                    }
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

    function checkGPSPermissions() {
        navigator.permissions.query({name: 'geolocation'}).then(function (result) {
            console.log(`Permissions are: ${result.state}`)
        })
    }

</script>
@endscript

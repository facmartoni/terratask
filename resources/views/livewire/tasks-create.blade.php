<div
  class="flex flex-col items-center"
>

  <x-general.page-header class="my-4">Crear Tarea</x-general.page-header>

  <form
    class="w-full h-full"
    enctype="multipart/form-data"
    wire:submit.prevent="save_task"
    method="POST"
  >
    @csrf

    {{-- Task Title and Description --}}

    <x-label for="task-title">Título</x-label>
    <x-input
      id="task-title"
      name="task-title"
      placeholder="&quot;Aplicar agroquímicos&quot;, &quot;Ralear maleza hoy&quot;..."
      class="w-full text-base"
      value="{{ old('task-title') }}"
      wire:model="form.title"
    />
    @error('form.title')
    <span class="text-red-600 text-xxs">{{ $message }}</span>
    @enderror

    <x-label
      for="task-description"
      class="mt-4"
    >Descripción
    </x-label>
    <x-textarea
      id="task-description"
      name="task-description"
      placeholder="&quot;Aplicar herbicidas para malezas pre-emergentes..&quot;"
      class="w-full text-base h-20"
      value="{{ old('task-description') }}"
      wire:model="form.description"
    />
    @error('form.description')
    <span class="text-red-600 text-xxs">{{ $message }}</span>
    @enderror

    {{-- Photo and Geolocation Inputs --}}

    <label
      for="task-photo-input"
      class="w-full text-center mt-4 inline-flex items-center justify-center px-4 py-2 bg-budeguerGreen border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-500 focus:bg-green-700 active:bg-green-900 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 disabled:opacity-50 transition ease-in-out duration-150"
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
      wire:model="form.image"
    />
    @error('form.image')
    <span class="text-red-600 text-xxs">{{ $message }}</span>
    @enderror
    @error('form.latitude')
    <span class="text-red-600 text-xxs">{{ $message }}</span>
    @enderror
    @error('form.longitude')
    <span class="text-red-600 text-xxs">{{ $message }}</span>
    @enderror

    {{-- Photo and Location Preview --}}

    @if($photo_and_geolocation_captured)
      <div class="w-full flex justify-between gap-x-2 h-44 mt-4">
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
      class="mt-4"
    >Asignar a...
    </x-label>
    <livewire:user-selector/>
    <input
      value="{{ $assigned_to['id'] ?? '' }}"
      class="hidden"
    >
    @error('form.assigned_to')
    <span class="text-red-600 text-xxs">{{ $message }}</span>
    @enderror

    {{-- Task Priority --}}

    {{-- <livewire:task-priority-selector :$form/> --}}

    <fieldset class="mt-4 w-full flex justify-center text-center">
      <legend class="block text-sm/6 text-gray-900">Elige una prioridad:</legend>
      <div class="mt-6 flex items-center space-x-3">

        <div class="text-center">
          <label
            aria-label="Light Green"
            wire:click="select_priority('low')"
            @class([
              "relative -m-0.5 flex cursor-pointer items-center justify-center rounded-full p-0.5 text-green-200 ring-current focus:outline-none",
              "ring ring-offset-1" => $selected_priority === 'low'
            ])
          >
            <input
              type="radio"
              name="priority"
              value="1"
              class="sr-only"
              wire:model.int="form.priority"
            >
            <span
              aria-hidden="true"
              class="size-8 rounded-full border border-black/10 bg-current"
            ></span>
          </label>
          <span class="text-xxs">Baja</span>
        </div>

        <div class="text-center">
          <label
            aria-label="Green"
            wire:click="select_priority('mid')"
            @class([
              "relative -m-0.5 flex cursor-pointer items-center justify-center rounded-full p-0.5 text-green-600 ring-current focus:outline-none",
              "ring ring-offset-1" => $selected_priority === 'mid'
            ])
          >
            <input
              type="radio"
              name="priority"
              value="2"
              class="sr-only"
              wire:model.int="form.priority"
            >
            <span
              aria-hidden="true"
              class="size-8 rounded-full border border-black/10 bg-current"
            ></span>
          </label>
          <span class="text-xxs">Media</span>
        </div>

        <div class="text-center">
          <label
            aria-label="Strong Green"
            wire:click="select_priority('high')"
            @class([
              "relative -m-0.5 flex cursor-pointer items-center justify-center rounded-full p-0.5 text-green-800 ring-current focus:outline-none",
              "ring ring-offset-1" => $selected_priority === 'high'
            ])
          >
            <input
              type="radio"
              name="priority"
              value="3"
              class="sr-only"
              wire:model.int="form.priority"
            >
            <span
              aria-hidden="true"
              class="size-8 rounded-full border border-black/10 bg-current"
            ></span>
          </label>
          <span class="text-xxs">Alta</span>
        </div>

      </div>
      @error('form.priority')
      <span class="text-red-600 text-xxs">{{ $message }}</span>
      @enderror
    </fieldset>

    <div class="w-full flex justify-center">
      <x-button class="mt-6 bg-indigo-600 hover:bg-indigo-500">Crear</x-button>
    </div>

  </form>

</div>

@script
<script>

    // *** GPS and Photo Preview Management ***

    document.getElementById('task-photo-input').addEventListener('change', (event) => {

        event.preventDefault();

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

<div
  class="absolute top-12 left-20 right-0 w-3/4"
  wire:transition
>
  <div class="relative mt-2">
    <ul
      class="absolute z-10 mt-1 max-h-120 w-full overflow-auto rounded-md bg-white py-1 text-base shadow-lg ring-1 ring-black/5 focus:outline-none sm:text-sm"
      id="options"
      role="listbox"
    >

      <livewire:filter-option
        option_id="not-completed"
        option_name="Sin Completar"
        :$active_filter
      />

      <livewire:filter-option
        option_id="all"
        option_name="Todas"
        :$active_filter
      />

      <livewire:filter-option
        option_id="newest-first"
        option_name="Más Recientes Primero"
        :$active_filter
      />

      <livewire:filter-option
        option_id="oldest-first"
        option_name="Más Antiguas Primero"
        :$active_filter
      />

      <livewire:filter-option
        option_id="high-priority-first"
        option_name="Alta Prioridad Primero"
        :$active_filter
      />

      <livewire:filter-option
        option_id="low-priority-first"
        option_name="Baja Prioridad Primero"
        :$active_filter
      />

      <livewire:filter-option
        option_id="high-priority"
        option_name="Prioridad Alta"
        :$active_filter
      />

      <livewire:filter-option
        option_id="mid-priority"
        option_name="Prioridad Media"
        :$active_filter
      />

      <livewire:filter-option
        option_id="low-priority"
        option_name="Prioridad Baja"
        :$active_filter
      />

      <livewire:filter-option
        option_id="with-photo-and-location"
        option_name="Con Foto y Ubicación"
        :$active_filter
      />

      <livewire:filter-option
        option_id="without-photo-and-location"
        option_name="Sin Foto y Ubicación"
        :$active_filter
      />

      <livewire:filter-option
        option_id="completed"
        option_name="Completadas"
        :$active_filter
      />

    </ul>
  </div>
</div>

<div class="w-full">

  <div
    id="header"
    class="w-full flex justify-between items-center mb-4"
    x-data="tasksIndexData"
    x-init="init()"
  >
    <x-general.budeguer-logo/>
    <x-general.page-header>Tareas</x-general.page-header>
    <button
      class="text-indigo-500 underline text-sm"
      x-show="offlineTasks"
      @click="location.reload()"
    >
      Sincronizar
    </button>
    <livewire:filter-button/>
  </div>

  <livewire:tasks-list/>

  @if(!$toggle_options)
    <livewire:filter-options :$active_filter/>
  @endif

  <script>
      function tasksIndexData() {
          return {
              offlineTasks: false,
              async init() {
                  try {
                      const keys = await localforage.keys();
                      this.offlineTasks = keys.some((e) => e.includes('task '));
                  } catch (e) {
                      console.error('Error returning localforage keys: ' + e)
                  }
              }
          }
      }
  </script>

</div>

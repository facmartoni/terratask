<div class="w-full">

  <div id="header" class="w-full flex justify-between items-center mb-4">
    <livewire:budeguer-logo/>
    <livewire:page-header title="Tareas"/>
    <livewire:filter-button/>
  </div>

  <livewire:tasks-list/>

  @if(!$toggle_options)
    <livewire:filter-options :$active_filter/>
  @endif

</div>

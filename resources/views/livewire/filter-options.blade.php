<div @class([
  "absolute top-12 left-20 right-0 w-3/4",
  "hidden" => $toggle_options
  ])>
  <div class="relative mt-2">
    <ul
      class="absolute z-10 mt-1 max-h-60 w-full overflow-auto rounded-md bg-white py-1 text-base shadow-lg ring-1 ring-black/5 focus:outline-none sm:text-sm"
      id="options" role="listbox">

      @if(!$toggle_options)
        <livewire:filter-option :key="'filter-option'"/>
      @endif
      <!-- More items... -->
    </ul>
  </div>
</div>
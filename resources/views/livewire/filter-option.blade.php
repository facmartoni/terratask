@php
  $event_name = 'task-list:' . $option_id;
  $active = $option_id === $active_filter;
@endphp

<li class="relative cursor-default select-none py-2 pl-3 pr-9 text-gray-900"
    id={{ $option_id }}
    role="option"
    tabindex="-1"
    wire:key="option-{{ $option_id }}"
    wire:click="dispatch('{{ $event_name }}')"
  {{-- wire:click="dispatch_and_make_current('{{ $option_id }}')" --}}
>
  <div class="flex items-center">

    {{-- Icon Placement --}}
    @php
      $option_icon_class = 'pl-2 size-7' . ($active ? ' text-budeguerGreen' : ' text-gray-800');
    @endphp
    @switch($option_id)
      @case('not-completed')
        <x-carbon-down-to-bottom class="{{ $option_icon_class }}"/>
        @break
      @case('all')
        <x-carbon-expand-all class="{{ $option_icon_class }}"/>
        @break
      @case('newest-first')
        <x-carbon-recently-viewed class="{{ $option_icon_class }}"/>
        @break
      @case('oldest-first')
        <x-carbon-result-old class="{{ $option_icon_class }}"/>
        @break
      @case('high-priority-first')
        <x-tabler-urgent class="{{ $option_icon_class }}"/>
        @break
      @case('low-priority-first')
        <x-tabler-leaf class="{{ $option_icon_class }}"/>
        @break
      @case('high-priority')
        <x-gmdi-priority-high-o class="{{ $option_icon_class }}"/>
        @break
      @case('mid-priority')
        <x-typ-battery-mid class="{{ $option_icon_class }}"/>
        @break
      @case('low-priority')
        <x-gmdi-low-priority-o class="{{ $option_icon_class }}"/>
        @break
      @case('with-photo-and-location')
        <x-carbon-location-filled class="{{ $option_icon_class }}"/>
        @break
      @case('without-photo-and-location')
        <x-carbon-location class="{{ $option_icon_class }}"/>
        @break
      @case('completed')
        <x-carbon-task-complete class="{{ $option_icon_class }}"/>
        @break
    @endswitch

    {{-- Selected = Bold --}}
    <span @class([
        "ml-3 truncate",
        "font-semibold" => $active
        ])>
      {{ $option_name }}
      @if($active)
        <span class="sr-only"> is selected</span>
      @endif
    </span>

  </div>

  {{-- Checkmark --}}
  <span @class([
      "absolute inset-y-0 right-0 flex items-center pr-4",
      "text-indigo-600" => $active,
      "text-white" => !$active
      ])>
    <svg class="size-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" data-slot="icon">
      <path fill-rule="evenodd"
            d="M16.704 4.153a.75.75 0 0 1 .143 1.052l-8 10.5a.75.75 0 0 1-1.127.075l-4.5-4.5a.75.75 0 0 1 1.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 0 1 1.05-.143Z"
            clip-rule="evenodd"/>
    </svg>
  </span>

</li>
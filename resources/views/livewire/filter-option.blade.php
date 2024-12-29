<!--
  Combobox option, manage highlight styles based on mouseenter/mouseleave and keyboard navigation.

  Active: "text-white bg-indigo-600 outline-none", Not Active: "text-gray-900"
-->

<li @class([
  "relative cursor-default select-none py-2 pl-3 pr-9",
  "text-white bg-indigo-600 outline-none" => $focused,
  "text-gray-900" => !$focused
  ])
    id="option-0"
    role="option"
    tabindex="-1"
    wire:mouseover="dispatch('filter-option:mouseover')"
    wire:mouseout="dispatch('filter-option:mouseout')"
>
  <div class=" flex items-center">
    <!-- Online: "bg-green-400", Not Online: "bg-gray-200" -->
    <span class="inline-block size-2 shrink-0 rounded-full bg-green-400" aria-hidden="true"></span>
    <!-- Selected: "font-semibold" -->
    <span class="ml-3 truncate">
      Leslie Alexander
      <span class="sr-only"> is online</span>
    </span>
  </div>

  <!--
    Checkmark, only display for selected option.

    Active: "text-white", Not Active: "text-indigo-600"
  -->
  <span class="absolute inset-y-0 right-0 flex items-center pr-4 text-indigo-600">
    <svg class="size-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" data-slot="icon">
      <path fill-rule="evenodd"
            d="M16.704 4.153a.75.75 0 0 1 .143 1.052l-8 10.5a.75.75 0 0 1-1.127.075l-4.5-4.5a.75.75 0 0 1 1.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 0 1 1.05-.143Z"
            clip-rule="evenodd"/>
    </svg>
  </span>
</li>
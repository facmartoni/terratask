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
          value="low"
          class="sr-only"
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
          value="mid"
          class="sr-only"
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
          value="high"
          class="sr-only"
        >
        <span
          aria-hidden="true"
          class="size-8 rounded-full border border-black/10 bg-current"
        ></span>
      </label>
      <span class="text-xxs">Alta</span>
    </div>
  </div>
</fieldset>

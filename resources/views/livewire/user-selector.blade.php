<div>
  <div class="relative mt-2">
    <button
      wire:click="toggle_show_users_list"
      type="button"
      class="grid w-full cursor-default grid-cols-1 rounded-md bg-white py-1.5 pl-3 pr-2 text-left text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6"
      aria-haspopup="listbox"
      aria-expanded="true"
    >
      <span class="col-start-1 row-start-1 flex items-center gap-3 pr-6">
        @if($selected_user)
          <img
            src="{{ $selected_user->profile_photo_path }}"
            alt="{{ $selected_user->name }}"
            class="size-5 shrink-0 rounded-full"
          >
        @endif
        <span class="block truncate">{{ $selected_user ? $selected_user->name : 'Sin Asignar' }}</span>
      </span>
      <svg
        class="col-start-1 row-start-1 size-5 self-center justify-self-end text-gray-500 sm:size-4"
        viewBox="0 0 16 16"
        fill="currentColor"
        aria-hidden="true"
        data-slot="icon"
      >
        <path
          fill-rule="evenodd"
          d="M5.22 10.22a.75.75 0 0 1 1.06 0L8 11.94l1.72-1.72a.75.75 0 1 1 1.06 1.06l-2.25 2.25a.75.75 0 0 1-1.06 0l-2.25-2.25a.75.75 0 0 1 0-1.06ZM10.78 5.78a.75.75 0 0 1-1.06 0L8 4.06 6.28 5.78a.75.75 0 0 1-1.06-1.06l2.25-2.25a.75.75 0 0 1 1.06 0l2.25 2.25a.75.75 0 0 1 0 1.06Z"
          clip-rule="evenodd"
        />
      </svg>
    </button>
    @if($users_list_visible)
      <ul
        class="absolute z-10 mt-1 max-h-56 w-full overflow-auto rounded-md bg-white py-1 text-base shadow-lg ring-1 ring-black/5 focus:outline-none sm:text-sm"
        tabindex="-1"
        role="listbox"
        aria-activedescendant="listbox-option-3"
      >
        @foreach($users as $user)
          <li
            class="relative cursor-default select-none py-2 pl-3 pr-9 text-gray-900"
            id="'user-' . {{ $user->id }}"
            wire:key="'user-' . {{ $user->id }}"
            wire:click="select_user({{ $user->id }})"
            role="option"
          >
            <div class="flex items-center">
              <img
                src="{{ $user->profile_photo_path }}"
                alt="{{ $user->name }}"
                class="size-5 shrink-0 rounded-full"
                onerror="this.src={{ asset('images/logo_budeguer_base_transparente.png') }}"
              >
              <span @class([
                  "ml-3 block truncate",
                  "font-normal" => $selected_user?->id !== $user->id,
                  "font-semibold" => $selected_user?->id === $user->id
                ])>{{ $user->name }}</span>
            </div>
            <span @class([
                "absolute inset-y-0 right-0 flex items-center pr-4",
                "text-indigo-600" => $selected_user?->id === $user->id,
                "text-white" => $selected_user?->id !== $user->id,
                ])>
                <svg
                  class="size-5"
                  viewBox="0 0 20 20"
                  fill="currentColor"
                  aria-hidden="true"
                  data-slot="icon"
                >
                <path
                  fill-rule="evenodd"
                  d="M16.704 4.153a.75.75 0 0 1 .143 1.052l-8 10.5a.75.75 0 0 1-1.127.075l-4.5-4.5a.75.75 0 0 1 1.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 0 1 1.05-.143Z"
                  clip-rule="evenodd"
                />
                </svg>
            </span>
          </li>
        @endforeach
      </ul>
    @endif
  </div>
</div>

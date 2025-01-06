<a
  href="/users/{{ $user->id }}"
  class="block h-20 w-56"
  wire:navigate
>
  <div
    class="h-full relative flex items-center space-x-3 rounded-lg border border-gray-300 bg-budeguerGreen pl-6 shadow-sm focus-within:ring-2 focus-within:ring-indigo-500 focus-within:ring-offset-2 hover:border-gray-400"
  >
    <div class="shrink-0">
      <img
        class="size-8 rounded-full"
        src="{{ $user->profile_photo_path }}"
        alt="{{ $user->name }}"
      >
    </div>
    <div class="min-w-0 flex-1">
      <div class="focus:outline-none">
        <span
          class="absolute inset-0"
          aria-hidden="true"
        ></span>
        <p class="truncate text-white text-sm pr-2">{{ $user->name }}</p>
      </div>
    </div>
  </div>
</a>
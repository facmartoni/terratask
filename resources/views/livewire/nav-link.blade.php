<a wire:navigate href="{{ $href }}" @class([
  "w-1/5 border-b-2 px-1 py-2 text-center text-sm font-medium",
  "border-budeguerGreen text-budeguerGreen" => $active,
  "border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700" => !$active
  ])>
  <i class="pt-[1px] text-lg fa-solid {{ $icon }}"></i>
</a>
<div
  wire:click="toggle_like"
  class="w-8 text-center pl-2 flex flex-col justify-end pt-4"
>
  @php $icon_classes = 'size-6 -mb-1 text-red-600' @endphp
  @if(!$liked)
    <x-heroicon-o-heart class="{{ $icon_classes }}"/>
  @else
    <x-heroicon-s-heart class="{{ $icon_classes }}"/>
  @endif
  <span class="text-xxs mt-0.5">{{ $n_likes }}</span>
</div>

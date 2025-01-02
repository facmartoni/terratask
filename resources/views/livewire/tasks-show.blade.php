<div class="divide-y divide-gray-200 overflow-hidden rounded-lg bg-white shadow">
  @if($task->photo_url != '' && $task->photo_url != null)
    <div class="pb-5 sm:pb-6 flex items-center justify-center h-40">
      <div class="w-full h-full">
        <img
          src="{{ $task->photo_url }}"
          alt="Foto de la Tarea"
          onerror="
            this.src='{{ asset('images/grupo_isologo.png') }}';
            this.style.objectFit = 'contain';
            this.className += ' opacity-50 px-6';
          "
          class="w-full h-full object-cover"
        >
      </div>
    </div>
  @endif
  <div class="px-4 py-4 sm:px-6">
    <!-- Content goes here -->
    <!-- We use less vertical padding on card footers at all sizes than on headers or body sections -->
  </div>
</div>

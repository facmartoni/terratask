<div class="border-b border-gray-200 mt-2">
  <nav
    class="-mb-px flex"
    aria-label="Tabs"
  >
    <button
      wire:click="dispatch('show-assigned-tasks')"
      @class([
        "flex whitespace-nowrap border-b-2 px-4 py-4 text-sm font-medium",
        "border-indigo-500 text-indigo-600" => $current === 'assigned',
        "border-transparent text-gray-500 hover:border-gray-200 hover:text-gray-700" => $current !== 'assigned'
      ])
    >
      Asignadas
      <span @class([
        "ml-3 rounded-full px-2.5 py-0.5 text-xs font-medium md:inline-block",
        "bg-indigo-100 text-indigo-600" => $current === 'assigned',
        "bg-gray-200 text-gray-900" => $current !== 'assigned'
       ])>{{ $user->assigned_tasks->count() }}</span>
    </button>
    <button
      wire:click="dispatch('show-authored-tasks')"
      @class([
        "flex whitespace-nowrap border-b-2 px-4 py-4 text-sm font-medium",
        "border-indigo-500 text-indigo-600" => $current === 'authored',
        "border-transparent text-gray-500 hover:border-gray-200 hover:text-gray-700" => $current !== 'authored'
      ])
    >
      Creadas
      <span @class([
        "ml-3 rounded-full px-2.5 py-0.5 text-xs font-medium md:inline-block",
        "bg-indigo-100 text-indigo-600" => $current === 'authored',
        "bg-gray-200 text-gray-900" => $current !== 'authored'
       ])>{{ $user->authored_tasks->count() }}</span>
    </button>
  </nav>
</div>
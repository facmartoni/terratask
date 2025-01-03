<button
  type="button"
  @class([
    // "focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-budeguerGreen",
    "rounded px-2 py-1 text-xs font-semibold shadow-sm",
    "bg-white border border-budeguerGreen text-gray-900" => $completed,
    "bg-budeguerGreen text-white hover:bg-green-500" => !$completed
  ])
  wire:click="dispatch('task:toggle-complete')"
>{{ !$completed ? "Marcar cómo completada" : "Marcar cómo no completada" }}
</button>
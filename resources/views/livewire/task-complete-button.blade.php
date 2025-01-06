<button
  type="button"
  @class([
    // "focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-budeguerGreen",
    "rounded px-4 py-2 text-xxs font-semibold shadow-sm",
    "bg-white border border-budeguerGreen text-gray-900" => $completed,
    "bg-budeguerGreen text-white hover:bg-green-500" => !$completed
  ])
  wire:click="dispatch('task:toggle-complete')"
>{{ !$completed ? "MARCAR CÓMO COMPLETADA" : "✓ MARCAR CÓMO NO COMPLETADA" }}
</button>
@props(['size' => '10', 'user'])

<div class="shrink-0 size-{{ $size }}">
  <img
    class="w-full h-full rounded-full border border-budeguerGreen"
    src="{{ asset($user->profile_photo_path) }}"
    alt="{{ $user->name }}"
    onerror="this.src={{ asset('images/logo_budeguer_base_transparente.png') }}"
  >
</div>

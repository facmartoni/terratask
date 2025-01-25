@props(['lat', 'lon', 'w' => 300, 'h' => 100, 'z' => 8])

<div {{ $attributes->merge(['class' => 'h-full']) }}>
  <iframe
    width="{{ $w }}"
    height="{{ $h }}"
    style="border:0"
    loading="lazy"
    allowfullscreen
    src="https://www.google.com/maps?q={{ $lat }},{{ $lon }}&hl=es&z={{ $z }}&output=embed"
  >
  </iframe>
</div>

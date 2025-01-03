@props(['lat', 'lon'])

<div class="mt-6">
  <iframe
    width="300"
    height="100"
    style="border:0"
    loading="lazy"
    allowfullscreen
    src="https://www.google.com/maps?q={{ $lat }},{{ $lon }}&hl=es&z=8&output=embed">
  </iframe>
</div>

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta
    name="viewport"
    content="width=device-width, initial-scale=1"
  >
  <meta
    name="csrf-token"
    content="{{ csrf_token() }}"
  >

  <title>{{ config('app.name', 'Laravel') }}</title>

  <!-- Localforage -->
  <script src="{{ asset('/assets/localforage.min.js') }}"></script>

  {{-- START PWA CONFIG --}}

  <!-- Manifest Link -->
  <link
    rel="manifest"
    href="{{ asset('app.webmanifest') }}"
  >

  <!-- Apple Icon -->
  <link
    rel="apple-touch-icon"
    href="{{ asset('/icons/512.png') }}"
  >

  {{-- END PWA CONFIG --}}

  <!-- Fonts -->
  <link
    rel="preconnect"
    href="https://fonts.googleapis.com"
  >
  <link
    rel="preconnect"
    href="https://fonts.gstatic.com"
    crossorigin
  >
  <link
    href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=PT+Serif:ital,wght@0,400;0,700;1,400;1,700&family=Roboto+Slab:wght@100..900&display=swap"
    rel="stylesheet"
  >

  {{-- Fontawesome --}}
  <script
    src="https://kit.fontawesome.com/558b06b09e.js"
    crossorigin="anonymous"
  ></script>

  <!-- Scripts -->
  @vite(['resources/css/app.css', 'resources/js/app.js'])

  <!-- Styles -->
  @livewireStyles
</head>
<body class="font-sans antialiased">
<x-banner/>

<div
  class="min-h-screen bg-gray-100"
>

  <!-- Page Heading -->
  @if (isset($header))
    <header class="bg-white shadow">
      <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
        {{ $header }}
      </div>
    </header>
  @endif

  <!-- Page Content -->
  <main
    class="w-full h-full px-4 pt-4 pb-20"
  >
    {{ $slot }}
  </main>

  <livewire:nav/>
</div>

@stack('modals')

@livewireScripts
</body>
</html>

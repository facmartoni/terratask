<div class="fixed bottom-0 left-0 right-0 bg-white">
  <div class="border-y border-gray-200 standalone:pb-4">
    <nav
      class="-mb-px flex items-center"
      aria-label="Tabs"
    >
      <livewire:nav-link
        href="/"
        icon="fa-list-check"
        :active="request()->is('/')"
      />
      <livewire:nav-link
        href="/search"
        icon="fa-magnifying-glass"
        :active="request()->is('search')"
      />
      <livewire:nav-link
        href="/tasks-create"
        icon="fa-plus"
        :active="request()->is('tasks-create')"
      />
      <livewire:nav-link
        href="/map"
        icon="fa-map-pin"
        :active="request()->is('map')"
      />
      <livewire:nav-link
        href="/users/{{ Auth::id() }}"
        icon="fa-user"
        :active="request()->is('users/' . Auth::id())"
      />
    </nav>
  </div>
</div>

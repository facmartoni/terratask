<?php

  namespace App\Livewire;

  use Illuminate\Contracts\View\Factory;
  use Illuminate\Contracts\View\View;
  use Illuminate\Foundation\Application;

  class Map extends App {
    public function render(): Application|Factory|View|\Illuminate\View\View {
      return view('livewire.map');
    }
  }

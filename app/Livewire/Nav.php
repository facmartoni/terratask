<?php

namespace App\Livewire;

use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Livewire\Component;

class Nav extends Component
{
    public function render(): Application|Factory|View|\Illuminate\View\View {
        return view('livewire.nav');
    }
}

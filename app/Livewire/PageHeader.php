<?php

namespace App\Livewire;

use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Livewire\Component;

class PageHeader extends Component
{
    public string $title;
    public function render(): View|Factory|Application|\Illuminate\View\View {
        return view('livewire.page-header');
    }
}

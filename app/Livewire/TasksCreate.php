<?php

namespace App\Livewire;

use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.app')]
class TasksCreate extends Component
{
    public function render(): Application|Factory|View|\Illuminate\View\View {
        return view('livewire.tasks-create');
    }
}

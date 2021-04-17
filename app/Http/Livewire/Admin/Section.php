<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

class Section extends Component
{
    public string $tab;

    public function render()
    {
        return view('livewire.admin.section');
    }
}

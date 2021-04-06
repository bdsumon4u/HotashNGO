<?php

namespace App\Http\Livewire\Admin\Settings;

use Livewire\Component;

class Index extends Component
{
    /** @var string[] */
    public $tabs = ['general', 'social', 'about', 'mission', 'odometer', 'others'];

    /** @var string|null */
    public $tab;

    public function mount(string $tab = null): void
    {
        $this->tab = $tab ?: data_get($this->tabs, 0);
    }

    public function render()
    {
        return view('livewire.admin.settings.index');
    }
}

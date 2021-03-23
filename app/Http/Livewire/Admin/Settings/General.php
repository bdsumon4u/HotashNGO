<?php

namespace App\Http\Livewire\Admin\Settings;

use App\Settings\GeneralSettings;
use Livewire\Component;

class General extends Component
{
    public string $site_name;
    public string $tagline;
    public string $contact_email;
    public string $contact_phone;

    public $rules = [
        'site_name' => 'required|max:25',
        'tagline' => 'required|max:255',
        'contact_email' => 'required|max:55',
        'contact_phone' => 'required|max:35',
    ];

    public function mount(GeneralSettings $settings)
    {
        $this->fill($settings->toArray());
    }

    public function render()
    {
        return view('livewire.admin.settings.general');
    }

    public function submit(GeneralSettings $settings)
    {
        $settings->fill($this->validate());
        $settings->save();
    }
}

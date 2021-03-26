<?php

namespace App\Http\Livewire\Admin\Settings;

use App\Settings\GeneralSettings;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;

class General extends Component
{
    use WithFileUploads;

    public $logo;
    public $favicon;
    public string $site_name;
    public string $tagline;
    public string $contact_email;
    public string $contact_phone;
    public string $address;

    public $rules = [
        'logo' => 'required|max:255',
        'favicon' => 'required|max:255',
        'site_name' => 'required|max:25',
        'tagline' => 'required|max:255',
        'contact_email' => 'required|max:55',
        'contact_phone' => 'required|max:35',
        'address' => 'required|max:135',
    ];

    public function mount(GeneralSettings $settings): void
    {
        $this->fill($settings->toArray());
    }

    public function render()
    {
        return view('livewire.admin.settings.general');
    }

    public function submit(GeneralSettings $settings): void
    {
        $oldFiles = [
            'logo' => $settings->logo,
            'favicon' => $settings->favicon,
        ];

        $this->uploadFile('logo');
        $this->uploadFile('favicon');
        $settings->fill($this->validate());

        if ($settings->save()) {
            $this->removeOldFile('logo', $oldFiles['logo']);
            $this->removeOldFile('favicon', $oldFiles['favicon']);
        }
    }

    protected function uploadFile($name): string
    {
        if (!is_string($this->$name)) {
            $this->$name = 'storage' . DIRECTORY_SEPARATOR . Storage::disk('public')->putFile('site', $this->$name);
        }

        return $this->$name;
    }

    protected function removeOldFile($name, $oldFile): void
    {
        if ($this->$name !== $oldFile) {
            $filePath = Str::after($oldFile, 'storage' . DIRECTORY_SEPARATOR);
            Storage::disk('public')->delete($filePath);
        }
    }
}

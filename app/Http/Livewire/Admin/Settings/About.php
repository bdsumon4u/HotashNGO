<?php

namespace App\Http\Livewire\Admin\Settings;

use App\Settings\AboutSettings;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Laravel\Jetstream\InteractsWithBanner;
use Livewire\Component;
use Livewire\WithFileUploads;

class About extends Component
{
    use WithFileUploads;
    use InteractsWithBanner;

    public $image;
    public string $section_name_en;
    public string $section_name_bn;
    public string $section_title_en;
    public string $section_title_bn;
    public string $description_en;
    public string $description_bn;
    public string $button_text;
    public string $button_link;

    public $rules = [
        'image' => 'required|max:255',
        'section_name_en' => 'required|max:25',
        'section_name_bn' => 'required|max:25',
        'section_title_en' => 'required|max:255',
        'section_title_bn' => 'required|max:255',
        'description_en' => 'required',
        'description_bn' => 'required',
        'button_text' => 'nullable',
        'button_link' => 'nullable',
    ];

    public function mount(AboutSettings $settings): void
    {
        $this->fill($settings->toArray());
    }

    public function render()
    {
        return view('livewire.admin.settings.about');
    }

    public function submit(AboutSettings $settings): void
    {
        $oldImage = $settings->image;
        $this->uploadFile('image');
        $settings->fill($this->validate());

        if ($settings->save()) {
            $this->removeOldFile('image', $oldImage);
        }

        $this->banner('Successfully Saved The Data.');
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

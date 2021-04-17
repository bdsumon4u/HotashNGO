<?php

namespace App\Http\Livewire\Admin\Settings;

use App\Settings\MissionSettings;
use Laravel\Jetstream\InteractsWithBanner;
use Livewire\Component;

class Mission extends Component
{
    use InteractsWithBanner;

    public string $section_name;
    public string $section_title;
    public string $description;
    public string $home_title;
    public string $home_details;
    public string $medical_title;
    public string $medical_details;
    public string $food_title;
    public string $food_details;
    public string $education_title;
    public string $education_details;

    public $rules = [
        'section_name' => 'required|max:25',
        'section_title' => 'required|max:255',
        'description' => 'required',
        'home_title' => 'required',
        'home_details' => 'required',
        'medical_title' => 'required',
        'medical_details' => 'required',
        'food_title' => 'required',
        'food_details' => 'required',
        'education_title' => 'required',
        'education_details' => 'required',
    ];

    public function mount(MissionSettings $settings): void
    {
        $this->fill($settings->toArray());
    }

    public function render()
    {
        return view('livewire.admin.settings.mission');
    }

    public function submit(MissionSettings $settings): void
    {
        $settings->fill($this->validate());
        $settings->save();

        $this->banner('Successfully Saved The Data.');
    }
}

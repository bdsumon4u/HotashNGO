<?php

namespace App\Http\Livewire\Admin\Settings;

use App\Settings\MissionSettings;
use Laravel\Jetstream\InteractsWithBanner;
use Livewire\Component;

class Mission extends Component
{
    use InteractsWithBanner;

    public string $section_name_en;
    public string $section_name_bn;
    public string $section_title_en;
    public string $section_title_bn;
    public string $description_en;
    public string $description_bn;
    public string $home_title_en;
    public string $home_title_bn;
    public string $home_link;
    public string $home_details_en;
    public string $home_details_bn;
    public string $medical_title_en;
    public string $medical_title_bn;
    public string $medical_link;
    public string $medical_details_en;
    public string $medical_details_bn;
    public string $food_title_en;
    public string $food_title_bn;
    public string $food_link;
    public string $food_details_en;
    public string $food_details_bn;
    public string $education_title_en;
    public string $education_title_bn;
    public string $education_link;
    public string $education_details_en;
    public string $education_details_bn;

    public $rules = [
        'section_name_en' => 'required|max:45',
        'section_name_bn' => 'required|max:45',
        'section_title_en' => 'required|max:255',
        'section_title_bn' => 'required|max:255',
        'description_en' => 'required',
        'description_bn' => 'required',
        'home_title_en' => 'required',
        'home_title_bn' => 'required',
        'home_link' => 'required',
        'home_details_en' => 'required',
        'home_details_bn' => 'required',
        'medical_title_en' => 'required',
        'medical_link' => 'required',
        'medical_title_bn' => 'required',
        'medical_details_en' => 'required',
        'medical_details_bn' => 'required',
        'food_title_en' => 'required',
        'food_title_bn' => 'required',
        'food_link' => 'required',
        'food_details_en' => 'required',
        'food_details_bn' => 'required',
        'education_title_en' => 'required',
        'education_title_bn' => 'required',
        'education_link' => 'required',
        'education_details_en' => 'required',
        'education_details_bn' => 'required',
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

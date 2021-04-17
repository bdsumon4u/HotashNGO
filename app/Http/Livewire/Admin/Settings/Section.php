<?php

namespace App\Http\Livewire\Admin\Settings;

use App\Settings\SectionSettings;
use Laravel\Jetstream\InteractsWithBanner;
use Livewire\Component;

class Section extends Component
{
    use InteractsWithBanner;

    public string $tab;

    public string $team_name;
    public string $team_title;
    public string $team_description;

    public string $testimonial_name;
    public string $testimonial_title;
    public string $testimonial_description;

    public string $news_name;
    public string $news_title;
    public string $news_description;

    public $rules = [
        'team_name' => 'required|max:25',
        'team_title' => 'required|max:255',
        'team_description' => 'required',
        'testimonial_name' => 'required|max:25',
        'testimonial_title' => 'required|max:255',
        'testimonial_description' => 'required',
        'news_name' => 'required|max:25',
        'news_title' => 'required|max:255',
        'news_description' => 'required',
    ];

    public function mount(SectionSettings $settings): void
    {
        $this->fill($settings->toArray());
    }

    public function render()
    {
        return view('livewire.admin.settings.section');
    }

    public function submit(SectionSettings $settings): void
    {
        $settings->fill($this->validate());
        $settings->save();

        $this->banner('Successfully Saved The Data.');
    }
}

<?php

namespace App\Http\Livewire\Admin\Settings;

use App\Settings\SectionSettings;
use Laravel\Jetstream\InteractsWithBanner;
use Livewire\Component;

class Section extends Component
{
    use InteractsWithBanner;

    public string $tab;

    public string $team_name_en;
    public string $team_name_bn;
    public string $team_title_en;
    public string $team_title_bn;
    public string $team_description_en;
    public string $team_description_bn;

    public string $testimonial_name_en;
    public string $testimonial_name_bn;
    public string $testimonial_title_en;
    public string $testimonial_title_bn;
    public string $testimonial_description_en;
    public string $testimonial_description_bn;

    public string $news_name_en;
    public string $news_name_bn;
    public string $news_title_en;
    public string $news_title_bn;
    public string $news_description_en;
    public string $news_description_bn;

    public string $events_name_en;
    public string $events_name_bn;
    public string $events_title_en;
    public string $events_title_bn;
    public string $events_description_en;
    public string $events_description_bn;

    public string $projects_name_en;
    public string $projects_name_bn;
    public string $projects_title_en;
    public string $projects_title_bn;
    public string $projects_description_en;
    public string $projects_description_bn;

    public $rules = [
        'team_name_en' => 'required|max:45',
        'team_name_bn' => 'required|max:45',
        'team_title_en' => 'required|max:455',
        'team_title_bn' => 'required|max:455',
        'team_description_en' => 'required',
        'team_description_bn' => 'required',
        'testimonial_name_en' => 'required|max:45',
        'testimonial_name_bn' => 'required|max:45',
        'testimonial_title_en' => 'required|max:455',
        'testimonial_title_bn' => 'required|max:455',
        'testimonial_description_en' => 'required',
        'testimonial_description_bn' => 'required',
        'news_name_en' => 'required|max:45',
        'news_name_bn' => 'required|max:45',
        'news_title_en' => 'required|max:455',
        'news_title_bn' => 'required|max:455',
        'news_description_en' => 'required',
        'news_description_bn' => 'required',
        'events_name_en' => 'required|max:45',
        'events_name_bn' => 'required|max:45',
        'events_title_en' => 'required|max:455',
        'events_title_bn' => 'required|max:455',
        'events_description_en' => 'required',
        'events_description_bn' => 'required',
        'projects_name_en' => 'required|max:45',
        'projects_name_bn' => 'required|max:45',
        'projects_title_en' => 'required|max:455',
        'projects_title_bn' => 'required|max:455',
        'projects_description_en' => 'required',
        'projects_description_bn' => 'required',
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

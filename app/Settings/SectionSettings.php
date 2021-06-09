<?php

namespace App\Settings;

use Spatie\LaravelSettings\Settings;

class SectionSettings extends Settings
{
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

    public static function group(): string
    {
        return 'section';
    }
}

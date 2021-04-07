<?php

namespace App\Settings;

use Spatie\LaravelSettings\Settings;

class SectionSettings extends Settings
{
    public string $team_name;
    public string $team_title;
    public string $team_description;

    public string $testimonial_name;
    public string $testimonial_title;
    public string $testimonial_description;

    public string $news_name;
    public string $news_title;
    public string $news_description;

    public static function group(): string
    {
        return 'section';
    }
}

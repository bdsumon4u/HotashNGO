<?php

namespace App\Settings;

use Spatie\LaravelSettings\Settings;

class MissionSettings extends Settings
{
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

    public static function group(): string
    {
        return 'mission';
    }
}

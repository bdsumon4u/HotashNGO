<?php

namespace App\Settings;

use Spatie\LaravelSettings\Settings;

class MissionSettings extends Settings
{
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

    public static function group(): string
    {
        return 'mission';
    }
}

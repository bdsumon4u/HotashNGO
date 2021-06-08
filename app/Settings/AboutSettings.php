<?php

namespace App\Settings;

use Spatie\LaravelSettings\Settings;

class AboutSettings extends Settings
{
    public string $image;
    public string $section_name_en;
    public string $section_name_bn;
    public string $section_title_en;
    public string $section_title_bn;
    public string $description_en;
    public string $description_bn;
    public string $button_text;
    public string $button_link;

    public static function group(): string
    {
        return 'about';
    }
}

<?php

namespace App\Settings;

use Spatie\LaravelSettings\Settings;

class AboutSettings extends Settings
{
    public string $image;
    public string $section_name;
    public string $section_title;
    public string $description;
    public string $button_text;
    public string $button_link;

    public static function group(): string
    {
        return 'about';
    }
}

<?php

namespace App\Settings;

use Spatie\LaravelSettings\Settings;

class SocialSettings extends Settings
{
    public string $facebook;
    public string $twitter;
    public string $instagram;
    public string $youtube;

    public static function group(): string
    {
        return 'social';
    }
}

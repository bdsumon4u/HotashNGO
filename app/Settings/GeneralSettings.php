<?php

namespace App\Settings;

use Spatie\LaravelSettings\Settings;

class GeneralSettings extends Settings
{
    public string $site_name;
    public string $tagline;
    public string $contact_email;
    public string $contact_phone;

    public static function group(): string
    {
        return 'general';
    }
}

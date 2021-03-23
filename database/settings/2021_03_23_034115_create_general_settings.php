<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

class CreateGeneralSettings extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('general.logo', 'hotash-ngo.png');
        $this->migrator->add('general.favicon', 'hotash-ngo.png');
        $this->migrator->add('general.site_name', config('app.name'));
        $this->migrator->add('general.tagline', 'Help People, Make a Happy World.');
        $this->migrator->add('general.contact_email', 'support@cyber32.com');
        $this->migrator->add('general.contact_phone', '+8801xxxxxxxxx');
    }
}

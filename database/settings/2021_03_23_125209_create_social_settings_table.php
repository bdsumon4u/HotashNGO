<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

class CreateSocialSettingsTable extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('social.facebook', 'https://www.facebook.com/cyber32.it');
        $this->migrator->add('social.twitter', '');
        $this->migrator->add('social.instagram', '');
        $this->migrator->add('social.youtube', 'https://www.youtube.com/channel/UCon11yph8-CfBp7Cv7BhHPg');
    }
}

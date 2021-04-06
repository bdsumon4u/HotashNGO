<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

class CreateAboutSettings extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('about.image', 'about-us.jpg');
        $this->migrator->add('about.section_name', 'About Us');
        $this->migrator->add('about.section_title', 'We\'re for social causes');
        $this->migrator->add('about.description', 'We exist for non-profits, social enterprises, community groups, activists,lorem politicians and individual citizens that are making. Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolore minima atque obcaecati deleniti tempora, cumque molestiae consectetur provident temporibus natus iste accusamus totam voluptas quas suscipit blanditiis fuga quibusdam porro. It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.');
        $this->migrator->add('about.button_text', 'Donate Now');
        $this->migrator->add('about.button_link', 'donate-now');
    }
}

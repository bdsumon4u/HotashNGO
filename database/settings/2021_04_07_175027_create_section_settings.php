<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

class CreateSectionSettings extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('section.team_name', 'Volunteers');
        $this->migrator->add('section.team_title', 'Meet our excellent volunteers');
        $this->migrator->add('section.team_description', 'We exist for non-profits, social enterprises, community groups, activists,lorem politicians and individual citizens that are making.');
        $this->migrator->add('section.testimonial_name', 'Reviews');
        $this->migrator->add('section.testimonial_title', 'Review from our clients');
        $this->migrator->add('section.testimonial_description', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Similique illum excepturi ab quam magnam earum');
        $this->migrator->add('section.news_name', 'Latest news & blog');
        $this->migrator->add('section.news_title', 'Latest charity blog');
        $this->migrator->add('section.news_description', 'We exist for non-profits, social enterprises, community groups, activists,lorem politicians and individual citizens that are making.');
    }
}

<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

class CreateMissionSettings extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('mission.section_name', 'Our Mission');
        $this->migrator->add('mission.section_title', 'Our goals and missions');
        $this->migrator->add('mission.description', 'We exist for non-profits, social enterprises, community groups, activists,lorem politicians and individual citizens that are making.');
        $this->migrator->add('mission.home_title', 'Build Home');
        $this->migrator->add('mission.home_details', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Similique illum excepturi ab quam magnam earum');
        $this->migrator->add('mission.medical_title', 'Medical Facilities');
        $this->migrator->add('mission.medical_details', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Similique illum excepturi ab quam magnam earum');
        $this->migrator->add('mission.food_title', 'Food & Water');
        $this->migrator->add('mission.food_details', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Similique illum excepturi ab quam magnam earum');
        $this->migrator->add('mission.education_title', 'Education Facilities');
        $this->migrator->add('mission.education_details', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Similique illum excepturi ab quam magnam earum');
    }
}

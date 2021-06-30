<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

class CreateMissionSettings extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('mission.section_name_en', 'Our Mission');
        $this->migrator->add('mission.section_name_bn', 'Bangla Our Mission');
        $this->migrator->add('mission.section_title_en', 'Our goals and missions');
        $this->migrator->add('mission.section_title_bn', 'Bangla Our goals and missions');
        $this->migrator->add('mission.description_en', 'We exist for non-profits, social enterprises, community groups, activists,lorem politicians and individual citizens that are making.');
        $this->migrator->add('mission.description_bn', 'Bangla We exist for non-profits, social enterprises, community groups, activists,lorem politicians and individual citizens that are making.');
        $this->migrator->add('mission.home_title_en', 'Build Home');
        $this->migrator->add('mission.home_title_bn', 'Bangla Build Home');
        $this->migrator->add('mission.home_link', '/');
        $this->migrator->add('mission.home_details_en', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Similique illum excepturi ab quam magnam earum');
        $this->migrator->add('mission.home_details_bn', 'Bangla Lorem ipsum dolor, sit amet consectetur adipisicing elit. Similique illum excepturi ab quam magnam earum');
        $this->migrator->add('mission.medical_title_en', 'Medical Facilities');
        $this->migrator->add('mission.medical_title_bn', 'Bangla Medical Facilities');
        $this->migrator->add('mission.medical_link', '/medical-facilities');
        $this->migrator->add('mission.medical_details_en', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Similique illum excepturi ab quam magnam earum');
        $this->migrator->add('mission.medical_details_bn', 'Bangla Lorem ipsum dolor, sit amet consectetur adipisicing elit. Similique illum excepturi ab quam magnam earum');
        $this->migrator->add('mission.food_title_en', 'Food & Water');
        $this->migrator->add('mission.food_title_bn', 'Bangla Food & Water');
        $this->migrator->add('mission.food_link', '/food-donation');
        $this->migrator->add('mission.food_details_en', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Similique illum excepturi ab quam magnam earum');
        $this->migrator->add('mission.food_details_bn', 'Bangla Lorem ipsum dolor, sit amet consectetur adipisicing elit. Similique illum excepturi ab quam magnam earum');
        $this->migrator->add('mission.education_title_en', 'Education Facilities');
        $this->migrator->add('mission.education_title_bn', 'Bangla Education Facilities');
        $this->migrator->add('mission.education_link', '/education-facilities');
        $this->migrator->add('mission.education_details_en', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Similique illum excepturi ab quam magnam earum');
        $this->migrator->add('mission.education_details_bn', 'Bangla Lorem ipsum dolor, sit amet consectetur adipisicing elit. Similique illum excepturi ab quam magnam earum');
    }
}

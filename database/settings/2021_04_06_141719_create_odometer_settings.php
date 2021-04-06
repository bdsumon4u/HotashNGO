<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

class CreateOdometerSettings extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('odometer.fund_amount', '30M');
        $this->migrator->add('odometer.event_count', 250);
        $this->migrator->add('odometer.volunteer_count', 550);
        $this->migrator->add('odometer.donor_count', 500);
    }
}

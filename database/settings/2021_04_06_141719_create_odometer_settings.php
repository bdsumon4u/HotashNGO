<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

class CreateOdometerSettings extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('odometer.fund_amount', '30M');
        $this->migrator->add('odometer.fund_message_en', 'Total fund raised');
        $this->migrator->add('odometer.fund_message_bn', 'Bangla Total fund raised');
        $this->migrator->add('odometer.event_count', 250);
        $this->migrator->add('odometer.event_message_en', 'Successful events');
        $this->migrator->add('odometer.event_message_bn', 'Bangla Successful events');
        $this->migrator->add('odometer.volunteer_count', 550);
        $this->migrator->add('odometer.volunteer_message_en', 'Worldwide volunteers');
        $this->migrator->add('odometer.volunteer_message_bn', 'Bangla Worldwide volunteers');
        $this->migrator->add('odometer.donor_count', 500);
        $this->migrator->add('odometer.donor_message_en', 'Our donner');
        $this->migrator->add('odometer.donor_message_bn', 'Bangla Our donner');
    }
}

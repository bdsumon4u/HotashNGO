<?php

namespace App\Settings;

use Spatie\LaravelSettings\Settings;

class OdometerSettings extends Settings
{
    public string $fund_amount;
    public string $fund_message_en;
    public string $fund_message_bn;
    public int $event_count;
    public string $event_message_en;
    public string $event_message_bn;
    public int $volunteer_count;
    public string $volunteer_message_en;
    public string $volunteer_message_bn;
    public int $donor_count;
    public string $donor_message_en;
    public string $donor_message_bn;

    public static function group(): string
    {
        return 'odometer';
    }
}

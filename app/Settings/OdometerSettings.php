<?php

namespace App\Settings;

use Spatie\LaravelSettings\Settings;

class OdometerSettings extends Settings
{
    public string $fund_amount;
    public int $event_count;
    public int $volunteer_count;
    public int $donor_count;

    public static function group(): string
    {
        return 'odometer';
    }
}

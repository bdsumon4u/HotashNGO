<?php

namespace App\Http\Livewire\Admin\Settings;

use App\Settings\OdometerSettings;
use Laravel\Jetstream\InteractsWithBanner;
use Livewire\Component;

class Odometer extends Component
{
    use InteractsWithBanner;

    public string $fund_amount;
    public int $event_count;
    public int $volunteer_count;
    public int $donor_count;

    public $rules = [
        'fund_amount' => 'required',
        'event_count' => 'required|integer',
        'volunteer_count' => 'required|integer',
        'donor_count' => 'required|integer',
    ];

    public function mount(OdometerSettings $settings): void
    {
        $this->fill($settings->toArray());
    }

    public function render()
    {
        return view('livewire.admin.settings.odometer');
    }

    public function submit(OdometerSettings $settings): void
    {
        $settings->fill($this->validate());
        $settings->save();

        $this->banner('Successfully Saved The Data.');
    }
}

<?php

namespace App\Http\Livewire\Admin\Settings;

use App\Settings\OdometerSettings;
use Laravel\Jetstream\InteractsWithBanner;
use Livewire\Component;

class Odometer extends Component
{
    use InteractsWithBanner;

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

    public $rules = [
        'fund_amount' => 'required',
        'fund_message_en' => 'required|max:100',
        'fund_message_bn' => 'required|max:100',
        'event_count' => 'required|integer',
        'event_message_en' => 'required|max:100',
        'event_message_bn' => 'required|max:100',
        'volunteer_count' => 'required|integer',
        'volunteer_message_en' => 'required|max:100',
        'volunteer_message_bn' => 'required|max:100',
        'donor_count' => 'required|integer',
        'donor_message_en' => 'required|max:100',
        'donor_message_bn' => 'required|max:100',
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

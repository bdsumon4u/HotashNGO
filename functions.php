<?php

use App\Models\Event;
use App\Models\Image;
use App\Models\News;

if (!function_exists('setting')) {
    function setting(string $group, string $name, $default = null) {
        $setting = collect(config('settings.settings', []))
            ->first(function ($setting) use ($group) {
                return $setting::group() === $group;
            });

        return resolve($setting)->$name ?: $default;
    }
}

if (!function_exists('recent_news')) {
    function recent_news(int $count, $except = []) {
        $except = is_array($except) ? $except : [$except];
        return News::whereNotIn('id', $except)
            ->with('media', 'translations')
            ->latest('id')
            ->take($count)
            ->inRandomOrder()
            ->get();
    }
}

if (!function_exists('recent_events')) {
    function recent_events(int $count) {
        return Event::with('media', 'translations')
            ->latest('id')
            ->take($count)
            ->get();
    }
}

if (!function_exists('random_volunteers')) {
    function random_volunteers(int $count = 3) {
        return Image::with('media')
            ->firstOrCreate(['collection' => 'people'])
            ->media()
            ->where('collection_name', 'people')
            ->inRandomOrder()
            ->take($count)
            ->get();
    }
}

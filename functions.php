<?php

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

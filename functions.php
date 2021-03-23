<?php

if (!function_exists('setting')) {
    function setting(string $group, string $name, $default = null) {
        $setting = collect(config('settings.settings', []))
            ->first(function ($setting) use ($group) {
                return $setting::group() === $group;
            });

        return resolve($setting)->$name ?: $default;
    }
}

<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\File;

/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

Artisan::command('app:size', function () {
    $app_mb = config('app.size', 5000);
    $save = $app_mb * 20 / 100;
    $save = $save < 500 ? 500 : $save;

    $app_size =  collect(File::allFiles(base_path()))->sum->getSize() / (($app_mb - $save) * 10000);
    cache()->put('app_size', round($app_size), 25 * 60 * 60);
})->purpose('Application size as percentage.');

Artisan::command('cache:size', function () {
    $cache_mb = config('cache.size', 10);
    $cache_size = collect(File::allFiles(storage_path('framework')))->sum->getSize() / ($cache_mb * 10000);
    cache()->put('cache_size', round($cache_size), 25 * 60 * 60);
})->purpose('Cache size as percentage.');

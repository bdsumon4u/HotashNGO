<?php

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//dd(cache()->remember('storage', 60, function () {
//    return collect(File::allFiles(base_path()))->sum->getSize() / (10 * 10000000);
//}));

Route::post('locale', function () { return back(); })->name('locale');

Route::get('/', \App\Http\Controllers\HomeController::class)->name('home');

Route::view('/about-us', 'pages.about-us')->name('about-us');
Route::view('/events', 'pages.events.index')->name('events.index');
Route::view('/events/{event}', 'pages.events.show')->name('events.show');
Route::view('/contact-us', 'pages.contact-us')->name('contact-us');
Route::view('/donate', 'pages.donate')->name('donate');

Route::get('/news', [\App\Http\Controllers\NewsController::class, 'index'])->name('news.index');
Route::get('/news/{news:slug}', [\App\Http\Controllers\NewsController::class, 'show'])->name('news.show');

Route::get('/events', [\App\Http\Controllers\EventController::class, 'index'])->name('events.index');
Route::get('/events/{event:slug}', [\App\Http\Controllers\EventController::class, 'show'])->name('events.show');

Route::get('/gallery', \App\Http\Controllers\GalleryController::class)->name('gallery');
Route::get('/team', \App\Http\Controllers\TeamController::class)->name('team');
Route::get('/testimonials', \App\Http\Controllers\TestimonialController::class)->name('testimonials');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::group(['prefix' => 'admin', 'middleware' => ['auth:sanctum', 'verified'], 'as' => 'admin.'], function () {
    Route::get('/settings/{tab?}', fn ($tab = null) => view('admin.settings', compact('tab')))->name('settings');
    Route::view('/menu-builder', 'admin.menu-builder')->name('menu-builder');
    Route::resources([
        'slides' => \App\Http\Controllers\Admin\SlideController::class,
        'pages' => \App\Http\Controllers\Admin\PageController::class,
        'images' => \App\Http\Controllers\Admin\GalleryController::class,
        'people' => \App\Http\Controllers\Admin\PersonController::class,
        'testimonials' => \App\Http\Controllers\Admin\TestimonialController::class,
        'news' => \App\Http\Controllers\Admin\NewsController::class,
        'events' => \App\Http\Controllers\Admin\EventController::class,
    ]);
});

if (\Illuminate\Support\Facades\Schema::hasTable('pages')) {
    Route::get('{page:slug}', function (\App\Models\Page $page) {
        return view('pages.page', compact('page'));
    })->name('page.show');
}

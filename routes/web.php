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

//collect(File::allFiles(base_path()))->sum->getSize()

Route::post('locale', function () { return back(); })->name('locale');

Route::view('/', 'pages.home')->name('home');
Route::view('/about-us', 'pages.about-us')->name('about-us');
Route::view('/events', 'pages.events.index')->name('events.index');
Route::view('/events/{event}', 'pages.events.show')->name('events.show');
Route::view('/contact-us', 'pages.contact-us')->name('contact-us');
Route::view('/donate', 'pages.donate')->name('donate');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::group(['prefix' => 'admin', 'middleware' => ['auth:sanctum', 'verified'], 'as' => 'admin.'], function () {
    Route::get('/settings/{tab?}', fn ($tab = null) => view('admin.settings', compact('tab')))->name('settings');
    Route::resources([
        'slides' => \App\Http\Controllers\Admin\SlideController::class,
        'pages' => \App\Http\Controllers\Admin\PageController::class,
    ]);
});

if (\Illuminate\Support\Facades\Schema::hasTable('pages')) {
    Route::get('{page:slug}', function (\App\Models\Page $page) {
        return view('pages.page', compact('page'));
    })->name('page.show');
}

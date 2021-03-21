<?php

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

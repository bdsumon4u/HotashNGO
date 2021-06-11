<?php

use Illuminate\Support\Facades\Route;
use UniSharp\LaravelFilemanager\Middlewares\CreateDefaultFolder;
use UniSharp\LaravelFilemanager\Middlewares\MultiUser;

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

Route::get('/', \App\Http\Controllers\HomeController::class)->name('home');

Route::view('/about-us', 'pages.about-us')->name('about-us');
Route::match(['get', 'post'], 'contact-us', \App\Http\Controllers\ContactController::class)->name('contact-us');

Route::get('/news', [\App\Http\Controllers\NewsController::class, 'index'])->name('news.index');
Route::get('/news/{news:slug}', [\App\Http\Controllers\NewsController::class, 'show'])->name('news.show');

Route::get('/events', [\App\Http\Controllers\EventController::class, 'index'])->name('events.index');
Route::get('/events/{event:slug}', [\App\Http\Controllers\EventController::class, 'show'])->name('events.show');

Route::get('/projects', [\App\Http\Controllers\ProjectController::class, 'index'])->name('projects.index');
Route::get('/projects/{project:slug}', [\App\Http\Controllers\ProjectController::class, 'show'])->name('projects.show');

Route::get('/search', \App\Http\Controllers\SearchController::class)->name('search');

Route::get('/media', \App\Http\Controllers\MediaController::class)->name('media');
Route::get('/video-stream/{media}', \App\Http\Controllers\VideoStreamController::class)->name('video-stream');
Route::get('/team', \App\Http\Controllers\TeamController::class)->name('team');
Route::get('/speeches', [\App\Http\Controllers\TestimonialController::class, 'index'])->name('testimonials.index');
Route::get('/speeches/{speech}', [\App\Http\Controllers\TestimonialController::class, 'show'])->name('testimonials.show');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

\Illuminate\Support\Facades\Route::model('speech', \Spatie\MediaLibrary\MediaCollections\Models\Media::class);
Route::group(['prefix' => 'admin', 'middleware' => ['web', 'auth:sanctum', 'verified'], 'as' => 'admin.'], function () {
    Route::get('/settings/{tab?}', fn ($tab = null) => view('admin.settings', compact('tab')))->name('settings');
    Route::view('/sections/{tab}', 'admin.sections')->name('sections');
    Route::view('/menu-builder', 'admin.menu-builder')->name('menu-builder');
    Route::resources([
        'slides' => \App\Http\Controllers\Admin\SlideController::class,
        'pages' => \App\Http\Controllers\Admin\PageController::class,
        'people' => \App\Http\Controllers\Admin\PersonController::class,
        'news' => \App\Http\Controllers\Admin\NewsController::class,
        'events' => \App\Http\Controllers\Admin\EventController::class,
        'projects' => \App\Http\Controllers\Admin\ProjectController::class,
        'media' => \App\Http\Controllers\Admin\MediaController::class,
    ]);

    Route::resource('speeches', \App\Http\Controllers\Admin\TestimonialController::class)
        ->parameter('speech', 'testimonial')->names('testimonials');

    Route::post('cache-refresh', \App\Http\Controllers\CacheController::class)->name('cache-refresh');
});

if (\Illuminate\Support\Facades\Schema::hasTable('pages')) {
    Route::get('{page:slug}', function (\App\Models\Page $page) {
        return view('pages.page', compact('page'));
    })->name('page.show');
}

Route::group(['prefix' => 'laravel-filemanager', 'as' => 'unisharp.lfm.', 'middleware' => ['web', 'auth', CreateDefaultFolder::class, MultiUser::class]], function () {

    // display main layout
    Route::get('/', [\UniSharp\LaravelFilemanager\Controllers\LfmController::class, 'show'])->name('show');

    // display integration error messages
    Route::get('/errors', [\UniSharp\LaravelFilemanager\Controllers\LfmController::class, 'getErrors'])->name('getErrors');

    // upload
    Route::any('/upload', [\UniSharp\LaravelFilemanager\Controllers\UploadController::class, 'upload'])->name('upload');

    // list images & files
    Route::get('/jsonitems', [\UniSharp\LaravelFilemanager\Controllers\ItemsController::class, 'getItems'])->name('getItems');

    Route::get('/move', [\UniSharp\LaravelFilemanager\Controllers\ItemsController::class, 'move'])->name('move');

    Route::get('/domove', [\UniSharp\LaravelFilemanager\Controllers\ItemsController::class, 'domove'])->name('domove');

    // folders
    Route::get('/newfolder', [\UniSharp\LaravelFilemanager\Controllers\FolderController::class, 'getAddfolder'])->name('getAddfolder');

    // list folders
    Route::get('/folders', [\UniSharp\LaravelFilemanager\Controllers\FolderController::class, 'getFolders'])->name('getFolders');

    // crop
    Route::get('/crop', [\UniSharp\LaravelFilemanager\Controllers\CropController::class, 'getCrop'])->name('getCrop');
    Route::get('/cropimage', [\UniSharp\LaravelFilemanager\Controllers\CropController::class, 'getCropimage'])->name('getCropimage');
    Route::get('/cropnewimage', [\UniSharp\LaravelFilemanager\Controllers\CropController::class, 'getNewCropimage'])->name('getCropnewimage');

    // rename
    Route::get('/rename', [\UniSharp\LaravelFilemanager\Controllers\RenameController::class, 'getRename'])->name('getRename');

    // scale/resize
    Route::get('/resize', [\UniSharp\LaravelFilemanager\Controllers\ResizeController::class, 'getResize'])->name('getResize');
    Route::get('/doresize', [\UniSharp\LaravelFilemanager\Controllers\ResizeController::class, 'performResize'])->name('performResize');

    // download
    Route::get('/download', [\UniSharp\LaravelFilemanager\Controllers\DownloadController::class, 'getDownload'])->name('getDownload');

    // delete
    Route::get('/delete', [\UniSharp\LaravelFilemanager\Controllers\DeleteController::class, 'getDelete'])->name('getDelete');

    Route::get('/demo', [\UniSharp\LaravelFilemanager\Controllers\DemoController::class, 'index']);
});

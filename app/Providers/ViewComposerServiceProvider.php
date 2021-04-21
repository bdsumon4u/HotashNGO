<?php

namespace App\Providers;

use App\Models\Media;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewComposerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('pages.partials.banner', function ($view) {
            $slides = Media::where('collection', 'slides')
                ->with('media')
                ->firstOrCreate(['collection' => 'slides'])
                ->getMedia('slides');
            return $view->with(compact('slides'));
        });
    }
}

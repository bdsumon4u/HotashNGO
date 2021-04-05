<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class CacheController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        Artisan::call('optimize:clear');
//        Artisan::call('config:cache');
        Artisan::call('view:cache');
        Artisan::call('cache:size');

        $this->banner('Application is Optimized.');
        return back();
    }
}

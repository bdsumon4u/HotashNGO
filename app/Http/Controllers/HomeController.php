<?php

namespace App\Http\Controllers;

use App\Models\Media;
use App\Models\News;
use App\Models\Project;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $testimonials = Media::with('media')
            ->firstOrCreate(['collection' => 'testimonials'])
            ->media()
            ->where('collection_name', 'testimonials')
            ->inRandomOrder()
            ->take(3)
            ->get();

        $projects = Project::with('media', 'translations')
            ->where('category', 'completed')
            ->inRandomOrder()
            ->latest('id')
            ->take(3)
            ->get();

        $news = News::with('media', 'translations')
            ->inRandomOrder()
            ->latest('id')
            ->take(3)
            ->get();

        return view('pages.home', compact('testimonials', 'projects', 'news'));
    }
}

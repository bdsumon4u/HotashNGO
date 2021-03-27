<?php

namespace App\Http\Controllers;

use App\Models\Image;
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
        $people = Image::with('media')
            ->firstOrCreate(['collection' => 'people'])
            ->media()
            ->where('collection_name', 'people')
            ->inRandomOrder()
            ->take(3)
            ->get();

        $testimonials = Image::with('media')
            ->firstOrCreate(['collection' => 'testimonials'])
            ->media()
            ->where('collection_name', 'testimonials')
            ->inRandomOrder()
            ->take(3)
            ->get();

        return view('pages.home', compact('people', 'testimonials'));
    }
}

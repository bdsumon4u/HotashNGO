<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    private string $collection = 'people';

    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $people = Image::with('media')
            ->firstOrCreate(['collection' => $this->collection])
            ->media()
            ->where('collection_name', $this->collection)
            ->inRandomOrder()
            ->take(3)
            ->get();

        return view('pages.home', compact('people'));
    }
}

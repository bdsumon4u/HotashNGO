<?php

namespace App\Http\Controllers;

use App\Models\Image;

class GalleryController extends Controller
{
    private string $collection = 'gallery';

    /**
     * Handle the incoming request.
     *
     * @return \Illuminate\Http\Response
     */
    public function __invoke()
    {
        $images = Image::with('media')
            ->firstOrCreate(['collection' => $this->collection])
            ->media()
            ->where('collection_name', $this->collection)
            ->latest('id')
            ->paginate(12);

        return view('pages.gallery', compact('images'));
    }
}

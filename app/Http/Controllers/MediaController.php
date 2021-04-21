<?php

namespace App\Http\Controllers;

use App\Models\Media;

class MediaController extends Controller
{
    private string $collection = 'gallery';

    /**
     * Handle the incoming request.
     *
     * @return \Illuminate\Http\Response
     */
    public function __invoke()
    {
        $media = Media::with('media')
            ->firstOrCreate(['collection' => $this->collection])
            ->media()
            ->where('collection_name', request('type'))
            ->latest('id')
            ->paginate(12);

        return view('pages.media', compact('media'));
    }
}

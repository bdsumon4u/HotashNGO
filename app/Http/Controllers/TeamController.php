<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;

class TeamController extends Controller
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
            ->latest('id')
            ->paginate(6);

        return view('pages.team', compact('people'));
    }
}

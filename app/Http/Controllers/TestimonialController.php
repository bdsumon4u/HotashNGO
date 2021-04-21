<?php

namespace App\Http\Controllers;

use App\Models\Media;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media as SpatieMedia;

class TestimonialController extends Controller
{
    private string $collection = 'testimonials';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $testimonials = Media::with('media')
            ->firstOrCreate(['collection' => $this->collection])
            ->media()
            ->where('collection_name', $this->collection)
            ->latest('id')
            ->paginate(6);

        return view('pages.testimonials.index', compact('testimonials'));
    }

    /**
     * Display the specified resource.
     *
     * @param SpatieMedia $speech
     * @return \Illuminate\Http\Response
     */
    public function show(SpatieMedia $speech)
    {
        return view('pages.testimonials.show', ['testimonial' => $speech]);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

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
        $testimonials = Image::with('media')
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
     * @param Media $speech
     * @return \Illuminate\Http\Response
     */
    public function show(Media $speech)
    {
        return view('pages.testimonials.show', ['testimonial' => $speech]);
    }
}

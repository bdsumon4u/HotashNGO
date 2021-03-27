<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
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
            ->paginate(12);

        return view('admin.testimonials.index', compact('testimonials'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.testimonials.editor', [
            'testimonial' => new Media,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'image' => 'required|image',
            'name' => 'required|string|max:35',
            'designation' => 'required|string|max:35',
            'rating' => 'required|integer',
            'review' => 'nullable|string',
        ]);

        $this->testimonialMaker($data);

        return redirect()->action([static::class, 'index']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Media $testimonial
     * @return \Illuminate\Http\Response
     */
    public function edit(Media $testimonial)
    {
        return view('admin.testimonials.editor', compact('testimonial'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param Media $testimonial
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Media $testimonial)
    {
        $data = $request->validate([
            'image' => 'nullable|image',
            'name' => 'required|string|max:35',
            'designation' => 'required|string|max:35',
            'rating' => 'required|integer',
            'review' => 'nullable|string',
        ]);

        if ($request->hasFile('image')) {
            $this->testimonialMaker($data);
            $testimonial->delete();
        } else {
            $testimonial->setCustomProperty('name', $data['name']);
            $testimonial->setCustomProperty('designation', $data['designation']);
            $testimonial->setCustomProperty('rating', $data['rating']);
            $testimonial->setCustomProperty('review', $data['review']);
            $testimonial->save();
        }

        return redirect()->action([static::class, 'index']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Media $testimonial
     * @return \Illuminate\Http\Response
     */
    public function destroy(Media $testimonial)
    {
        $testimonial->delete();

        return back();
    }

    private function getFileName($file)
    {
        return Str::slug(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME)) . '.' . $file->getClientOriginalExtension();
    }

    private function testimonialMaker(array $data)
    {
        return Image::firstOrCreate(['collection' => $this->collection])
            ->addMedia($data['image'])
            ->usingFileName($this->getFileName($data['image']))
            ->withCustomProperties([
                'name' => $data['name'],
                'designation' => $data['designation'],
                'rating' => $data['rating'],
                'review' => $data['review'],
            ])
            ->toMediaCollection($this->collection);
    }
}

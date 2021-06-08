<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Media;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
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
            'testimonial' => new SpatieMedia(),
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
        $data = $this->validatedData($request);

        $this->testimonialMaker($data);

        $this->banner('New Testimonial is Created.');

        return redirect()->action([static::class, 'index']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Media $testimonial
     * @return \Illuminate\Http\Response
     */
    public function edit(SpatieMedia $testimonial)
    {
        return view('admin.testimonials.editor', compact('testimonial'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param SpatieMedia $testimonial
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SpatieMedia $testimonial)
    {
        $data = $this->validatedData($request, [
            'image' => 'nullable|image',
        ]);

        if ($request->hasFile('image')) {
            $this->testimonialMaker($data);
            $testimonial->delete();
        } else {
            $testimonial->setCustomProperty('name', $data['name']);
            $testimonial->setCustomProperty('designation', $data['designation']);
            $testimonial->setCustomProperty('rating', $data['rating']);
            $testimonial->setCustomProperty('review_en', $data['review_en']);
            $testimonial->setCustomProperty('review_bn', $data['review_bn']);
            $testimonial->save();
        }

        $this->banner('The Testimonial is Updated.');

        return redirect()->action([static::class, 'index']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param SpatieMedia $testimonial
     * @return \Illuminate\Http\Response
     */
    public function destroy(SpatieMedia $testimonial)
    {
        $testimonial->delete();

        $this->banner('The Testimonial is Deleted.');

        return back();
    }

    private function getFileName($file)
    {
        return Str::slug(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME)) . '.' . $file->getClientOriginalExtension();
    }

    private function testimonialMaker(array $data)
    {
        return Media::firstOrCreate(['collection' => $this->collection])
            ->addMedia($data['image'])
            ->usingFileName($this->getFileName($data['image']))
            ->withCustomProperties(Arr::only($data, ['name', 'designation', 'rating', 'review_en', 'review_bn']))
            ->toMediaCollection($this->collection);
    }

    private function validatedData(Request $request, array $merge = []): array
    {
        $data = $request->validate(array_merge([
            'image' => 'required|image',
            'name' => 'required|string|max:35',
            'designation' => 'required|string|max:35',
            'rating' => 'nullable|integer',
            'review_en' => 'nullable|string',
            'review_bn' => 'nullable|string',
        ], $merge));
        $data['rating'] = $data['rating'] ?: 5;
        return $data;
    }
}

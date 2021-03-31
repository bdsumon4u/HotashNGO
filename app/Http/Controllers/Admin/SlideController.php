<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class SlideController extends Controller
{
    private string $collection = 'slides';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $slides = Image::where('collection', $this->collection)
            ->with('media')
            ->firstOrCreate(['collection' => $this->collection])
            ->getMedia($this->collection);
        if ($slides->isEmpty()) {
            return redirect()->action([static::class, 'create']);
        }

        return view('admin.slides.index', compact('slides'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.slides.create');
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
            'title' => 'nullable|string|max:255',
            'text' => 'nullable|string|max:255',
        ]);

        $this->slideMaker($data);

        $this->banner('New Slide is Added.');

        return redirect()->action([static::class, 'index']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Media $slide
     * @return \Illuminate\Http\Response
     */
    public function edit(Media $slide)
    {
        return view('admin.slides.edit', compact('slide'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param Media $slide
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Media $slide)
    {
        $data = $request->validate([
            'image' => 'nullable|image',
            'title' => 'nullable|string|max:255',
            'text' => 'nullable|string|max:255',
        ]);

        if ($request->hasFile('image')) {
            $this->slideMaker($data);
            $slide->delete();
        } else {
            $slide->setCustomProperty('title', $data['title']);
            $slide->setCustomProperty('text', $data['text']);
            $slide->save();
        }

        $this->banner('The Slide is Updated.');

        return redirect()->action([static::class, 'index']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Media $slide
     * @return \Illuminate\Http\Response
     */
    public function destroy(Media $slide)
    {
        $slide->delete();

        $this->banner('The Slide is Deleted.');

        return redirect()->action([static::class, 'index']);
    }

    private function getFileName($file)
    {
        return Str::slug(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME)) . '.' . $file->getClientOriginalExtension();
    }

    private function slideMaker(array $data)
    {
        return Image::firstOrCreate(['collection' => $this->collection])
            ->addMedia($data['image'])
            ->usingFileName($this->getFileName($data['image']))
            ->withCustomProperties([
                'title' => $data['title'],
                'text' => $data['text'],
            ])
            ->toMediaCollection($this->collection);
    }
}

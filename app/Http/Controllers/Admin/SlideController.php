<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SlideRequest;
use App\Models\Media;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Spatie\MediaLibrary\MediaCollections\Models\Media as SpatieMedia;

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
        $slides = Media::where('collection', $this->collection)
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
        return view('admin.slides.editor', [
            'slide' => new SpatieMedia,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param SlideRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(SlideRequest $request)
    {
        $data = $request->validationData();

        $this->slideMaker($data);

        $this->banner('New Slide is Added.');

        return redirect()->action([static::class, 'index']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param SpatieMedia $slide
     * @return \Illuminate\Http\Response
     */
    public function edit(SpatieMedia $slide)
    {
        return view('admin.slides.editor', compact('slide'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param SlideRequest $request
     * @param SpatieMedia $slide
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function update(SlideRequest $request, SpatieMedia $slide)
    {
        $data = $request->validationData();

        if ($request->hasFile('image')) {
            $this->slideMaker($data);
            $slide->delete();
        } else {
            $slide->setCustomProperty('title', $data['title']);
            $slide->setCustomProperty('text', $data['text']);
            $slide->setCustomProperty('button1_text', $data['button1_text']);
            $slide->setCustomProperty('button1_link', $data['button1_link']);
            $slide->setCustomProperty('button2_text', $data['button2_text']);
            $slide->setCustomProperty('button2_link', $data['button2_link']);
            $slide->save();
        }

        $this->banner('The Slide is Updated.');

        return redirect()->action([static::class, 'index']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param SpatieMedia $slide
     * @return \Illuminate\Http\Response
     */
    public function destroy(SpatieMedia $slide)
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
        return Media::firstOrCreate(['collection' => $this->collection])
            ->addMedia($data['image'])
            ->usingFileName($this->getFileName($data['image']))
            ->withCustomProperties([
                'title' => $data['title'],
                'text' => $data['text'],
                'button1_text' => $data['button1_text'],
                'button1_link' => $data['button1_link'],
                'button2_text' => $data['button2_text'],
                'button2_link' => $data['button2_link'],
            ])
            ->toMediaCollection($this->collection);
    }
}

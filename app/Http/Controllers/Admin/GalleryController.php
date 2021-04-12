<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class GalleryController extends Controller
{
    private string $collection = 'gallery';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $images = Image::with('media')
            ->firstOrCreate(['collection' => $this->collection])
            ->media()
            ->where('collection_name', $this->collection)
            ->latest('id')
            ->paginate(12);

        return view('admin.gallery', compact('images'));
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
            'media' => 'required|array',
            'media.*' => 'required|file|mimes:mp4,mov,avi,ogv,jpeg,jpg,png,webm,m4a|max:10000',
        ]);

        foreach ($data['media'] as $file) {
            $this->galleryMaker($file);
        }

        $this->banner('New Image(s) Added.');

        return redirect()->action([static::class, 'index']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Media $image
     * @return \Illuminate\Http\Response
     */
    public function edit(Media $image)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param Media $image
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Media $image)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Media $image
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Media $image)
    {
        $image->delete();

        $this->banner('The Image is Deleted.');

        return back();
    }

    private function getFileName($file)
    {
        return Str::slug(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME)) . '.' . $file->getClientOriginalExtension();
    }

    private function galleryMaker($file)
    {
        return Image::firstOrCreate(['collection' => $this->collection])
            ->addMedia($file)
            ->usingFileName($this->getFileName($file))
            ->toMediaCollection($this->collection);
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MediaRequest;
use App\Models\Media;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Spatie\MediaLibrary\MediaCollections\Models\Media as SpatieMedia;

class MediaController extends Controller
{
    private string $collection = 'gallery';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! in_array(request('type'), ['image', 'video'])) {
            return redirect()->action([static::class, 'index'], ['type' => 'image']);
        }

        $media = Media::with('media')
            ->firstOrCreate(['collection' => $this->collection])
            ->media()
            ->where('collection_name', request('type'))
            ->latest('id')
            ->paginate(12);

        return view('admin.media', compact('media'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param MediaRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(MediaRequest $request)
    {
        $data = $request->validated();

        $type = $request->get('type');
        $props = [];
        if ($type === 'video') {
            $thumbnails = Media::firstOrCreate(['collection' => 'video-thumb']);

            if ($thumbnail = $request->file('thumbnail')) {
                $thumbnails->addMedia($thumbnail)
                    ->usingFileName($this->getFileName($thumbnail))
                    ->toMediaCollection('video-thumb');
            }

            $props['video-thumb'] = $thumbnail
                ? Str::after($thumbnails->getMedia('video-thumb')->last()->getUrl('416x234'), asset('/'))
                : 'storage/video-player-placeholder.webp';
        }

        foreach ($data['media'] as $file) {
            $this->mediaMaker($file, $type, $props);
        }

        $this->banner('New File(s) Added To Gallery.');

        return back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param SpatieMedia $medium
     * @return \Illuminate\Http\Response
     */
    public function edit(SpatieMedia $medium)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param SpatieMedia $medium
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SpatieMedia $medium)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param SpatieMedia $medium
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(SpatieMedia $medium)
    {
        $medium->delete();

        $this->banner('The File is Deleted From Gallery.');

        return back();
    }

    private function getFileName($file): string
    {
        return Str::slug(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME)) . '.' . $file->getClientOriginalExtension();
    }

    private function mediaMaker($file, $type, $props = [])
    {
        return Media::firstOrCreate(['collection' => $this->collection])
            ->addMedia($file)
            ->usingFileName($this->getFileName($file))
            ->withCustomProperties($props)
            ->toMediaCollection($type);
    }
}

<?php

namespace App\Http\Controllers;

use Raju\Streamer\Helpers\VideoStream;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class VideoStreamController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param Media $media
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Media $media)
    {
        if (file_exists($media->getPath())) {
            $stream = new VideoStream($media->getPath());
            return response()->stream(function() use ($stream) {
                $stream->start();
            });
        }
        return response("File doesn't exists", 404);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media as SpatieMedia;

class Media extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $fillable = [
        'collection',
    ];

    protected $table = 'media_files';

    public function registerMediaConversions(SpatieMedia $media = null): void
    {
        $this->convert('slides', 1920, 800);
        $this->convert('image', 416, 234);
        $this->convert('video-thumb', 416, 234);
        $this->convert('people', 510, 450);
        $this->convert('testimonials', 510, 300);
    }

    private function convert(string $collection, int $width, int $height): \Spatie\MediaLibrary\Conversions\Conversion
    {
        return $this->addMediaConversion($width.'x'.$height)
            ->fit('stretch', $width, $height)
            ->format('jpg')
            ->optimize()
            ->quality(70)
            ->performOnCollections($collection)
            ->nonQueued(); //for shared hosts
    }
}

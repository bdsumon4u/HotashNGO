<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Image extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $fillable = [
        'collection',
    ];

    public function registerMediaConversions(Media $media = null): void
    {
        $this->convert('slides', 1920, 800);
        $this->convert('gallery', 416, 234);
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

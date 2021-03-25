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
        $this->addMediaConversion('1920x800')
            ->fit('stretch', 1920, 800)
            ->format('jpg')
            ->optimize()
            ->quality(70)
            ->performOnCollections('slides')
            ->nonQueued(); //for shared hosts
    }
}

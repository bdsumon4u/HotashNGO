<?php

namespace App\Models;

use App\Helpers\ConvertsMedia;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Event extends Model implements HasMedia
{
    use HasFactory;
    use Translatable;
    use InteractsWithMedia;
    use ConvertsMedia;

    protected $fillable = ['slug', 'organizer', 'location', 'starts_at', 'finish_at'];
    public $translatedAttributes = ['title', 'content'];

    protected $casts = [
        'starts_at' => 'datetime',
        'finish_at' => 'datetime',
    ];

    public function getExcerptAttribute()
    {
        return Str::substr(strip_tags($this->content), 0, 100);
    }

    public function registerMediaConversions(Media $media = null): void
    {
        $this->convert('events', 860, 500);
        $this->convert('events', 510, 300);
    }
}

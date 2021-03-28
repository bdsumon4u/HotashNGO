<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class News extends Model implements HasMedia
{
    use HasFactory;
    use Translatable;
    use InteractsWithMedia;

    protected $fillable = ['slug'];
    public $translatedAttributes = ['title', 'content'];

    public function getExcerptAttribute()
    {
        return Str::substr($this->content, 0, 100);
    }
}

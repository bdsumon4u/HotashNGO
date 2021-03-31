<?php

namespace App\Helpers;

trait ConvertsMedia
{
    private function convert(string $collection, int $width, int $height): \Spatie\MediaLibrary\Conversions\Conversion
    {
        return $this->addMediaConversion($width.'x'.$height)
            ->fit('stretch', $width, $height)
            ->format('jpg')
            ->quality(70)
            ->performOnCollections($collection)
            ->optimize()
            ->nonQueued(); //for shared hosts
    }
}

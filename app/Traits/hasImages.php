<?php

namespace App\Traits;

use App\Models\Image;

trait hasImages
{
    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }

    public function getImageUrlAttribute()
    {
        return $this->firstImage()->full_url;
    }

    public function projectImageUrl($position)
    {
        return $this->projectImages($position)->first()->full_url ?? '';
    }

    public function firstImage()
    {
        return $this->images()->firstOrNew([]);
    }
    public function projectImage($position)
    {
        return $this->images()->where('project_position',$position)->firstOrNew([]);
    }
    public function projectImages($position)
    {
        return $this->images()->where('project_position',$position)->get();
    }
}

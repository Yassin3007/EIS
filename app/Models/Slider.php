<?php

namespace App\Models;

use App\Models\Slug as Slug;
use App\Traits\hasImages;
use App\Traits\HasSlugs;
// use App\Traits\Slug;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use hasImages;
    use HasSlugs;


    public function slugs()
    {
        return $this->morphMany(Slug::class, 'sluggable');
    }



    public function create_slug()
    {

        $this->make_slug(Slider::class,$this->id,$this->text);
    }

    static public function get_slider($slug)
    {
        $slider = Slider::whereHas('slugs', function($q) use ($slug){
            $q->where('slug_en',$slug);
        })->get();
        // dd($slider);
        return $slider;
    }

    public function getTextAttribute()
    {
        return $this->{'text_'.app()->getLocale()};
    }
}

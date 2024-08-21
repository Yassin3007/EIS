<?php

namespace App\Models;

use App\Traits\hasImages;
use App\Traits\HasSlugs;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use hasImages,HasSlugs;
    protected $dates = ['date']; 


    public function slugs()
    {
        return $this->morphMany(Slug::class, 'sluggable');
    }

    public function create_slug($string_en ,$string_ar)
    {
       
        $this->make_slug($string_en ,$string_ar);
    }

    static public function get_Event($slug)
    { 
        // dd($slug);
        $event = Event::whereHas('slugs', function($q) use ($slug){
            $q->where('slug_en',$slug)->orWhere('slug_ar',$slug);
        })->first();
        // if (!$event) {
        //     $event = Event::whereHas('slugs', function($q) use ($slug){
        //         $q->where('slug_ar',$slug);
        //     })->first();
        // }
        // dd($event);
        return $event;
    }

    public function getTitleAttribute()
    {
        return $this->{'title_'.app()->getLocale()};
    }
    public function getDescriptionAttribute()
    {
        return $this->{'description_'.app()->getLocale()};
    }
}

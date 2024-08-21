<?php

namespace App\Models;

use App\Traits\HasSlugs;
use App\Traits\hasImages;

use Illuminate\Database\Eloquent\Model;


class News extends Model
{
    use hasImages,HasSlugs;
    protected $guarded = ['id'];


    public function getTitleAttribute()
    {
        return $this->{'title_'.app()->getLocale()};
    }
    public function getPrefAttribute()
    {
        return $this->{'pref_'.app()->getLocale()};
    }
    public function getContentAttribute()
    {
        return $this->{'content_'.app()->getLocale()};
    }



}

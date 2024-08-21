<?php

namespace App\Models;

use App\Traits\GeneralTexts;
use App\Traits\hasImages;
use App\Traits\hasSlug;
use App\Traits\HasSlugs;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use hasImages,HasSlugs;

    protected $guarded = ['id'];
    protected $dates = ['date']; 

    public function slugs()
    {
        return $this->morphMany(Slug::class, 'sluggable');
    }

    public function create_slug($string_en , $string_ar)
    {
        // Article::class,$this->id,$this->text
        $this->make_slug($string_en , $string_ar );
    }

    static public function get_article($slug)
    { 
        $article = Article::whereHas('slugs', function($q) use ($slug){
            $q->where('slug_en',$slug)->orWhere('slug_ar',$slug);
        })->first();
        return $article;
    }


    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }
    // public function comment()
    // {
    //     return $this->hasMany(Comment::class);
    // }

    public function getTitleAttribute()
    {
        return $this->{'title_'.app()->getLocale()};
    }
    // public function slug()
    // {
    //     return $this->slugs->first()->{'title_'.app()->getLocale()};
    // }
    public function getDescriptionAttribute()
    {
        return $this->{'description_'.app()->getLocale()};
    }
    public function getAuthorAttribute()
    {
        return $this->{'author_'.app()->getLocale()};
    }

}

<?php
namespace App\Traits;

use App\Models\Slug as Slug;
use Illuminate\Database\Eloquent\Builder;

trait HasSlugs
{
    public function make_slug($string_en,$string_ar= null, $separator = '-')
    {
        $string_ar = trim($string_ar);
        $string_ar = mb_strtolower($string_ar, 'UTF-8');
        // $string_ar = preg_replace("/[^a-z0-9_\s-ءاآؤئبپتثجچحخدذرزژسشصضطظعغفقكکگلمنوهةىي]/u", '', $string_ar);
        // $string_ar = preg_replace("/[\s-_]+/", ' ', $string_ar);
        // $string_ar = preg_replace("/[\s_]/", $separator, $string_ar);
        $string_en = trim($string_en);
        $string_en = mb_strtolower($string_en, 'UTF-8');
        // $string_en = preg_replace("/[^a-z0-9_\s-ءاآؤئبپتثجچحخدذرزژسشصضطظعغفقكکگلمنوهةىي]/u", '', $string_en);
        // $string_en = preg_replace("/[\s-_]+/", ' ', $string_en);
        // $string_en = preg_replace("/[\s_]/", $separator, $string_en);
        $slug = new Slug();
        $slug->sluggable_type = self::class;
        $slug->sluggable_id = $this->id;
        $slug->slug_ar=$string_ar.$this->id;
        $slug->slug_en=$string_en.$this->id;
        $slug->save();

    }

    public function slugs()
    {
        return $this->morphMany(Slug::class, 'sluggable');
    }

    public function scopeSlug(Builder $query,$slug)
    {
        return $query->whereHasMorph('slugs',self::class,function($query) use($slug){
            return $query->where('slug_ar',$slug)->orWhere('slug_en',$slug);
        });
    }

    public function getSlugAttribute()
    {
        return $this->slugs()->first()->slug ?? $this->id;
    }
}



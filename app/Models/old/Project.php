<?php

namespace App\Models;

use App\Traits\hasImages;
use App\Traits\HasSlugs;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use hasImages,HasSlugs;

    // public function slugs()
    // {
    //     return $this->morphMany(Slug::class, 'sluggable');
    // }

    protected $guarded = ['id'];

    public function create_slug($name_en , $name_ar)
    {
    //    dd($name_ar);
        $this->make_slug($name_en, $name_ar,$this->id,$this->text);
    }

    static public function get_project($slug)
    {
        $project = Project::whereHas('slugs', function($q) use ($slug){
            $q->where('slug_en',$slug)->orWhere('slug_ar',$slug);
        })->first();
        return $project;
    }

    public function service()
    {
       return  $this->belongsToMany(Service::class);
    }


    public function district()
    {
       return  $this->belongsTo(District::class,'district_id');
    }

    public function unitTypes()
    {
       return  $this->belongsToMany(PropertyType::class,'project_unit_types')->withTrashed();
    }



    public function getNameAttribute()
    {
        return $this->{'name_'.app()->getLocale()};
    }
    public function getCountText1Attribute()
    {
        return $this->{'count_text_1_'.app()->getLocale()};
    }
    public function getCountText2Attribute()
    {
        return $this->{'count_text_2_'.app()->getLocale()};
    }
    public function getCountText3Attribute()
    {
        return $this->{'count_text_3_'.app()->getLocale()};
    }
    public function getDescriptionAttribute()
    {
        return $this->{'description_'.app()->getLocale()};
    }
    public function getDetailsAttribute()
    {
        return $this->{'details_'.app()->getLocale()};
    }
    public function getCenterFigureDetailsAttribute()
    {
        return $this->{'center_figure_details_'.app()->getLocale()};
    }
    public function getRightFigureDetailsAttribute()
    {
        return $this->{'right_figure_details_'.app()->getLocale()};
    }
    public function getLeftFigureDetailsAttribute()
    {
        return $this->{'left_figure_details_'.app()->getLocale()};
    }
        public function getInformationAttribute()
    {
        return $this->{'information_'.app()->getLocale()};
    }
    public function getSliderTagAttribute()
    {
        return $this->{'slider_tag_'.app()->getLocale()};
    }
    public function getSpecificationAttribute()
    {
        return $this->{'specification_'.app()->getLocale()};
    }
    public function getMangementAttribute()
    {
        return $this->{'mangement_'.app()->getLocale()};
    }
}

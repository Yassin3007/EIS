<?php

namespace App\Models;

use App\Traits\HasSlugs;
use Illuminate\Database\Eloquent\Model;

class Career extends Model
{
    protected $guarded = ['id'];
    protected $appends = ['status'];

    use HasSlugs;



    public function create_slug($name_en , $name_ar)
    {
        $this->make_slug($name_en, $name_ar,$this->id,$this->text);
    }

    static public function get_career($slug)
    { 
        $career = Career::whereHas('slugs', function($q) use ($slug){
            $q->where('slug_en',$slug)->orWhere('slug_ar',$slug);
        })->first();
        return $career;
    }

    public function applicant()
    {
        return $this->hasMany(Applicant::class);
    }

    public function getStatusAttribute(){
        return $this->is_active ? 'متاح' : 'غير متاح';
    }

    public function getNameAttribute()
    {
        return $this->{'name_'.app()->getLocale()};
    }

    public function getMajorAttribute()
    {
        return $this->{'major_'.app()->getLocale()};
    }

    public function getWorkTimeAttribute()
    {
        return $this->{'work_time_'.app()->getLocale()};
    }

    public function getTitleAttribute()
    {
        return $this->{'title_'.app()->getLocale()};
    }

    public function getDescriptionAttribute()
    {
        return $this->{'description_'.app()->getLocale()};
    }

    public function getQualificationsAttribute()
    {
        return $this->{'qualifications_'.app()->getLocale()};
    }

    public function getResponsibilitiesAttribute()
    {
        return $this->{'responsibilities_'.app()->getLocale()};
    }
    public function getaddressAttribute()
    {
        return $this->{'address_'.app()->getLocale()};
    }
} 

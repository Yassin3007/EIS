<?php

namespace App\Models;
use App\Traits\hasImages;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use hasImages ;

    protected $guarded = ['id'];

    public function getNameAttribute()
    {
        return $this->{'name_'.app()->getLocale()};
    }

    public function getDescriptionAttribute()
    {
        return $this->{'description_'.app()->getLocale()};
    }

    public function getMetalTitleAttribute()
    {
        return $this->{'metal_title_'.app()->getLocale()};
    }

    public function getMetalDescriptionAttribute()
    {
        return $this->{'metal_description_'.app()->getLocale()};
    }
    public function materials(){
        return $this->hasMany(Material::class, 'service_id');
    }
    public function labels(){
        return $this->hasMany(Label::class, 'service_id');
    }

}

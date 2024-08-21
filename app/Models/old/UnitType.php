<?php

namespace App\Models;

use App\Traits\hasImages;
use Illuminate\Database\Eloquent\Model;

class UnitType extends Model
{
    use hasImages;
    public function project()
    {
       return  $this->belongsTo(Project::class);
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

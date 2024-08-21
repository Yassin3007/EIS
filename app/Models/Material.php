<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\hasImages;

class Material extends Model
{
    use hasImages ;

    use HasFactory;

    protected $guarded = ['id'];

    public function getNameAttribute()
    {
        return $this->{'name_'.app()->getLocale()};
    }

    public function getDescriptionAttribute()
    {
        return $this->{'description_'.app()->getLocale()};
    }
    public function service(){
        return $this->belongsTo(Service::class,'service_id');
    }
}

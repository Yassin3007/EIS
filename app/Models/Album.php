<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\hasImages;

class Album extends Model
{
    use HasFactory , hasImages ;
    public function getNameAttribute()
    {
        return $this->{'name_'.app()->getLocale()};
    }


}

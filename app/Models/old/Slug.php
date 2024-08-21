<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Slug extends Model
{
    public function getSlugAttribute()
    {
        return $this->{'slug_'.app()->getLocale()};

    }
    
}

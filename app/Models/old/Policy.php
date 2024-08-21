<?php

namespace App\Models;

use App\Traits\GeneralTexts;
use App\Traits\hasImage;
use App\Traits\hasImages;
use Illuminate\Database\Eloquent\Model;

class Policy extends Model
{
    use hasImages,GeneralTexts;

    const TYPE_POLICY = 0;
    const TYPE_ABOUT_CEO_MESSAGE = 1;
    const TYPE_ABOUT_ABOUT_US = 2;

    public function getNameAttribute()
    {
        return $this->{'name_'.app()->getLocale()};
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

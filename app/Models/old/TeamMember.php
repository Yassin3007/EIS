<?php

namespace App\Models;

use App\Traits\GeneralTexts;
use App\Traits\hasImages;
use Illuminate\Database\Eloquent\Model;

class TeamMember extends Model
{
    use hasImages, GeneralTexts;

    protected $guarded = ['id'];

}

<?php

namespace App\Models;

use App\Traits\hasImages;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    use hasImages ;

    protected $guarded = ['id'];
}

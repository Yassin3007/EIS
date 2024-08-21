<?php

namespace App\Models;

use App\Traits\hasImages;
use Illuminate\Database\Eloquent\Model;

class Applicant extends Model
{
    use hasImages;
    protected $guarded = ['id'];
    public function career(){
        return $this->belongsTo(Career::class)->withDefault();
    }
    
}

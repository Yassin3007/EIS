<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Translation extends Model
{
    // use HasFactory;
    // use SoftDeletes;
    protected $guarded = ['id'];

    public function translationable()
    {
        return $this->morphTo();
    }
}

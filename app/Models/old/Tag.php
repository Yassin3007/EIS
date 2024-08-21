<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    public function project()
    {
        return $this->belongsToMany(Project::class,'tags_projects');
    }
    public function articles()
    {
        return $this->belongsToMany(Article::class);
    }

}

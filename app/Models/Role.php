<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
// use Laratrust\Models\LaratrustRole;

class Role extends Model
{
    protected $table = 'roles';
    public function permissions()
    {
        return $this->belongsToMany(Permission::class,'role_has_permissions');
    }
}

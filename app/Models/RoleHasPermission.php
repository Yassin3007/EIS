<?php

namespace App\Models;

// use Laratrust\Models\LaratrustRole;
use Illuminate\Database\Eloquent\Model;

class RoleHasPermission extends Model
{
    public $timestamps = false;
    protected $table = 'role_has_permissions';
    protected $fillable = ['role_id','permission_id'];

}

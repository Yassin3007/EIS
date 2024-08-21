<?php

namespace App\Models;

use App\Traits\HasSlugs;
use App\Traits\hasImages;
use Illuminate\Database\Eloquent\Model;

class GlobalSetting extends Model
{
    use hasImages,HasSlugs;
    protected $guarded = ['id'];

    // protected $appends = [
    //     'type',
    // ];

    // public function getTypeAttribute()
    // {

    //     if($this->value==null)
    //     {
    //         return 'status';

    //     }else{
    //         return 'value';
    //     }
    // }

    // public function personal_setting()
    // {
    //     return $this->hasMany(PersonalSetting::class,'user_setting_id')->withTrashed();
    // }

    // public function users()
    // {
    //     return $this->belongsToMany(User::class,'personal_settings','user_id','user_setting_id')->withPivot( 'value')->withTrashed();
    // }
}

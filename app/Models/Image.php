<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image as InterventionImage;

class Image extends Model
{
    protected $guarded = ['id'];
    protected $appends = ['full_url','slider_type'];

    // protected $appends = ['slider_type'];
    const TYPE_PARTNER_IMAGES = 'partner';
    Const TYPE_Slider_IMAGES ='slider';
    Const TYPE_ABOUT_SLIDER_IMAGES ='about_us_slider_images';

    Const TYPE_ALBUM_IMAGES = 'album_images';
    Const TYPE_ABOUT_VALUE_IMAGES ='about_us_values_images';
    Const TYPE_AboutUS_IMAGES ='about_us_images';
    Const TYPE_VIDEO_THUMBNAIL= 'video_thumbnail';
    Const TYPE_AboutUS_IMAGE ='about_us_image';

    Const TYPE_HomePage_Video_COVER = 'home_video';
    Const TYPE_AboutUS_COVER = 'about_cover';
    Const TYPE_News_COVER = 'news_cover';
    Const TYPE_Project_COVER = 'projects_cover';
    Const TYPE_Services_COVER = 'services_cover';
    Const TYPE_Contact_COVER = 'contact_cover';
    Const TYPE_Careers_COVER = 'careers_cover';
    Const TYPE_ConstUpdates_COVER = 'constUpdates_cover';
    public function getFullUrlAttribute()
    {
        if (Storage::exists($this->url)) {
            return url(Storage::url($this->url));
        }

        return '';
    }

    public function getSliderTypeAttribute()
    {
            $new_file_extention=$this->url;
            $value = null ;
            $word=array('ogx','oga','ogv','ogg','webm','mp4');
            // return '1';
            foreach( $word as $wor )
            {
                if(strpos($new_file_extention, $wor) !== false){
                   $value = $this->slider_type='video';
                    break;
                }else{
                    $value = $this->slider_type='image';
                }

            }
        return $value ;
    }

    public function imageable()
    {
        return $this->morphTo();
    }

    public function getAltAttribute()
    {
        return $this->{'alt_'.app()->getLocale()};
    }
    public function resize()
    {
        // $filename = uniqid().'.'.File::extension($this->getClientOriginalName());
        $originalfileName = pathinfo($this->url)['basename'];
        $path ="article/$originalfileName";
        $storagePath = public_path("storage/$path");
        $img =InterventionImage::make(storage_path(''));
        $img->resize(1920,1080, function ($constraint) {
            $constraint->aspectRatio();
            $constraint->upsize();
        })->save($storagePath);
        // return response("public/$path");
    }





}

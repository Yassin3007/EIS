<?php

namespace App\Models;

use App\Models\Image;
use App\Traits\FileUploader;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
//Statics Class alias Statics is defined in config/app.php
class Statics extends Model
{
    use FileUploader;
    protected $primaryKey = 'key';
    public $fillable = ['key','value_en','value_ar','has_lang','type'];

    public static function get($key,$lang='en')
    {
        $static = Statics::find($key);
        $valueAttr = 'value_'.$lang;
        if(! $static){
            return '';
        }
        return $static ? $static->$valueAttr : $static->value_en;
    }

    public static function getWithCurrentLang($key)
    {
        $lang = app()->getLocale();

        $static = Statics::find($key);
        if($static)
        {
            if($static->has_lang==1)
            {
                $valueAttr = 'value_'.$lang;
                if($static)
                    return $static->$valueAttr ? $static->$valueAttr:$static->value_en;
                else
                    return null;

            }

            else
                return $static ? $static->value_en:null;
        }
    }

    public static function updateStatic($key,$value_en,$value_ar,$hasLang=true)
    {
        $static = Statics::find($key);
        if(!$static)
        {
            $static = Statics::create([
                "key"=>$key,
                "value_en"=>$value_en,
                "value_ar"=>$value_ar,
                "has_lang"=>$hasLang
            ]);
        }
        else
        // dd($value_en);
            $static->update(['value_en'=>$value_en,"value_ar"=>$value_ar]);
    }

    public static function updateStaticFile($key,$value)
    {
        $static = Statics::find($key);
        if(!$static)
        {
            $static = Statics::create([
                "key"=>$key,
                "value_en"=>$value->store('public/statics'),
                "has_lang"=>true
            ]);
        }
        else
            $static->update(['value_en'=>$value->store('public/statics')]);
    }

    public static function updateStatics(array $attrs,$files = null)
    {
        $loop = 0;
        foreach($attrs as $key=>$value)
        {
            $loop++;
            if(!array_key_exists($key,$attrs))
                continue;
            if(gettype($value) == 'object')
            {
                Static::updateStaticFile($key,$value);
                continue;

            }
            else
            {
                if(Str::endsWith($key,'_en'))
                {
                    $enKey = $key;
                    $key = substr($key,0,strpos($key,'_en'));
                    $arKey = $key.'_ar';
                    $value_en = $value;
                    $value_ar = $attrs[$arKey];
                    unset($attrs[$enKey],$attrs[$arKey]);
                    // dd($loop,$attrs);
                    Statics::updateStatic($key,$value_en,$value_ar,1);
                    continue;
                }
                elseif(Str::endsWith($key,'_ar'))
                {
                    // dd($loop,$attrs);

                    $arKey = $key;
                    $key = substr($key,0,strpos($key,'_ar'));
                    $enKey = $key.'_en';
                    $value_ar = $value;
                    $value_en = $attrs[$enKey];
                    unset($attrs[$enKey],$attrs[$arKey]);
                    Statics::updateStatic($key,$value_en,$value_ar,1);
                    continue;

                }
                else
                {
                    if(is_array($value)){
                        $value = 'slider_images';
                    }

                    Statics::updateStatic($key,$value,null,1);
                    continue;

                }
            }

        }

    }

    public static function emtpyKey($key)
    {
        Statics::updateStatic($key,null,null,1);

    }

    public static function getImage($key)
    {
        $static = Statics::find($key);
        if($static)
            $image = Image::find($static->value_en);
        return $image ?? new Image();
    }

    public static function getImageUrl($key){
        //$static = Statics::find($key);
        return url(Storage::url(Statics::get($key)));
    }

    public static function updateStaticImageBase64($key,$imageObject)
    {
        $static = Statics::find($key);
        if(!empty($imageObject['src'])){
            $image = static::uploadImageBase64($imageObject,'media');
        }elseif($oldImage = static::getImage($key)){
            $image = static::updateImageModel($oldImage, $imageObject['alt_en'], $imageObject['alt_ar']);
        }

        if(!$static)
        {
            $static = Statics::create([
                "key"=>$key,
                "value_en"=>$image->id,
                "has_lang"=>true,
                "type"=>'image'
            ]);
        }
        elseif($image)
            $static->update(['value_en'=>$image->id]);
    }
}

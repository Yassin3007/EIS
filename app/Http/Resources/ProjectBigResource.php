<?php

namespace App\Http\Resources;

use Storage;
use Illuminate\Http\Resources\Json\JsonResource;

class ProjectBigResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $slider_type = null ;
        $new_file_extention=$this->projectImages('slider_image')->last()?url(Storage::url($this->projectImages('slider_image')->last()->url)):null;
        $word=array('ogx','oga','ogv','ogg','webm','mp4');
        // return '1';
        foreach( $word as $wor )
        {
            if(strpos($new_file_extention, $wor) !== false){
                $slider_type = 'video';
                break;
            }else{
                $slider_type = 'image';
            }
        }
        
        if(app()->getLocale() == 'en')
        {
            $icon = $this->projectImages('icon')->last()?url(Storage::url($this->projectImages('icon')->last()->url)):null;
        }
        elseif(app()->getLocale() == 'ar')
        {
            $icon = $this->projectImages('icon_ar')->last()?url(Storage::url($this->projectImages('icon_ar')->last()->url)):null;
        }
        else {
            $icon = null;
        }

        return [
            'id'=>$this->id,
            'name'=>$this->name,
            'description'=>$this->description,
            'iframe'=>$this->iframe,
            'brochure'=>$this->projectImages('file')->last()?url(Storage::url($this->projectImages('file')->last()->url)):null,
            'slider_image'=>$this->projectImages('slider_image')->last()?url(Storage::url($this->projectImages('slider_image')->last()->url)):null,
            'slider_type'=>$slider_type,
            'image'=>$this->projectImages('main_image')->last()?url(Storage::url($this->projectImages('main_image')->last()->url)):null,
            'form_image'=>$this->projectImages('form_image')->last()?url(Storage::url($this->projectImages('form_image')->last()->url)):null,
            'icon'=>$icon,
            // 'video'=>$this->projectImages('main_video')->last()?$this->projectImages('main_video')->last():null,
            // 'location_video'=>$this->projectImages('location_video')->last()?url(Storage::url($this->projectImages('location_video')->last()->url)):null,
            'project_images'=>$this->projectImages('project'),
            'view_form'=>$this->view_form,
            'count_1'=>$this->count_1,
            'count_text_1'=>$this->count_text_1,
            'count_2'=>$this->count_2,
            'count_text_2'=>$this->count_text_2,
            'count_3'=>$this->count_3,
            'count_text_3'=>$this->count_text_3,
        ];

    }
}

<?php

namespace App\Http\Resources;

use Storage;
use Illuminate\Http\Resources\Json\JsonResource;

class ProjectResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
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
            // 'brochure'=>$this->projectImages('file')->first()?url(Storage::url($this->projectImages('file')->first()->url)):null,
            'image'=>$this->projectImages('main_image')->first()?url(Storage::url($this->projectImages('main_image')->first()->url)):null,
            'icon'=>$icon,
            // 'video'=>$this->projectImages('main_video')->first()?$this->projectImages('main_video')->first():null,
            // 'location_video'=>$this->projectImages('location_video')->first()?url(Storage::url($this->projectImages('location_video')->first()->url)):null,
            // 'project_images'=>$this->projectImages('project'),

        ];

    }
}

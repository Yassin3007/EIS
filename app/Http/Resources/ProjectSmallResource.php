<?php

namespace App\Http\Resources;

use Storage;
use Illuminate\Http\Resources\Json\JsonResource;

class ProjectSmallResource extends JsonResource
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
            // 'description'=>$this->description_en,
            // 'iframe'=>$this->iframe,
            'image'=>$this->projectImages('main_image')->last()?url(Storage::url($this->projectImages('main_image')->last()->url)):null,
            'icon'=>$icon,
            // 'video'=>$this->projectImages('video')->last()?url(Storage::url($this->projectImages('video')->last()->url)):null,
            // 'project_images'=>$this->projectImages('project'),

        ];

    }
}

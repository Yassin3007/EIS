<?php

namespace App\Http\Resources;

use Storage;
use Illuminate\Http\Resources\Json\JsonResource;

class ServiceResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id'=>$this->id,
            'name'=>$this->name,
            'description'=>$this->description,
            'metal_title'=>$this->metal_title,
            'metal_description'=>$this->metal_description,
            'icon'=>$this->projectImages('service_icon')->last()?url(Storage::url($this->projectImages('service_icon')->last()->url)):null,
            'cover'=>$this->projectImages('cover')->last()?url(Storage::url($this->projectImages('cover')->last()->url)):null,
            'material'=>MaterialResource::collection($this->materials ),
            'labels'=>LabelResource::collection($this->labels)  ,
        ];

    }
}

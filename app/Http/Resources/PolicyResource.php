<?php

namespace App\Http\Resources;

use Storage;
use Illuminate\Http\Resources\Json\JsonResource;

class PolicyResource extends JsonResource
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
            'title'=>$this->title,
            'description'=>$this->description,
            'image'=>$this->images->last()?url(Storage::url($this->images->last()->url)):null,
        ];

    }
}

<?php

namespace App\Http\Resources;

use Storage;
use Illuminate\Http\Resources\Json\JsonResource;

class NewsResource extends JsonResource
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
            'title'=>$this->title,
            'pref'=>$this->pref,

            'date'=>$this->date,
            'content'=>$this->content,
            'image'=>$this->projectImages('image')->last()?url(Storage::url($this->projectImages('image')->last()->url)):null,

        ];

    }
}

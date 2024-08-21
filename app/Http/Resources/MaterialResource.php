<?php

namespace App\Http\Resources;
use Storage;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MaterialResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'=>$this->id,
            'name'=>$this->name,
            'description'=>$this->description,
            'image'=>$this->projectImages('material_image')->first()?url(Storage::url($this->projectImages('material_image')->first()->url)):null,
        ];
    }
}

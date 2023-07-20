<?php

namespace App\Http\Resources\Sneakers;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SneakersResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name, 
            'code' => $this->code,
            'brand' => $this->brand,
            'color' => $this->color,
            'price' => $this->price,
            'description' => $this->description,
            'category' => $this->category,
            'gender' => $this->gender,
            'images' => ImageSneakersResource::collection($this->image),
            'sizes' => SizeSneakersResource::collection($this->size),
        ];
    }
}

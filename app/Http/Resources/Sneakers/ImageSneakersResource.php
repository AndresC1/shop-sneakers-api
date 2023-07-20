<?php

namespace App\Http\Resources\Sneakers;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ImageSneakersResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): string
    {
        return $this->image;
    }
}

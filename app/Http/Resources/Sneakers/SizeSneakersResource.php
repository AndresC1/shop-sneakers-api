<?php

namespace App\Http\Resources\Sneakers;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SizeSneakersResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'size' => $this->size,
            'stock' => $this->stock,
        ];
    }
}

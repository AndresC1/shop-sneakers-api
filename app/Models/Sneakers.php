<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Image_Sneakers;
use App\Models\Size_Sneakers;

class Sneakers extends Model
{
    use HasFactory;

    protected $fillable = [
        "name",
        "code",
        "brand",
        "color",
        "price",
        "description",
        "category",
        "gender",
        "status",
    ];

    public function image()
    {
        return $this->hasMany(Image_Sneakers::class, 'sneaker_id');
    }

    public function size()
    {
        return $this->hasMany(Size_Sneakers::class, 'sneaker_id');
    }
}

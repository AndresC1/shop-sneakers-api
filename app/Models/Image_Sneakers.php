<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Sneakers;

class Image_Sneakers extends Model
{
    use HasFactory;

    protected $fillable = [
        "image",
        "sneaker_id",
    ];

    public function sneaker()
    {
        return $this->belongsTo(Sneakers::class, 'sneaker_id');
    }
}

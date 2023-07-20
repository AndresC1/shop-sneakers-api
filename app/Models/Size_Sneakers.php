<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Sneakers;

class Size_Sneakers extends Model
{
    use HasFactory;

    protected $fillable = [
        "size",
        "sneaker_id",
        "stock",
    ];

    public function sneaker()
    {
        return $this->belongsTo(Sneakers::class, 'sneaker_id');
    }
}

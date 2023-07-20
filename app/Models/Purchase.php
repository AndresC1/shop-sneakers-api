<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'code',
        'status',
        'total',
        'discount',
        'tax',
        'grand_total',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

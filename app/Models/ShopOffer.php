<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShopOffer extends Model
{
    use HasFactory;

    protected $fillable = [
        'shop_id', 'product', 'price', 'currency', 'description'
    ];

    public function shop()
    {
        return $this->belongsTo(Shop::class, 'shop_id', 'id');
    }
}

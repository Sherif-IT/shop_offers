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
}

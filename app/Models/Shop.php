<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'address', 'country'
    ];
    
    public function offers()
    {
        return $this->hasMany(ShopOffer::class, 'shop_id', 'id');
    }
}

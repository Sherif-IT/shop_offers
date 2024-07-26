<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ShopOffer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class OfferController extends Controller
{
    public function getOffersByShop($shopId)
    {
        $validator = Validator::make(['shop_id' => $shopId], [
            'shop_id' => 'required|integer|exists:shop_offers,shop_id',
        ]);
    
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $offers = ShopOffer::where('shop_id', $shopId)->get();

        $offers->each(function ($offer) {
            $offer->price = $this->convertToEuro($offer->price, $offer->currency);
            $offer->currency = 'EUR';
        });

        $sortOffers = $offers->sortBy('price');

        return response()->json($sortOffers);
    }

    private function convertToEuro($price, $currency)
    {
        //TODO
        return $price;
    }
}

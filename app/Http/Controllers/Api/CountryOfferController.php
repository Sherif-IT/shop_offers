<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Shop;
use Illuminate\Http\Request;

class CountryOfferController extends Controller
{
    public function getOffersByCountry($countryCode)
    {
        $validator = \Validator::make(['countryCode' => $countryCode], [
            'countryCode' => 'required|string|size:2|exists:shops,country',
        ]);

        if ($validator->fails()) {
            return response()->json(
             $validator->errors()
            , 422);
        }

        $shops = Shop::where('country', $countryCode)->with('offers')->get();

        $offers = $shops->flatMap(function ($shop) {
            return $shop->offers;
        })->sortBy('price')->values();

        return response()->json($offers);
    }
}

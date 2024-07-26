<?php

namespace App\Singletons;

use App\Services\ExternalApiService;
use App\Models\ShopOffer;

class OffersInitializer
{
    private static $offerInitd = false;

    public static function initOffers()
    {
        if (!self::$offerInitd) {
            self::$offerInitd = true;

            if (ShopOffer::count() == 0) {
                $apiService = new ExternalApiService();
                $offers = $apiService->fetchOffers();

                foreach ($offers as $offer) {
                    ShopOffer::create([
                        'shop_id' => $offer['shop_id'],
                        'product' => $offer['product'],
                        'price' => $offer['price'],
                        'currency' => $offer['currency'],
                        'description' => $offer['description'],
                    ]);
                }
            }
        }
    }
}
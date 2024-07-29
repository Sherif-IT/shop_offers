<?php

namespace App\Singletons;

use App\Services\ExternalApiService;
use App\Models\Shop;

class ShopInitializer
{
    private static $shopsInitd = false;

    public static function initShops()
    {
        if (!self::$shopsInitd) {
            self::$shopsInitd = true;
            if (Shop::count() == 0) {
                $apiService = new ExternalApiService();
                
                $shopsJson = $apiService->fetchShopsFromJson();
                foreach ($shopsJson as $shop) {
                    Shop::create([
                        'id' => $shop['id'],
                        'name' => $shop['name'],
                        'address' => $shop['address'],
                        'country' => $shop['country'],
                    ]);
                }

                $shopsCsv = $apiService->fetchShopsFromCsv();
                foreach ($shopsCsv as $shop) {
                    Shop::create([
                        'id' => $shop['id'],
                        'name' => $shop['name'],
                        'address' => $shop['address'],
                        'country' => $shop['country'],
                    ]);
                }
            }
        }
    }
}
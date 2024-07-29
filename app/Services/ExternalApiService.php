<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

class ExternalApiService
{
    protected $rootUrl = 'https://test.pallinolabs.it';
    protected $apiPath = '/api/v1' ;


    public function fetchOffers()
    {
        $response = Http::get($this->rootUrl . $this->apiPath . '/offers.json');

        if ($response->successful()) {
            return $response->json();
        }

        return [];
    }

    public function fetchShopsFromJson()
    {
        $response = Http::get($this->rootUrl . $this->apiPath . '/shops.json');

        if ($response->successful()) {
            return $response->json();
        }

        return [];
    }

    public function fetchShopsFromCsv()
    {
        $response = Http::get($this->rootUrl . '/shops.csv');

        if ($response->successful()) {
            $csv = $response->body();
            $lines = explode(PHP_EOL, $csv);
            
            array_shift($lines);

            $shops = [];
            foreach ($lines as $line) {
                $shopData = str_getcsv($line);
                if (!empty($shopData) && count($shopData) === 4) {
                    $shops[] = [
                        'id' => $shopData[0],
                        'name' => $shopData[1],
                        'address' => $shopData[2],
                        'country' => $shopData[3],
                    ];
                }
            }

            return $shops;
        }

        return [];
    }
}
<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

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
}
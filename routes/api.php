<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CountryOfferController;
use App\Http\Controllers\Api\OfferController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('{shopId}', [OfferController::class, 'getOffersByShop'])->where('shopId', '[0-9]+');

Route::get('{countrycode}', [CountryOfferController::class, 'getOffersByCountry'])->where('countryCode', '[A-Za-z]{2}');

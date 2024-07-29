<?php

namespace App\Providers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use App\Singletons\OffersInitializer;
use App\Singletons\ShopInitializer;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        if (Schema::hasTable('shop_offers') && Schema::hasTable('shops')) {
            OffersInitializer::initOffers();
            ShopInitializer::initShops();
        }
    }
}

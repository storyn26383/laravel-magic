<?php

namespace App\Providers;

use App\Num;
use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Collection;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Collection::macro('product', function () {
            return array_product($this->items);
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(Num::class, function () {
            return new Num('v0.0.1');
        });
    }
}

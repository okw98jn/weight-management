<?php

namespace App\Providers;

use App\Utils\WeightUtil;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // WeightUtil
        $this->app->singleton('WeightUtil', function () {
            return new WeightUtil();
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // APIリソースでdataキーでラップされないようにする
        JsonResource::withoutWrapping();
    }
}

<?php

namespace App\Ship\Providers;

use App\Ship\Parents\Providers\MainServiceProvider as ParentMainServiceProvider;
use Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider;
use Generator;
use Illuminate\Support\Carbon;
use Rollbar\Laravel\RollbarServiceProvider;

class ShipProvider extends ParentMainServiceProvider
{
    /**
     * Register any Service Providers on the Ship layer (including third party packages).
     */
    public array $serviceProviders = [
        RouteServiceProvider::class,
    ];

    /**
     * Register any Alias on the Ship layer (including third party packages).
     */
    protected array $aliases = [];

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Carbon::serializeUsing(function ($carbon) {
            return $carbon->format('Y-m-d H:i:s');
        });
        parent::boot();
    }

    /**
     * Register any application services.
     */
    public function register(): void
    {
        /**
         * Load the ide-helper service provider only in non production environments.
         */
        if ($this->app->isLocal()) {
            $this->app->register(IdeHelperServiceProvider::class);
//            $this->app->register(TelescopeServiceProvider::class);
        }
//        if (config('logging.default') == 'rollbar') {
//            $this->app->register(RollbarServiceProvider::class);
//        }


        parent::register();
    }
}

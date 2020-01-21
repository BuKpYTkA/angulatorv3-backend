<?php

namespace App\Providers;

use App\Services\AuddService\AuddApiClient\Transport\AuddTransport;
use App\Services\AuddService\AuddApiClient\Transport\AuddTransportInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(AuddTransportInterface::class, function ($app) {
            $authToken = config('app.api.audd.token');
            $apiEndpoint = config('app.api.audd.url');
            return new AuddTransport($authToken, $apiEndpoint);
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}

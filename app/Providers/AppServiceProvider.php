<?php

namespace App\Providers;

use App\Services\AuddService\AuddApiClient\AuddApiClient;
use App\Services\AuddService\AuddApiClient\AuddApiClientInterface;
use App\Services\AuddService\AuddApiClient\DTO\Factory\AuddResultDTOFactory;
use App\Services\AuddService\AuddApiClient\DTO\Factory\AuddResultDTOFactoryInterface;
use App\Services\AuddService\AuddApiClient\Transport\AuddTransport;
use App\Services\AuddService\AuddApiClient\Transport\AuddTransportInterface;
use App\Services\AudioService\AudioService;
use App\Services\AudioService\AudioServiceInterface;
use App\Services\AudioService\MockAudioService;
use App\Services\AudioUploadService\AudioUploadService;
use App\Services\AudioUploadService\AudioUploadServiceInterface;
use App\Services\Base64DecoderService\Base64DecoderService;
use App\Services\Base64DecoderService\Base64DecoderServiceInterface;
use App\Services\Base64DecoderService\Factory\Base64ObjectDTOFactory;
use App\Services\Base64DecoderService\Factory\Base64ObjectDTOFactoryInterface;
use App\Services\DeezerService\DeezerApiClient\DeezerApiClient;
use App\Services\DeezerService\DeezerApiClient\DeezerApiClientInterface;
use App\Services\DeezerService\DeezerApiClient\DTO\Factory\DeezerResultDTOFactory;
use App\Services\DeezerService\DeezerApiClient\DTO\Factory\DeezerResultDTOFactoryInterface;
use App\Services\DeezerService\DeezerApiClient\Transport\DeezerTransport;
use App\Services\DeezerService\DeezerApiClient\Transport\DeezerTransportInterface;
use App\Services\GameService\Factory\GameDTOFactory;
use App\Services\GameService\Factory\GameDTOFactoryInterface;
use App\Services\GameService\GameService;
use App\Services\GameService\GameServiceInterface;
use App\Services\GameSourceService\GameSourceService;
use App\Services\GameSourceService\GameSourceServiceInterface;
use App\Services\StorageService\StorageService;
use App\Services\StorageService\StorageServiceInterface;
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
        $this->app->bind(AuddTransportInterface::class, function () {
            $authToken = config('app.api.audd.token');
            $apiEndpoint = config('app.api.audd.url');
            return new AuddTransport($authToken, $apiEndpoint);
        });
        $this->app->bind(AuddResultDTOFactoryInterface::class, AuddResultDTOFactory::class);
        $this->app->bind(AuddApiClientInterface::class, AuddApiClient::class);

        $this->app->bind(DeezerTransportInterface::class, function () {
            $authToken = config('app.api.deezer.token');
            $apiEndpoint = config('app.api.deezer.url');
            return new DeezerTransport($authToken ? $authToken : '', $apiEndpoint);
        });
        $this->app->bind(DeezerResultDTOFactoryInterface::class, DeezerResultDTOFactory::class);
        $this->app->bind(DeezerApiClientInterface::class, DeezerApiClient::class);
        // TODO Change mock service on real
        $this->app->bind(AudioServiceInterface::class, AudioService::class);
        $this->app->bind(GameDTOFactoryInterface::class, GameDTOFactory::class);
        $this->app->bind(GameServiceInterface::class, GameService::class);
        $this->app->bind(StorageServiceInterface::class, function () {
            return new StorageService('public');
        });
        $this->app->bind(AudioUploadServiceInterface::class, AudioUploadService::class);
        $this->app->bind(GameSourceServiceInterface::class, GameSourceService::class);
        $this->app->bind(Base64DecoderServiceInterface::class, Base64DecoderService::class);
        $this->app->bind(Base64ObjectDTOFactoryInterface::class, Base64ObjectDTOFactory::class);
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

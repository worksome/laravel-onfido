<?php

declare(strict_types=1);

namespace Worksome\Onfido;

use Illuminate\Container\Container;
use Illuminate\Contracts\Config\Repository;
use Illuminate\Support\ServiceProvider;
use Onfido\Api\DefaultApi;
use Onfido\Configuration;

class OnfidoServiceProvider extends ServiceProvider
{
    protected bool $defer = true;

    public function register(): void
    {
        $this->app->singleton('onfido', function (Container $app) {
            $token = $app->make(Repository::class)->get('onfido.api_key');

            $config = (new Configuration())
                ->setApiKey('Authorization', "token={$token}")
                ->setApiKeyPrefix('Authorization', 'Token');

            return new DefaultApi(null, $config);
        });

        $this->app->alias('onfido', DefaultApi::class);
    }

    /** @return array<string> */
    public function provides(): array
    {
        return ['onfido', DefaultApi::class];
    }

    public function boot(): void
    {
        $config = __DIR__ . '/../config/onfido.php';

        if ($this->app->runningInConsole()) {
            $this->publishes([
                $config => $this->app->configPath('onfido.php'),
            ], 'config');
        }

        $this->mergeConfigFrom($config, 'onfido');
    }
}

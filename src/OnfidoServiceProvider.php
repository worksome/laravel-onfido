<?php

declare(strict_types=1);

namespace Worksome\Onfido;

use Illuminate\Container\Container;
use Illuminate\Contracts\Config\Repository as ConfigRepository;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;
use Onfido\Api\DefaultApi;
use Onfido\Configuration;

class OnfidoServiceProvider extends ServiceProvider implements DeferrableProvider
{
    public function register(): void
    {
        $this->app->singleton('onfido', function (Container $app) {
            $token = $app->make(ConfigRepository::class)->get('onfido.api_key');

            $config = Configuration::getDefaultConfiguration()
                ->setApiToken($token);

            return new DefaultApi(config: $config);
        });

        $this->app->alias('onfido', DefaultApi::class);
    }

    /** @return array<int, string> */
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

<?php

declare(strict_types=1);

namespace Worksome\Onfido;

use Illuminate\Container\Container;
use Illuminate\Contracts\Config\Repository as ConfigRepository;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;
use Onfido\Api\DefaultApi;
use Onfido\Configuration;
use Onfido\Region;

class OnfidoServiceProvider extends ServiceProvider implements DeferrableProvider
{
    public function register(): void
    {
        $this->app->singleton('onfido', function (Container $app) {
            $config = $app->make(ConfigRepository::class);

            $token = $config->get('onfido.api_key');

            $region = $this->getRegionFromKey($config->get('onfido.region', Region::EU));

            $config = Configuration::getDefaultConfiguration()
                ->setApiToken($token)
                ->setRegion($region);

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

    private function getRegionFromKey(Region|string $region): Region
    {
        if ($region instanceof Region) {
            return $region;
        }

        $region = strtoupper($region);

        if (! in_array($region, array_map(fn (Region $case) => $case->name, Region::cases()))) {
            return Region::EU;
        }

        return constant(Region::class . '::' . $region);
    }
}

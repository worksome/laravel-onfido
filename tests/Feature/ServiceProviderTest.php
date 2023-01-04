<?php

namespace Worksome\Onfido\Tests\Feature;

use GrahamCampbell\TestBenchCore\ServiceProviderTrait;
use Illuminate\Contracts\Config\Repository;
use Onfido\Api\DefaultApi;
use Worksome\Onfido\Tests\TestCase;

class ServiceProviderTest extends TestCase
{
    use ServiceProviderTrait;

    public function test_it_adds_the_onfido_api_key_to_config(): void
    {
        expect($this->app->make(Repository::class)->has('onfido.api_key'))->toBeTrue();
    }

    public function test_it_can_inject_the_onfido_client(): void
    {
        $this->assertIsInjectable(DefaultApi::class);
    }
}

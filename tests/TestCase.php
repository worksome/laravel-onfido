<?php

namespace Worksome\Onfido\Tests;

use Illuminate\Support\ServiceProvider;
use Orchestra\Testbench\TestCase as BaseTestCase;
use Worksome\Onfido\OnfidoServiceProvider;

abstract class TestCase extends BaseTestCase
{
    /** @return class-string<ServiceProvider> */
    protected function getServiceProviderClass(): string
    {
        return OnfidoServiceProvider::class;
    }
}

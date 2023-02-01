<?php

namespace Worksome\Onfido\Tests;

use Orchestra\Testbench\TestCase as BaseTestCase;
use Worksome\Onfido\OnfidoServiceProvider;

abstract class TestCase extends BaseTestCase
{
    protected function getPackageProviders($app): array
    {
        return [OnfidoServiceProvider::class];
    }
}

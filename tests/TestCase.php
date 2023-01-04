<?php

namespace Worksome\Onfido\Tests;

use GrahamCampbell\TestBench\AbstractPackageTestCase;
use Illuminate\Support\ServiceProvider;
use Worksome\Onfido\OnfidoServiceProvider;

abstract class TestCase extends AbstractPackageTestCase
{
    /** @return class-string<ServiceProvider> */
    protected function getServiceProviderClass(): string
    {
        return OnfidoServiceProvider::class;
    }
}

<?php

namespace Worksome\Onfido\Tests;

use GrahamCampbell\TestBench\AbstractPackageTestCase;
use Worksome\Onfido\OnfidoServiceProvider;

/**
 * This is the abstract class.
 */
abstract class AbstractTestCase extends AbstractPackageTestCase
{
    /**
     * Get the service provider class.
     *
     * @return string
     */
    protected function getServiceProviderClass()
    {
        return OnfidoServiceProvider::class;
    }
}

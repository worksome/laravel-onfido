<?php

namespace Worksome\Onfido\Tests\Facades;

use GrahamCampbell\TestBenchCore\FacadeTrait;
use Onfido\Api\DefaultApi;
use Worksome\Onfido\Facades\Onfido;
use Worksome\Onfido\Tests\TestCase;

class OnfidoTest extends TestCase
{
    use FacadeTrait;

    protected function getFacadeAccessor(): string
    {
        return 'onfido';
    }

    protected function getFacadeClass(): string
    {
        return Onfido::class;
    }

    protected function getFacadeRoot(): string
    {
        return DefaultApi::class;
    }
}

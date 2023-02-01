<?php

declare(strict_types=1);

use Onfido\Configuration;
use Worksome\Onfido\Facades\Onfido;

it('correctly resolves the facade', function () {
    $config = Onfido::getConfig();

    expect($config)->toBeInstanceOf(Configuration::class);
});

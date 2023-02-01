<?php

declare(strict_types=1);

use Onfido\Api\DefaultApi;

it('correctly resolves onfido', function () {
    $onfido = $this->app->make("onfido");

    expect($onfido)->toBeInstanceOf(DefaultApi::class);
});

it('can resolve DefaultApi alternatively', function () {
    $onfido = $this->app->make(DefaultApi::class);

    expect($onfido)->toBeInstanceOf(DefaultApi::class);
});

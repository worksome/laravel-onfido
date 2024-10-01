<?php

declare(strict_types=1);

use Onfido\Region;

return [

    'api_key' => env('ONFIDO_API_KEY', 'api_testing.default'),

    'region' => env('ONFIDO_REGION', Region::EU),

];

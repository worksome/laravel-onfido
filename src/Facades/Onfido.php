<?php

declare(strict_types=1);

namespace Worksome\Onfido\Facades;

use Illuminate\Support\Facades\Facade;
use Onfido\Api\DefaultApi;
use Onfido\Model\Applicant;
use Onfido\Model\Check;

/**
 * Class Onfido
 *
 * @method static Applicant createApplicant(array $applicant)
 * @method static Check     createCheck(array $check)
 *
 * @see DefaultApi
 */
class Onfido extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'onfido';
    }
}

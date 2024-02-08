<?php

declare(strict_types=1);

namespace Worksome\Onfido\Facades;

use Illuminate\Support\Facades\Facade;
use Onfido\Api\DefaultApi;
use Onfido\Model\ApplicantRequest;
use Onfido\Model\ApplicantResponse;
use Onfido\Model\CheckRequest;
use Onfido\Model\CheckResponse;

/**
 * Class Onfido
 *
 * @method static ApplicantResponse createApplicant(ApplicantRequest $applicant)
 * @method static CheckResponse     createCheck(CheckRequest $check)
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

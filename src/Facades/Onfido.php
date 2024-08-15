<?php

declare(strict_types=1);

namespace Worksome\Onfido\Facades;

use Illuminate\Support\Facades\Facade;
use Onfido\Api\DefaultApi;
use Onfido\Model\ApplicantBuilder;
use Onfido\Model\ApplicantResponse;
use Onfido\Model\CheckBuilder;
use Onfido\Model\CheckResponse;

/**
 * @method static ApplicantResponse createApplicant(ApplicantBuilder $applicant_builder)
 * @method static CheckResponse     createCheck(CheckBuilder $check_builder)
 *
 * @see DefaultApi
 */
class Onfido extends Facade
{
    /** {@inheritdoc} */
    protected static function getFacadeAccessor(): string
    {
        return 'onfido';
    }
}

<?php

declare(strict_types=1);

namespace Worksome\Onfido\Facades;

use Illuminate\Support\Facades\Facade;
use Onfido\Api\DefaultApi;
use Onfido\Model\Applicant;
use Onfido\Model\ApplicantBuilder;
use Onfido\Model\Check;
use Onfido\Model\CheckBuilder;

/**
 * @method static Applicant createApplicant(ApplicantBuilder $applicant_builder)
 * @method static Check     createCheck(CheckBuilder $check_builder)
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

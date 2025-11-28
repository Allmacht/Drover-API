<?php

namespace Src\Contexts\OnboardingSession\Application\Exceptions;

use App\Exceptions\BaseException;

class OnboardingSessionApplicationException extends BaseException
{
    const BASE_EXCEPTION = 'validation.onboarding_session.application_exception';

    public static function userIsNotOwner(): self
    {
        $exception = self::BASE_EXCEPTION . '.user_is_not_owner';

        return new self(
            code: 422,
            message: $exception,
            type: $exception,
            arguments: []
        );
    }

    public static function companyIsNotPendingSetup(): self
    {
        $exception = self::BASE_EXCEPTION . '.company_is_not_pending_setup';

        return new self(
            code: 422,
            message: $exception,
            type: $exception,
            arguments: []
        );
    }
}

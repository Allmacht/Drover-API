<?php

namespace Src\Contexts\Authorization\Domain\Exceptions;

use App\Exceptions\BaseException;

class AuthorizationException extends BaseException
{
    private const BASE_EXCEPTION = 'validation.authorization_exception.';

    public static function invalidCredentials(): self
    {
        $exception = self::BASE_EXCEPTION.'invalid_credentials';

        return new self(
            code: 401,
            message: $exception,
            type: $exception,
            arguments: []
        );
    }
}

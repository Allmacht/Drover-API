<?php

namespace Src\Contexts\User\Domain\Exceptions;

use App\Exceptions\BaseException;

class UserValidationException extends BaseException
{

    const BASE_EXCEPTION = "validation.user_validation_exception.";
    
    public static function invalidEmailFormat(): self
    {
        $exception = self::BASE_EXCEPTION . 'invalid_email_format';

        return new self(
            code: 422,
            message: $exception,
            type: $exception,
            arguments: []
        );
    }

    public static function emailAlreadyExists(): self
    {
        $exception = self::BASE_EXCEPTION . 'email_already_exists';
        
        return new self(
            code: 422,
            message: $exception,
            type: $exception,
            arguments: []
        );
    }
}
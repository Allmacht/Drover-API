<?php

namespace Src\Contexts\Company\Domain\Exceptions;

use App\Exceptions\BaseException;

class CompanyValidationException extends BaseException
{
    const CODE = 'validation.company_validation_exception';

    public static function companyAlreadyExists(): self
    {
        $exception = self::CODE . '.company_already_exists';

        return new self(
            code: 422,
            message: $exception,
            type: $exception,
            arguments: []
        );
    }
}

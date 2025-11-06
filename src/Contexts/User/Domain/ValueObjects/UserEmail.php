<?php

namespace Src\Contexts\User\Domain\ValueObjects;

use Src\Contexts\User\Domain\Exceptions\UserValidationException;

final class UserEmail
{
    private function __construct(private string $value)
    {
        $this->validate(value: $value);
    }

    private function validate(string $value): void
    {
        if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
            throw UserValidationException::invalidEmailFormat();
        }
    }

    public function value(): string
    {
        return $this->value;
    }

    public static function fromString(string $value): self
    {
        return new self(strtolower(trim($value)));
    }
}
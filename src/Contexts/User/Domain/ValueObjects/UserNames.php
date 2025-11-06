<?php

namespace Src\Contexts\User\Domain\ValueObjects;

final class UserNames
{
    private function __construct(private string $value)
    {
        $this->validate(value: $value);
    }

    private function validate(string $value): void
    {
        
    }

    public function value(): string
    {
        return $this->value;
    }

    public static function fromString(string $value): self
    {
        return new self(value: $value);
    }
}
<?php

namespace Src\Contexts\User\Domain\ValueObjects;

use Symfony\Component\Uid\Ulid;

final class UserId
{
    private function __construct(private string $value)
    {
        $this->validate(value: $value);
    }

    private function validate(string $value): void
    {
        if (! Ulid::isValid($value)) {
            throw new \InvalidArgumentException('Invalid User ID format.');
        }
    }

    public static function generate(): self
    {
        return new self(value: (string) Ulid::generate());
    }

    public static function fromString(string $value): self
    {
        return new self(value: $value);
    }

    public function value(): string
    {
        return $this->value;
    }
}

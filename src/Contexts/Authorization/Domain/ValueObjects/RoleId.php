<?php

namespace Src\Contexts\Authorization\Domain\ValueObjects;

use Symfony\Component\Uid\Ulid;

final readonly class RoleId
{
    private function __construct(private string $value)
    {
        $this->validate(value: $value);
    }

    public function value(): string
    {
        return $this->value;
    }

    private function validate(string $value): void
    {
        if (! Ulid::isValid($value)) {
            throw new \InvalidArgumentException('Invalid ULID format');
        }
    }

    public static function fromString(string $value): self
    {
        return new self(value: $value);
    }

    public static function generate(): self
    {
        return new self(value: (string) Ulid::generate());
    }
}

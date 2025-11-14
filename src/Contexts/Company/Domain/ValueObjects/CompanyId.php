<?php

namespace Src\Contexts\Company\Domain\ValueObjects;

use Symfony\Component\Uid\Ulid;

final class CompanyId
{
    private function __construct(
        private string $value
    ) {
        $this->validate(value: $value);
    }

    private function validate(string $value): void
    {
        if (! Ulid::isValid($value)) {
            throw new \InvalidArgumentException('Invalid Company ID format.');
        }
    }

    public static function fromString(string $id): self
    {
        return new self($id);
    }

    public static function generate(): self
    {
        return new self(value: (string) strtolower(Ulid::generate()));
    }

    public function value(): string
    {
        return $this->value;
    }
}

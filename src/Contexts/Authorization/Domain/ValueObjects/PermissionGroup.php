<?php

namespace Src\Contexts\Authorization\Domain\ValueObjects;

final readonly class PermissionGroup
{
    private function __construct(private ?string $value) {}

    public function value(): ?string
    {
        return $this->value;
    }

    public static function fromString(?string $value): self
    {
        return new self(value: $value);
    }
}

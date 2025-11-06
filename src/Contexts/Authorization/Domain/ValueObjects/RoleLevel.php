<?php

namespace Src\Contexts\Authorization\Domain\ValueObjects;

final readonly class RoleLevel
{
    private function __construct(private ?int $value) {}

    public function value(): ?int
    {
        return $this->value;
    }

    public static function fromInt(?int $value): self
    {
        return new self(value: $value);
    }
}

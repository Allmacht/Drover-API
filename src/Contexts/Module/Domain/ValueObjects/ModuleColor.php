<?php

namespace Src\Contexts\Module\Domain\ValueObjects;

final class ModuleColor
{
    private function __construct(private ?string $value) {}

    public static function fromString(?string $value): self
    {
        return new self($value);
    }

    public function value(): ?string
    {
        return $this->value;
    }
}

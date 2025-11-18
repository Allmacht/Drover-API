<?php

namespace Src\Contexts\Module\Domain\ValueObjects;

final class ModuleIsRequired
{
    private function __construct(private bool $value) {}

    public static function fromBool(bool $value): self
    {
        return new self($value);
    }

    public function value(): bool
    {
        return $this->value;
    }
}

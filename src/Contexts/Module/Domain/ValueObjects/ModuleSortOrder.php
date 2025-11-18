<?php

namespace Src\Contexts\Module\Domain\ValueObjects;

final class ModuleSortOrder
{
    private function __construct(private int $value) {}

    public static function fromInt(int $value): self
    {
        return new self($value);
    }

    public function value(): int
    {
        return $this->value;
    }
}

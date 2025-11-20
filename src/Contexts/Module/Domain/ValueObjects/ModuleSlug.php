<?php

namespace Src\Contexts\Module\Domain\ValueObjects;

final class ModuleSlug
{
    private function __construct(private string $value)
    {
        $this->validate(value: $value);
    }

    private function validate(string $value): void {}

    public function value(): string
    {
        return $this->value;
    }

    public static function fromString(string $value): self
    {
        return new self($value);
    }
}

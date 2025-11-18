<?php

namespace Src\Contexts\Module\Domain\ValueObjects;

final class ModuleMetadata
{
    private function __construct(private ?array $value) {}

    public static function fromArray(?array $value): self
    {
        return new self($value);
    }

    public function value(): ?array
    {
        return $this->value;
    }
}

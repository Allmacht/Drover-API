<?php

namespace Src\Contexts\Company\Domain\ValueObjects;

final class CompanySettings
{
    private function __construct(private array $value)
    {
    }

    public static function fromArray(array $value): self
    {
        return new self($value);
    }

    public function value(): array
    {
        return $this->value;
    }
}

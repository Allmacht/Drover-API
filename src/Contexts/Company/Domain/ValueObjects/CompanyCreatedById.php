<?php

namespace Src\Contexts\Company\Domain\ValueObjects;

final class CompanyCreatedById
{
    private function __construct(private string $value) {}

    public function value(): string
    {
        return $this->value;
    }

    public static function fromString(string $value): self
    {
        return new self($value);
    }
}

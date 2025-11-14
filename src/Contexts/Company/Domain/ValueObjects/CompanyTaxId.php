<?php

namespace Src\Contexts\Company\Domain\ValueObjects;

final class CompanyTaxId
{
    private function __construct(private ?string $value) {}

    public static function fromString(?string $name): self
    {
        return new self($name);
    }

    public function value(): ?string
    {
        return $this->value;
    }
}

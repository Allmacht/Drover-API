<?php

namespace Src\Contexts\Company\Domain\ValueObjects;

final class CompanyOwnerId
{
    private function __construct(
        public string $value
    ) {}

    public static function fromString(string $id): self
    {
        return new self($id);
    }

    public function value(): string
    {
        return $this->value;
    }
}

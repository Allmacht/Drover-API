<?php

namespace Src\Contexts\Country\Domain\ValueObjects;

final class CountryCurrency
{
    public function __construct(private string $value)
    {
        $this->validate(value: $value);
    }

    private function validate(string $value): void {}

    public function value(): string
    {
        return $this->value;
    }
}

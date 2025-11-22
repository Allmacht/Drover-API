<?php

namespace Src\Contexts\OnboardingSession\Domain\ValueObjects;

final class OnboardingSessionCompletedAt
{
    private function __construct(private string $value)
    {
        $this->validate(value: $value);
    }

    private function validate(string $value): void
    {
    }

    public function value(): string
    {
        return $this->value;
    }

    public static function fromString(string $value): self
    {
        return new self($value);
    }
}

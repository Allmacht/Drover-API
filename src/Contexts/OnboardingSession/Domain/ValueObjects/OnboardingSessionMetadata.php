<?php

namespace Src\Contexts\OnboardingSession\Domain\ValueObjects;

final class OnboardingSessionMetadata
{
    private function __construct(private array $value)
    {
        $this->validate(value: $value);
    }

    private function validate(array $value): void
    {
    }

    public function value(): array
    {
        return $this->value;
    }

    public static function fromArray(array $value): self
    {
        return new self($value);
    }
}

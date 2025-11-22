<?php

namespace Src\Contexts\OnboardingSession\Domain\ValueObjects;

use Symfony\Component\Uid\Ulid;

final class OnboardingSessionId
{
    private function __construct(private string $value) {}

    public static function fromString(string $value): self
    {
        return new self($value);
    }

    public static function generate(): self
    {
        return new self(value: (string) strtolower(Ulid::generate()));
    }

    public function value(): string
    {
        return $this->value;
    }
}

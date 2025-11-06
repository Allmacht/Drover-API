<?php

namespace Src\Contexts\User\Domain\ValueObjects;

final class UserAvatar
{
    private function __construct(private ?string $value)
    {
        $this->validate(value: $value);
    }

    private function validate(?string $value): void
    {
        
    }

    public function value(): ?string
    {
        return $this->value;
    }

    public static function fromNullableString(?string $value): self
    {
        return new self(value: $value);
    }
}
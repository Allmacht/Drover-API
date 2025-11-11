<?php

namespace Src\Contexts\User\Domain\ValueObjects;

final class UserPassword
{
    private function __construct(private string $value)
    {
        $this->validate(value: $value);
    }

    private function validate(string $value): void {}

    public function value(): string
    {
        return $this->value;
    }

    public static function fromPlainText(string $value): self
    {
        return new self(password_hash($value, PASSWORD_BCRYPT));
    }

    public static function fromHashed(string $hashedPassword): self
    {
        return new self($hashedPassword);
    }

    public function verify(string $plainPassword): bool
    {
        return password_verify($plainPassword, $this->value);
    }
}

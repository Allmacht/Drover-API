<?php

namespace Src\Contexts\Company\Domain\ValueObjects;

enum CompanySubscriptionStatus: string
{
    case TRIAL = 'trial';
    case ACTIVE = 'active';
    case PAST_DUE = 'past_due';
    case CANCELLED = 'cancelled';
    case PAUSED = 'paused';

    public function value(): string
    {
        return $this->value;
    }

    public function label(): string
    {
        return match ($this) {
            self::TRIAL => 'Trial',
            self::ACTIVE => 'Active',
            self::PAST_DUE => 'Past Due',
            self::CANCELLED => 'Cancelled',
            self::PAUSED => 'Paused',
        };
    }

    public static function fromString(string $value): self
    {
        return self::from($value);
    }
}

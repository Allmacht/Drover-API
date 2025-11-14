<?php

namespace Src\Contexts\Company\Domain\ValueObjects;

enum CompanyStatus: string
{
    case ACTIVE = 'active';
    case SUSPENDED = 'suspended';
    case CANCELLED = 'cancelled';
    case PENDING_SETUP = 'pending_setup';

    public function label(): string
    {
        return match ($this) {
            self::ACTIVE => 'Active',
            self::SUSPENDED => 'Suspended',
            self::CANCELLED => 'Cancelled',
            self::PENDING_SETUP => 'Pending Setup',
        };
    }

    public function value(): string
    {
        return $this->value;
    }

    public static function fromString(string $value): self
    {
        return self::from($value);
    }
}

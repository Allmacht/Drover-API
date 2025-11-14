<?php

namespace Src\Contexts\Company\Domain\ValueObjects;

enum CompanyBusinessType: string
{
    case INDIVIDUAL = 'individual';
    case CORPORATION = 'corporation';
    case LLC = 'llc';
    case PARTNERSHIP = 'partnership';
    case OTHER = 'other';

    public function label(): string
    {
        return match ($this) {
            self::INDIVIDUAL => 'Individual',
            self::CORPORATION => 'Corporation',
            self::LLC => 'LLC',
            self::PARTNERSHIP => 'Partnership',
            self::OTHER => 'Other',
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
